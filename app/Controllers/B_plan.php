<?php

namespace App\Controllers;
use App\Models\KitModel;
use App\Models\BinaryModel;
use App\Models\CustomerModel;
use App\Models\InvoicesModel;
use App\Models\CommissionsModel;
use App\Models\SellModel;
use App\Models\Points_binaryModel;
use App\Models\PayModel;

class B_plan extends BaseController
{   
    public function index()
    { 
        $session = session();
        //get data session
        $id = $session->get('id');
        $session_active = $session->get('active');
        $session_name = $session->get('name');
        //get data binary by customer
        $Binary = new BinaryModel();
        $obj_binary = $Binary->get_all_data($id);
        //set var
        $node = $obj_binary[0]->node;
        $leg = $obj_binary[0]->leg;
        $sponsor = $obj_binary[0]->sponsor;
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_customer_by_kit_by_id($id);
        //send tope template
        $tope = $obj_customer[0]->tope;
        //set var
        $price = $obj_customer[0]->price;
        $kit_id = $obj_customer[0]->kit_id;
        //get data planes
        $Kit = new KitModel();
        $obj_kit = $Kit->get_all_cryptopoll_mayor_price($price);
        //get comission disponible
        $Pay = new PayModel();
        $obj_commission = $Pay->comision_disponible($id);
        //send
        $data = array(
            'total_disponible' => $obj_commission[0]->total_disponible,
            'obj_customer' => $obj_customer,
            'node' => $node,
            'leg' => $leg,
            'sponsor' => $sponsor,
            'customer_id' => $id,
            'obj_kit' => $obj_kit,
            'obj_binary' => $obj_binary,
            'kit_id' => $kit_id,
            'price' => $price,
            'session_active' => $session_active,
            'session_name' => $session_name,
            'tope' => $tope,
        );
        return view('admin/planes', $data);
    }
    
    public function activar(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
                date_default_timezone_set('America/Lima');
                $Invoices = new InvoicesModel();
                $Sell = new SellModel();
                $Customer = new CustomerModel();
                $Commissions = new CommissionsModel();
                //get data session
                $session = session();
                $id = $_SESSION['id'];
                $db = \Config\Database::connect();
                //get data session
                date_default_timezone_set('America/Lima');
                //get today
                $today = date('Y-m-j');
                //sumo 1 día
                $day_60 = date("Y-m-d",strtotime($today."+ 60 days")); 
                //get data post
                $res = service('request')->getPost();
                $total_disponible = $res['total_disponible'];
                $result_diff = $res['result_diff'];
                $customer_id = $res['customer_id'];
                $kit_id = $res['kit_id'];
                $node = $res['node'];
                $leg = $res['leg'];
                $sponsor = $res['sponsor'];
                //set new price
                $price_new = $res['price_new'];
                $price = $res['price'];
                $price = $price_new - $price;
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
                //verify
                if($total_disponible >= $result_diff){
                    $max_earn = $this->get_price_kit($kit_id);
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
                        //update table commission
                        $param2 = array(
                            'customer_id' => $customer_id,
                            'amount' => -$result_diff,
                            'bonus_id' => 11,
                            'active' => 2,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $customer_id,
                        ); 
                        $commissions_id = $Commissions->insertar($param2);
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
                    }
                }else{
                    $data['status'] = false;
                }
               // $this->message($customer_id);    
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

    public function send_messages()
    {
        if ($this->request->isAJAX()) {
            //get data post
            $obj_comments = service('request')->getPost();
            //set param
            $newComments = [                    
                "name" => $obj_comments['name'],
                "email" => $obj_comments['email'],
                "phone" => $obj_comments['phone'],
                "subject" => $obj_comments['subject'],
                "comment" => $obj_comments['message'],
                "date_comment" => date("Y-m-d"),
                "active" => 1,
                "status_value" => 1,
            ];
            $Comments = new CommentsModel();
            $result = $Comments->insertar($newComments);
            if(!is_null($result)){
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);            
            exit();
        }
    }

    public function inmobiliario()
    { 
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_active = $session->get('active');
        $session_name = $session->get('name');
        //get data binary by customer
        $Binary = new BinaryModel();
        $obj_binary = $Binary->get_all_data($id);
        //set var
        $node = $obj_binary[0]->node;
        $leg = $obj_binary[0]->leg;
        $sponsor = $obj_binary[0]->sponsor;
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_customer_by_kit_by_id($id);
        //send tope template
        $tope = $obj_customer[0]->tope;
        //set var
        $price = $obj_customer[0]->price;
        $kit_id = $obj_customer[0]->kit_id;
        //get data planes
        $Kit = new KitModel();
        $obj_kit = $Kit->get_all_by_inmobiliario($price);
        //get comission disponible
        $Pay = new PayModel();
        $obj_commission = $Pay->comision_disponible($id);
        //send
        $data = array(
            'total_disponible' => $obj_commission[0]->total_disponible,
            'node' => $node,
            'leg' => $leg,
            'sponsor' => $sponsor,
            'customer_id' => $id,
            'obj_kit' => $obj_kit,
            'obj_binary' => $obj_binary,
            'kit_id' => $kit_id,
            'price' => $price,
            'session_active' => $session_active,
            'session_name' => $session_name,
            'founder' => $obj_customer[0]->founder,
            'tope' => $tope,
        );
        return view('admin/planes', $data);
    }

    public function upgrade()
    { 
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_active = $session->get('active');
        $session_name = $session->get('name');
        //get data binary by customer
        $Binary = new BinaryModel();
        $obj_binary = $Binary->get_all_data($id);
        //set var
        $node = $obj_binary[0]->node;
        $leg = $obj_binary[0]->leg;
        $sponsor = $obj_binary[0]->sponsor;
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_customer_by_kit_by_id($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //set var
        $price = $obj_customer[0]->price;
        $kit_id = $obj_customer[0]->kit_id;
        //get data planes
        $Kit = new KitModel();
        $obj_kit = $Kit->get_all_cryptopoll_mayor_price($price);
        //get comission disponible
        $Pay = new PayModel();
        $total_disponible = $Pay->comision_disponible($id);
        //send
        $data = array(
            'total_disponible' => $total_disponible[0]->total_disponible,
            'node' => $node,
            'leg' => $leg,
            'sponsor' => $sponsor,
            'customer_id' => $id,
            'obj_kit' => $obj_kit,
            'obj_binary' => $obj_binary,
            'kit_id' => $kit_id,
            'price' => $price,
            'session_active' => $session_active,
            'session_name' => $session_name,
            'founder' => $obj_customer[0]->founder,
            'tope' => $tope
        );
        return view('admin/upgrade', $data);
    }

    public function renovation()
    { 
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_active = $session->get('active');
        $session_name = $session->get('name');
        //get data binary by customer
        $Binary = new BinaryModel();
        $obj_binary = $Binary->get_all_data($id);
        //set var
        $node = $obj_binary[0]->node;
        $leg = $obj_binary[0]->leg;
        $sponsor = $obj_binary[0]->sponsor;
        $qty_renovation = $obj_binary[0]->qty_renovation;
        $tope_amount = $obj_binary[0]->tope_amount;
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_customer_by_kit_by_id($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //set var
        $price = $obj_customer[0]->price;
        $kit_id = $obj_customer[0]->kit_id;
        //get data planes
        $Kit = new KitModel();
        $obj_kit = $Kit->get_all_by_id($kit_id);
        //get comission disponible
        $Pay = new PayModel();
        $obj_commission = $Pay->comision_disponible($id);
        //send
        $data = array(
            'total_disponible' => $obj_commission[0]->total_disponible,
            'node' => $node,
            'leg' => $leg,
            'sponsor' => $sponsor,
            'qty_renovation' => $qty_renovation,
            'tope_amount' => $tope_amount,
            'customer_id' => $id,
            'obj_kit' => $obj_kit,
            'obj_binary' => $obj_binary,
            'kit_id' => $kit_id,
            'price' => $price,
            'session_active' => $session_active,
            'session_name' => $session_name,
            'founder' => $obj_customer[0]->founder,
            'tope' => $tope
        );
        return view('admin/renovation', $data);
    }
}

