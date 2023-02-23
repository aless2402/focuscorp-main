<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Models\InvoicesModel;
use App\Models\KitModel;
use App\Models\SellModel;
use App\Models\CommissionsModel;
use App\Models\BinaryModel;
use App\Models\Points_binaryModel;

class D_activaciones extends BaseController
{   
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data invoices by customer
        $Invoices = new InvoicesModel();
        $obj_invoices = $Invoices->get_data_kit_by_customer(1);
        //send
        $data = array(
            'obj_invoices' => $obj_invoices,
            'session_name' => $session_name
        );
        return view('admin/activaciones/activaciones', $data);
    }
    
    public function nuevo()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get customer inactive
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_all_customer_inactive();
        //get all kit active
        $Kit = new KitModel();
        $obj_kit = $Kit->get_all_kit_inactive();
        //get session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //send data
        $data = array(
            'obj_customer' => $obj_customer,
            'obj_kit' => $obj_kit,
            'session_name' => $session_name
        );
        return view('admin/activaciones/load',$data);
    }

    public function activar(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
                date_default_timezone_set('America/Lima');
                $Invoices = new InvoicesModel();
                $Sell = new SellModel();
                $Customer = new CustomerModel();
                //get data session
                $session = session();
                $id = $session->get('id');
                //get data session
                date_default_timezone_set('America/Lima');
                //get today
                $today = date('Y-m-j');
                //sumo 1 día
                $day_60 = date("Y-m-d",strtotime($today."+ 60 days")); 
                //get data post
                $res = service('request')->getPost();
                $customer_id = $res['customer_id'];
                $kit_id = $res['kit_id'];
                //set founder
                if($kit_id >= 4 && $kit_id <> 16){
                    $today_founder = date("Y-m-d");
                    $last_day_founder = date ("2022-02-01");
                    if($today_founder < $last_day_founder){
                        $founder = 1;
                    }else{
                        $founder = 0;
                    }
                }else{
                    $founder = 0;
                }
                //get data binary by customer
                $db = \Config\Database::connect();
                $obj_binary = $db->query("SELECT leg, node, sponsor FROM `binary` where customer_id = $customer_id")->getResult();
                //set var
                $node = $obj_binary[0]->node;
                $leg = $obj_binary[0]->leg;
                $sponsor = $obj_binary[0]->sponsor;
                //get price kit_id multiply by 2
                $max_earn = $this->get_price_kit($kit_id);
                $price = $max_earn / 2;
                //insert data on sell table
                $data_invoice = array(
                    'customer_id' => $customer_id,
                    'kit_id' => $kit_id,
                    'type' => 1,
                    'date' => date("Y-m-d H:i:s"),
                    'active' => 2,
                    'financy' => 0,
                    'status_value' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $customer_id,
                );
                $invoce_id = $Invoices->insertar($data_invoice);
                //INSERT SELL
                $data_sell = array(
                        'invoice_id' => $invoce_id,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 1,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    );
                $sell_id = $Sell->insertar($data_sell);   
                    //verify customer
                    if(!is_null($customer_id)){
                        //get data customer
                        $obj_customer = $db->query("SELECT active FROM customer WHERE customer_id = $sponsor")->getResult();
                        $active = $obj_customer[0]->active;
                        //insert pay comission   
                        $this->pay_directo($customer_id,$price,$sponsor,$sell_id,$active,$leg);
                        //insert bono unilevel
                        $this->pay_unilevel($price,$sponsor,$sell_id,$customer_id);
                        //insert point binary
                        $this->add_points_binary($price,$node,$customer_id);
                    }
                    //update table customer    
                    $param = array(
                        'active' => 1,
                        'kit_id' => $kit_id,
                        'date_start' => $today,
                        'founder' => $founder,
                        'financy' => 0,
                        'tope' => 0,
                        'tope_amount' => $max_earn,
                        'date_pay' => $day_60,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $id,
                    ); 

                   $result = $Customer->update($customer_id, $param);      
                   if(!is_null($result)){
                        $data['status'] = true;
                    }else{
                        $data['status'] = false;
                    }     
               // $this->message($customer_id);    
                echo json_encode($data);
                exit();
            }
    }

    public function activar_from_backoffice(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
                date_default_timezone_set('America/Lima');
                $Invoices = new InvoicesModel();
                $Sell = new SellModel();
                $Customer = new CustomerModel();
                //get data session
                $session = session();
                $id = $session->get('id');
                //get data session
                date_default_timezone_set('America/Lima');
                //get today
                $today = date('Y-m-j');
                //sumo 1 día
                $day_60 = date("Y-m-d",strtotime($today."+ 60 days")); 
                //get data post
                $res = service('request')->getPost();
                $customer_id = $res['customer_id'];
                $kit_id = $res['kit_id'];
                //set founder
                if($kit_id >= 4 && $kit_id <> 16){
                    $today_founder = date("Y-m-d");
                    $last_day_founder = date ("2022-02-01");
                    if($today_founder < $last_day_founder){
                        $founder = 1;
                    }else{
                        $founder = 0;
                    }
                }else{
                    $founder = 0;
                }
                //get data binary by customer
                $db = \Config\Database::connect();
                $obj_binary = $db->query("SELECT leg, node, sponsor FROM `binary` where customer_id = $customer_id")->getResult();
                //set var
                $node = $obj_binary[0]->node;
                $leg = $obj_binary[0]->leg;
                $sponsor = $obj_binary[0]->sponsor;
                //get price kit_id multiply by 2
                $max_earn = $this->get_price_kit($kit_id);
                $price = $max_earn / 2;
                //insert data on sell table
                $data_invoice = array(
                    'customer_id' => $customer_id,
                    'kit_id' => $kit_id,
                    'type' => 1,
                    'date' => date("Y-m-d H:i:s"),
                    'active' => 2,
                    'financy' => 0,
                    'status_value' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $customer_id,
                );
                $invoce_id = $Invoices->insertar($data_invoice);
                //INSERT SELL
                $data_sell = array(
                        'invoice_id' => $invoce_id,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 1,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    );
                $sell_id = $Sell->insertar($data_sell);   
                    //verify customer
                    if(!is_null($customer_id)){
                        //get data customer
                        $obj_customer = $db->query("SELECT active FROM customer WHERE customer_id = $sponsor")->getResult();
                        $active = $obj_customer[0]->active;
                        //insert pay comission   
                        $this->pay_directo($customer_id,$price,$sponsor,$sell_id,$active,$leg);
                        //insert bono unilevel
                        $this->pay_unilevel($price,$sponsor,$sell_id,$customer_id);
                        //insert point binary
                        $this->add_points_binary($price,$node, $customer_id);
                    }
                    //update table customer    
                    $param = array(
                        'active' => 1,
                        'kit_id' => $kit_id,
                        'date_start' => $today,
                        'founder' => $founder,
                        'financy' => 0,
                        'tope' => 0,
                        'tope_amount' => $max_earn,
                        'date_pay' => $day_60,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $id,
                    ); 

                   $result = $Customer->update($customer_id, $param);      
                   if(!is_null($result)){
                        //update session & get data customer
                        $db = \Config\Database::connect();
                        $obj_customer = $db->query("SELECT first_name, email, last_name, username FROM `customer` where customer_id = $customer_id")->getResult(); 
                        $email = $obj_customer[0]->email;
                        $name = $obj_customer[0]->first_name;
                        $last_name = $obj_customer[0]->last_name;
                        $username = $obj_customer[0]->username;
                        //set param
                        $ses_data = [
                            'id' => $customer_id,
                            'name' => $name." ".$last_name,
                            'active' => 1,
                            'email' => $email,
                            'username' => $username,
                            'isLoggedIn' => TRUE
                        ];
                        $session->set($ses_data);
                        $data['status'] = true;
                    }else{
                        $data['status'] = false;
                    }     
               // $this->message($customer_id);    
                echo json_encode($data);
                exit();
            }
    }

    public function activar_from_upgrade(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
                date_default_timezone_set('America/Lima');
                $Invoices = new InvoicesModel();
                $Sell = new SellModel();
                $Customer = new CustomerModel();
                $Commissions = new CommissionsModel();
                //get data session
                $session = session();
                $id = $session->get('id');
                //get data session
                date_default_timezone_set('America/Lima');
                //get today
                $today = date('Y-m-j');
                //get data post
                $res = service('request')->getPost();
                $customer_id = $res['customer_id'];
                $kit_id = $res['kit_id'];
                //set founder
                $founder = 0;
                //get data binary by customer
                $db = \Config\Database::connect();
                $obj_binary = $db->query("SELECT leg, node, sponsor FROM `binary` where customer_id = $customer_id")->getResult();
                //set var
                $node = $obj_binary[0]->node;
                $leg = $obj_binary[0]->leg;
                $sponsor = $obj_binary[0]->sponsor;
                //get price kit_id multiply by 2
                $max_earn = $this->get_price_kit($kit_id);
                $points = $res['amount'];
                $amount_total = $res['amount_total'];
                //insert data on sell table
                $data_invoice = array(
                    'customer_id' => $customer_id,
                    'kit_id' => $kit_id,
                    'type' => 1,
                    'date' => date("Y-m-d H:i:s"),
                    'active' => 2,
                    'financy' => 0,
                    'status_value' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $customer_id,
                );
                $invoce_id = $Invoices->insertar($data_invoice);
                //INSERT SELL
                $data_sell = array(
                        'invoice_id' => $invoce_id,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 1,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    );
                    $sell_id = $Sell->insertar($data_sell);   
                    //verify customer
                    if(!is_null($customer_id)){
                        //get data customer
                        $obj_customer = $db->query("SELECT active FROM customer WHERE customer_id = $sponsor")->getResult();
                        $active = $obj_customer[0]->active;
                        //insert pay comission   
                        $this->pay_directo_upgrade($customer_id,$points,$sponsor,$sell_id,$active,$leg);
                        //insert bono unilevel
                        $this->pay_unilevel($points,$sponsor,$sell_id,$customer_id);
                        //insert point binary
                        $this->add_points_binary($points,$node, $customer_id);
                    }
                    //send message
                    $this->message($customer_id);
                    //update table customer    
                    $param = array(
                        'active' => 1,
                        'kit_id' => $kit_id,
                        'tope' => 0,
                        'tope_amount' => $max_earn,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $id,
                    ); 
                   $result = $Customer->update($customer_id, $param);
                   //discount upgrade
                    $data = array(
                        'sell_id' => $sell_id,
                        'customer_id' => $customer_id,
                        'bonus_id' => 5,
                        'amount' => -$amount_total,
                        'active' => 2,
                        'status_value' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    ); 
                   $commission_id = $Commissions->insertar($data);
                   //verify
                   if(!is_null($commission_id)){
                        //update session & get data customer
                        $db = \Config\Database::connect();
                        $obj_customer = $db->query("SELECT first_name, email, last_name, username FROM `customer` where customer_id = $customer_id")->getResult(); 
                        $email = $obj_customer[0]->email;
                        $name = $obj_customer[0]->first_name;
                        $last_name = $obj_customer[0]->last_name;
                        $username = $obj_customer[0]->username;
                        //set param
                        $ses_data = [
                            'id' => $customer_id,
                            'name' => $name." ".$last_name,
                            'active' => 1,
                            'email' => $email,
                            'username' => $username,
                            'isLoggedIn' => TRUE
                        ];
                        $session->set($ses_data);
                        $data['status'] = true;
                    }else{
                        $data['status'] = false;
                    }     
                
                echo json_encode($data);
                exit();
            }
    }

    public function activar_from_renovation(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
                date_default_timezone_set('America/Lima');
                $Invoices = new InvoicesModel();
                $Sell = new SellModel();
                $Customer = new CustomerModel();
                $Commissions = new CommissionsModel();
                //get data session
                $session = session();
                $id = $session->get('id');
                //get data session
                date_default_timezone_set('America/Lima');
                //get today
                $today = date('Y-m-j');
                //get data post
                $res = service('request')->getPost();
                $customer_id = $res['customer_id'];
                $kit_id = $res['kit_id'];
                $tope_amount = $res['tope_amount'];
                $total_disponible = $res['total_disponible'];
                $price = $res['price'];
                //verify total disponible
                if($total_disponible >= $price){
                    
                    //set founder
                    $founder = 0;
                    //get data binary by customer
                    $db = \Config\Database::connect();
                    $obj_binary = $db->query("SELECT leg, node, sponsor FROM `binary` where customer_id = $customer_id")->getResult();
                    //set var
                    $node = $obj_binary[0]->node;
                    $leg = $obj_binary[0]->leg;
                    $sponsor = $obj_binary[0]->sponsor;
                    //get price kit_id multiply by 2
                    $max_earn = $this->get_price_kit($kit_id);
                    
                    $qty_renovation = $res['qty_renovation'];
                    //insert data on sell table
                    $data_invoice = array(
                        'customer_id' => $customer_id,
                        'kit_id' => $kit_id,
                        'type' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 2,
                        'financy' => 0,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    );
                    $invoce_id = $Invoices->insertar($data_invoice);
                    //INSERT SELL
                    $data_sell = array(
                            'invoice_id' => $invoce_id,
                            'date' => date("Y-m-d H:i:s"),
                            'active' => 1,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $customer_id,
                        );
                    $sell_id = $Sell->insertar($data_sell);   
                        //verify customer
                        if(!is_null($customer_id)){
                            //get data customer
                            $obj_customer = $db->query("SELECT active FROM customer WHERE customer_id = $sponsor")->getResult();
                            $active = $obj_customer[0]->active;
                            //insert pay comission   
                            $this->pay_directo_renovation($customer_id,$price,$sponsor,$sell_id,$active,$leg ,$qty_renovation);
                            //insert bono unilevel
                            $this->pay_unilevel_renovation($price,$sponsor,$sell_id,$customer_id,$qty_renovation);
                            //insert point binary
                            $this->add_points_binary_renovation($price,$node, $qty_renovation, $customer_id);
                        }
                        //set qty renovation
                        $qty_renovation = $qty_renovation + 1;
                        //set total amount
                        $max_earn = $max_earn + $tope_amount;
                        //update table customer    
                        $param = array(
                            'active' => 1,
                            'kit_id' => $kit_id,
                            'tope' => 0,
                            'tope_amount' => $max_earn,
                            'qty_renovation' => $qty_renovation,
                            'updated_at' => date("Y-m-d H:i:s"),
                            'updated_by' => $id,
                        ); 
                    $result = $Customer->update($customer_id, $param);
                    //discount upgrade
                        $data = array(
                            'sell_id' => $sell_id,
                            'customer_id' => $customer_id,
                            'bonus_id' => 12,
                            'amount' => -$price,
                            'active' => 2,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $customer_id,
                        ); 
                    $commission_id = $Commissions->insertar($data);
                    //verify
                    if(!is_null($commission_id)){
                            //update session & get data customer
                            $db = \Config\Database::connect();
                            $obj_customer = $db->query("SELECT first_name, email, last_name, username FROM `customer` where customer_id = $customer_id")->getResult(); 
                            $email = $obj_customer[0]->email;
                            $name = $obj_customer[0]->first_name;
                            $last_name = $obj_customer[0]->last_name;
                            $username = $obj_customer[0]->username;
                            //set param
                            $ses_data = [
                                'id' => $customer_id,
                                'name' => $name." ".$last_name,
                                'active' => 1,
                                'email' => $email,
                                'username' => $username,
                                'isLoggedIn' => TRUE
                            ];
                            $session->set($ses_data);
                            $data['status'] = true;
                        }else{
                            $data['status'] = false;
                        }     
                }else{
                    $data['status'] = false;
                }
                echo json_encode($data);
                exit();
            }
    }

    public function pay_directo($customer_id,$price,$sponsor,$sell_id,$active,$leg){
        //get percent by bonus
        $Commissions = new CommissionsModel();
        $Binary = new BinaryModel();
        $db = \Config\Database::connect();
        $obj_bonus = $db->query("SELECT percent FROM `bonus` where bonus_id = 1 and active = 1")->getResult();
        $percet = $obj_bonus[0]->percent;
        //CALCULE % AMOUNT
        $amount = ($price  * $percet) / 100;
        //INSERT SELL TABLE
            if($active == 1){
                //INSERT COMMISSION TABLE
                $data = array(
                    'sell_id' => $sell_id,
                    'customer_id' => $sponsor,
                    'bonus_id' => 1,
                    'amount' => $amount,
                    'active' => 1,
                    'status_value' => 1,
                    'date' => date("Y-m-d H:i:s"),
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $customer_id,
                ); 
               $commission_id = $Commissions->insertar($data);
                //set binary side verify active
                $params = array(
                    "select" =>"id,
                                binary_active,
                                left_active,
                                right_active",
                    "where" => "customer_id = $sponsor"
                );
                $obj_binary = $db->query("SELECT id, binary_active, left_active, right_active FROM `binary` where customer_id = $sponsor")->getResult();
                if($obj_binary[0]->binary_active == 0){
                    //left
                    if($leg == 1){
                        if($obj_binary[0]->left_active == 0){
                            //updated left site 
                            $param = array(
                                'left_active' => 1,
                            ); 
                            $result = $Binary->update($obj_binary[0]->id, $param);
                            //update binary
                            if($obj_binary[0]->right_active == 1){
                                //updated left site 
                                $param = array(
                                    'binary_active' => 1,
                                ); 
                                $result = $Binary->update($obj_binary[0]->id, $param);
                            }
                        }
                    }elseif($leg == 2){
                    //right
                        if($obj_binary[0]->right_active == 0){
                            //updated left site 
                            $param = array(
                                'right_active' => 1,
                            ); 
                            $result = $Binary->update($obj_binary[0]->id, $param);
                            //updated right site 
                            if($obj_binary[0]->left_active == 1){
                                //updated left site 
                                $param = array(
                                    'binary_active' => 1,
                                ); 
                                $result = $Binary->update($obj_binary[0]->id, $param);
                            }
                        }
                    }
                }
            }
    }     

    public function pay_directo_upgrade($customer_id,$price,$sponsor,$sell_id,$active,$leg){
        //get percent by bonus
        $Commissions = new CommissionsModel();
        $Binary = new BinaryModel();
        $db = \Config\Database::connect();
        $obj_bonus = $db->query("SELECT percent FROM `bonus` where bonus_id = 5 and active = 1")->getResult();
        $percet = $obj_bonus[0]->percent;
        //CALCULE % AMOUNT
        $amount = ($price  * $percet) / 100;
        //INSERT SELL TABLE
            if($active == 1){
                //INSERT COMMISSION TABLE
                $data = array(
                    'sell_id' => $sell_id,
                    'customer_id' => $sponsor,
                    'bonus_id' => 5,
                    'amount' => $amount,
                    'active' => 1,
                    'status_value' => 1,
                    'date' => date("Y-m-d H:i:s"),
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $customer_id,
                ); 
               $commission_id = $Commissions->insertar($data);
                //set binary side verify active
                $params = array(
                    "select" =>"id,
                                binary_active,
                                left_active,
                                right_active",
                    "where" => "customer_id = $sponsor"
                );
                $obj_binary = $db->query("SELECT id, binary_active, left_active, right_active FROM `binary` where customer_id = $sponsor")->getResult();
                if($obj_binary[0]->binary_active == 0){
                    //left
                    if($leg == 1){
                        if($obj_binary[0]->left_active == 0){
                            //updated left site 
                            $param = array(
                                'left_active' => 1,
                            ); 
                            $result = $Binary->update($obj_binary[0]->id, $param);
                            //update binary
                            if($obj_binary[0]->right_active == 1){
                                //updated left site 
                                $param = array(
                                    'binary_active' => 1,
                                ); 
                                $result = $Binary->update($obj_binary[0]->id, $param);
                            }
                        }
                    }elseif($leg == 2){
                    //right
                        if($obj_binary[0]->right_active == 0){
                            //updated left site 
                            $param = array(
                                'right_active' => 1,
                            ); 
                            $result = $Binary->update($obj_binary[0]->id, $param);
                            //updated right site 
                            if($obj_binary[0]->left_active == 1){
                                //updated left site 
                                $param = array(
                                    'binary_active' => 1,
                                ); 
                                $result = $Binary->update($obj_binary[0]->id, $param);
                            }
                        }
                    }
                }
            }
    }

    public function pay_directo_renovation($customer_id,$price,$sponsor,$sell_id,$active,$leg, $qty_renovation){
        //get percent by bonus
        $Commissions = new CommissionsModel();
        $Binary = new BinaryModel();
        $db = \Config\Database::connect();
        $obj_bonus = $db->query("SELECT percent FROM `bonus` where bonus_id = 1 and active = 1")->getResult();
        $percet = $obj_bonus[0]->percent;
        //set percent 
        if($qty_renovation < 2){
            $price = $price * 0.5;
        }else{
            $price = $price * 0.25;
        }
        //CALCULE % AMOUNT
        $amount = ($price  * $percet) / 100;
        //INSERT SELL TABLE
            if($active == 1){
                //INSERT COMMISSION TABLE - id 12 renovation
                $data = array(
                    'sell_id' => $sell_id,
                    'customer_id' => $sponsor,
                    'bonus_id' => 12,
                    'amount' => $amount,
                    'active' => 1,
                    'status_value' => 1,
                    'date' => date("Y-m-d H:i:s"),
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $customer_id,
                ); 
               $commission_id = $Commissions->insertar($data);
            }
    }

    public function pay_unilevel($price,$sponsor,$sell_id,$customer_id){
        //get percent by bonus
        $Commissions = new CommissionsModel();
        $db = \Config\Database::connect();
        $obj_bonus = $db->query("SELECT percent FROM `bonus` where bonus_id = 2 and active = 1")->getResult();
        $percet = $obj_bonus[0]->percent;
        //get sponsor by sponsor
        $obj_sponsor = $db->query("SELECT parend_id FROM `unilevel` where customer_id = $sponsor")->getResult();
        //verify
        if($obj_sponsor[0]->parend_id != 0 && count($obj_sponsor) > 0){
            $sponsor_id = $obj_sponsor[0]->parend_id;
            //get data sponsor 
            $obj_sponsor = $db->query("SELECT active FROM `customer` where customer_id = $sponsor_id")->getResult();
            if($obj_sponsor[0]->active == 1){
                //set amount
                $amount = ($price  * $percet) / 100;
                //insert table commission
                $data = array(
                    'sell_id' => $sell_id,
                    'customer_id' => $sponsor_id,
                    'bonus_id' => 2,
                    'amount' => $amount,
                    'active' => 1,
                    'status_value' => 1,
                    'date' => date("Y-m-d H:i:s"),
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $customer_id,
                ); 
               $commission_id = $Commissions->insertar($data);
            }
        }
    } 

    public function pay_unilevel_renovation($price,$sponsor,$sell_id,$customer_id, $qty_renovation){
        //get percent by bonus
        $Commissions = new CommissionsModel();
        $db = \Config\Database::connect();
        $obj_bonus = $db->query("SELECT percent FROM `bonus` where bonus_id = 2 and active = 1")->getResult();
        $percet = $obj_bonus[0]->percent;
        //get sponsor by sponsor
        $obj_sponsor = $db->query("SELECT parend_id FROM `unilevel` where customer_id = $sponsor")->getResult();
        //verify renovarion qty
        if($qty_renovation < 2){
            $price = $price * 0.5;
        }else{
            $price = $price * 0.25;
        }
        //verify
        if($obj_sponsor[0]->parend_id != 0 && count($obj_sponsor) > 0){
            $sponsor_id = $obj_sponsor[0]->parend_id;
            //get data sponsor 
            $obj_sponsor = $db->query("SELECT active FROM `customer` where customer_id = $sponsor_id")->getResult();
            if($obj_sponsor[0]->active == 1){
                //set amount
                $amount = ($price  * $percet) / 100;
                //insert table commission
                $data = array(
                    'sell_id' => $sell_id,
                    'customer_id' => $sponsor_id,
                    'bonus_id' => 2,
                    'amount' => $amount,
                    'active' => 1,
                    'status_value' => 1,
                    'date' => date("Y-m-d H:i:s"),
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $customer_id,
                ); 
               $commission_id = $Commissions->insertar($data);
            }
        }
    } 

    public function add_points_binary($price, $node, $customer_id){
        $Points_binary = new Points_binaryModel();
        $array = explode(",", $node);
        //select customers
        foreach ($array as $key => $valor) {
            if($key > 0){
                $leg = substr($valor, -1);
                $id = substr($valor, 0, -1);
                //insert table point binary
                if($id != 0 || $id != ""){
                    if($leg == "L"){
                        $param = array(
                            'customer_id' => $id,
                            'left' => $price,
                            'departure_id' => $customer_id,
                            'status' => 1,
                        );
                    $points_binary_id = $Points_binary->insertar($param);
                    }else{
                        //INSERT POINTS TABLE
                        $param = array(
                            'customer_id' => $id,
                            'right' => $price,
                            'departure_id' => $customer_id,
                            'status' => 1,
                        );
                    $points_binary_id = $Points_binary->insertar($param);
                    }
                }
            }
            
        }
    }

    public function add_points_binary_renovation($price, $node, $qty_renovation, $customer_id){
        $Points_binary = new Points_binaryModel();
        $array = explode(",", $node);
        //verify renovarion qty
        if($qty_renovation < 2){
            $price = $price * 0.5;
        }else{
            $price = $price * 0.25;
        }
        //select customers
        foreach ($array as $key => $valor) {
            $leg = substr($valor, -1);
            $id = substr($valor, 0, -1);
            //insert table point binary
            if($id != 0 || $id != ""){
                if($leg == "L"){
                    $param = array(
                        'customer_id' => $id,
                        'departure_id' => $customer_id,
                        'left' => $price,
                        'status' => 1,
                    );
                $points_binary_id = $Points_binary->insertar($param);
                }else{
                    //INSERT POINTS TABLE
                    $param = array(
                        'customer_id' => $id,
                        'departure_id' => $customer_id,
                        'right' => $price,
                        'status' => 1,
                    );
                $points_binary_id = $Points_binary->insertar($param);
                }
            }
        }
    }

    public function activar_financiado(){
        //ACTIVE CUSTOMER FINANCADO
        if ($this->request->isAJAX()) {
                $Invoices = new InvoicesModel();
                $Sell = new SellModel();
                $Customer = new CustomerModel();
                //get data session
                $session = session();
                $id = $session->get('id');
                //get data session
                date_default_timezone_set('America/Lima');
                //get today
                $today = date('Y-m-j');
                //sumo 1 día
                $day_60 = date("Y-m-d",strtotime($today."+ 60 days")); 
                //get data post
                $res = service('request')->getPost();
                $customer_id = $res['customer_id'];
                $kit_id = $res['kit_id'];
                //get price kit_id multiply by 2
                $max_earn = $this->get_price_kit($kit_id);
                if($max_earn == false){
                    $data['status'] = false;
                }else{
                    //active 2 = activo
                    $data_invoice = array(
                        'customer_id' => $customer_id,
                        'kit_id' => $kit_id,
                        'type' => 1,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 2,
                        'financy' => 1,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => $customer_id,
                    );
                    $invoce_id = $Invoices->insertar($data_invoice);
                    //INSERT SELL
                    $data_sell = array(
                            'invoice_id' => $invoce_id,
                            'date' => date("Y-m-d H:i:s"),
                            'active' => 1,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $customer_id,
                        );
                    $sell_id = $Sell->insertar($data_sell);   
                    //update table customer
                    $data_customer = array(
                        'active' => 1,
                        'kit_id' => $kit_id,
                        'date_start' => date('Y-m-j'),
                        'financy' => 1,
                        'tope' => 0,
                        'tope_amount' => $max_earn,
                        'date_pay' => $day_60,
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $id,
                    ); 
                    $result = $Customer->update($customer_id, $data_customer);
                    if(!is_null($id)){
                        $data['status'] = true;
                    }else{
                        $data['status'] = false;
                    }     
                }
                echo json_encode($data); 
                exit();
            }
    }

    public function get_price_kit($kit_id){
        //get price by kit
        $db = \Config\Database::connect();
        $obj_kit = $db->query("SELECT price FROM kit where kit_id = '$kit_id'")->getResult();
        if(count($obj_kit) > 0){
            $price = $obj_kit[0]->price;
            $price = $price * 2;
            return $price;
        }else{
            return false;
        }
    }

    public function validate_user() {
        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();
            //get data post
            $res = service('request')->getPost();
            $username = $res['username'];

            //get data customer
            $customer = $db->query("SELECT customer_id, first_name, last_name, dni FROM customer where username = '$username'")->getResult();
            if (count($customer) > 0) {
                $data['message'] = true;
                $data['name'] = $customer[0]->first_name . " " . $customer[0]->last_name;
                $data['dni'] = $customer[0]->dni;
                $data['customer_id'] = $customer[0]->customer_id;
                $data['print'] = "Cliente Encontrado!";
            } else {
                $data['message'] = false;
                $data['print'] = "Cliente no existe!";
            }
            echo json_encode($data);
            exit();
        }
    }

    public function message($customer_id){   
        //get data customer
        $db = \Config\Database::connect();
        $obj_customer = $db->query("SELECT first_name, email FROM `customer` where customer_id = $customer_id")->getResult(); 
        $email_customer = $obj_customer[0]->email;
        $name = $obj_customer[0]->first_name;
        $mensaje = wordwrap("<html>
        <table width='750' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#f8f6f7' style='padding:15px 75px 15px'>
        <tbody><tr>
          <td align='center'>
            <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' style='background-color:#fff'>
              <tbody><tr>
                <td style='color:#485360;font:100 10px Arial;padding:0px 0% 10px;text-align:center'>
                  <p>
                      GENEX LATAM CORPORATION
                    </p>
                </td>
              </tr>
              <tr>
                <td>
                  <table width='600' border='0' align='center' cellpadding='0' cellspacing='0'>
                    <tbody><tr>
                      <td width='100%' style='padding:43px 0 38px;text-align:center'>
                        <table align='center' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0'>
                          <tbody><tr style='text-align:center'>
                            <td height='26'>
                              <img border='0' style='display:inline-block' src='https://genexlatam.com/img/logo.png' width='90' class='CToWUd'>
                            </td>
                              </tr>
                        </tbody>
                      </table>
                    </td>
                    </tr>
                    <tr>
                      <td style='font:20px Arial;padding:0 0 11px;color:#485360;text-align:center'>
                            Felicidades, $name                                 
                      </td>
                    </tr>
                    <tr>
                      <td style='color:#485360;font:400 28px/28px Arial;padding:0 7%;text-align:center'>
                            Tu licencia en GENEX ha sido activada exitosamente.
                      </td>
                    </tr>
                    <tr>
                      <td style='color:#2397d4;font:600 16px Arial;letter-spacing:-1px;padding:30px 0 22px;text-align:center'>
                        <p>Gracias por confiar en nosotros.</p>
                      </td>
                    </tr>
                    <tr>
                        <td style='background-color:#1577ab;color:#ffffff;font:800 15px Arial;padding:3%' align='center'>
                        Accede a tu oficina virtual a través del siguiente enlance
                          <table style='margin:1% auto'>
                            <tbody>
                            <tr>
                              <td style='background-color:#f7952f;color:#ffffff' align='center'>
                              <a href='https://genexlatam.com/' target='_blank'>
                                www.genexlatam.com                         
                              </a>
                              </td>
                            </tr>
                          </tbody>
                          </table>
                        </td>
                      </tr>
      </tbody></table>
                    .</html>", 70, "\n", true);

        //set data to send email
        $email = \Config\Services::email();
        $email->setFrom("contacto@genexlatam.com", "Genex Latam");
        $email->setTo($email_customer);
        $email->setSubject("Licencia Activada - [GENEX LATAM]");
        $email->setMessage($mensaje);
        $email->send();
        return true;
    }
}
