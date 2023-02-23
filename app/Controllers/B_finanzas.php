<?php

namespace App\Controllers;
use App\Models\CommissionsModel;
use App\Models\InvoicesModel;
use App\Models\CustomerModel;
use App\Models\SettingModel;
use App\Models\Points_binaryModel;

class B_finanzas extends BaseController
{   
    public function index()
    {
        //get data GET
        $res = service('request')->getPost();
        if (isset($res['from'])) {
            $from = $res['from'];
            $to = $res['to'];
            //convert date
            $from = formato_fecha_db($from);
            $to = formato_fecha_db($to);
        } else {
            $month = date("m");
            $year = date("Y");
            $from = first_month_day($month, $year);
            $to = last_month_day($month, $year);
        }
        //get data session
        $id = $_SESSION['id'];
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_data_customer($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //get data planes
        $Commissions = new CommissionsModel();
        //get total comissions
        $obj_total = $Commissions->global_info($id);
        //get comission by customer        
        $obj_commissions = $Commissions->get_commissions_by_ranges_date($id, $from, $to);
        //set title
        $title = HISTORY;
        //send data
        $data = array(
            'title' => $title,
            'obj_commissions' => $obj_commissions,
            'obj_total' => $obj_total,
            'obj_customer' => $obj_customer,
            'founder' => $obj_customer[0]->founder,
            'kit_id' => $obj_customer[0]->kit_id,
            'tope' => $tope
        );
        return view('admin/historial', $data);
    }

    public function facturas()
    {
        //get data session
        $id = $_SESSION['id'];
        $Invoices = new InvoicesModel();
        //get total comissions
        $obj_invoices = $Invoices->get_invoices_by_id_kit($id);
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_data_customer_perfil($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //set title
        $title = INVOICE;
        //send
        $data = array(
            'title' => $title,
            'obj_customer' => $obj_customer,
            'obj_invoices' => $obj_invoices,
            'founder' => $obj_customer[0]->founder,
            'kit_id' => $obj_customer[0]->kit_id,
            'tope' => $tope
        );
        return view('admin/facturas', $data);
    }

    public function facturas_detail($invoice_id = null) {
        //get data session
        $id = $_SESSION['id'];
        //get data planes
        $Invoices = new InvoicesModel();
        //get total comissions
        $obj_invoices = $Invoices->invoices_by_id($id, $invoice_id);
        //set igv 18%
        $igv = $obj_invoices->price * 0.18;
        $subtotal = $obj_invoices->price - $igv;
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_data_customer_perfil($id);
        //title
        $title = INVOICE;
        //render
        $data = array(
            'title' => $title,
            'obj_customer' => $obj_customer,
            'igv' => $igv,
            'subtotal' => $subtotal,
            'obj_invoices' => $obj_invoices,
            'founder' => $obj_customer[0]->founder
        );
        return view('admin/invoice_details', $data);
    }

    public function transfer()
    {   
        //get data session
        $id = $_SESSION['id'];
        //get total commission disponible
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //set var total & available
        $obj_earn_total = $obj_commission_total[0]->total_comissions;
        $obj_earn_disponible = $obj_commission_total[0]->total_disponible;
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_data_customer_perfil($id);
        //set var
        $kyc = $obj_customer[0]->kyc;
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //get percent transfer
        $Setting = new SettingModel();
        //get data % pay
        $info_pay = $Setting->get_all_by_id(2);
        //get comission by bonus_id     
        $Commissions = new CommissionsModel();   
        $obj_commissions = $Commissions->get_commissions_by_id_bonus_envios(9, $id);
        //title
        $title = TRANSFER;
        //send data
        $data = array(
            'title' => $title,
            'kyc' => $kyc,
            'obj_commissions' => $obj_commissions,
            'obj_customer' => $obj_customer,
            'obj_earn_total' => $obj_earn_total,
            'obj_earn_disponible' => $obj_earn_disponible,
            'info_pay' => $info_pay,
            'founder' => $obj_customer[0]->founder,
            'tope' => $tope
        );
        return view('backoffice_new/transfer', $data);
    }

    public function list_binarypoint()
    {   
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_active = $session->get('active');
        $session_name = $session->get('name');
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_data_customer_binary($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //get data point binary by customer id
        $Points_binary = new Points_binaryModel();   
        //get data GET
        $res = service('request')->getPost();
        if (isset($res['from'])) {
            $from = $res['from'];
            $to = $res['to'];
            //convert date
            $from = formato_fecha_db($from);
            $to = formato_fecha_db($to);
        } else {
            $month = date("m");
            $year = date("Y");
            $from = first_month_day($month, $year);
            $to = last_month_day($month, $year);
        }
        $obj_points_binary = $Points_binary->get_all_by_customer_by_id_date($id,$from, $to);
        
        //send data
        $data = array(
            'obj_points_binary' => $obj_points_binary,
            'session_active' => $session_active,
            'session_name' => $session_name,
            'obj_customer' => $obj_customer,
            'founder' => $obj_customer[0]->founder,
            'kit_id' => $obj_customer[0]->kit_id,
            'tope' => $tope
        );
        return view('admin/point_binary', $data);
    }

    public function search_username()
    {
        if ($this->request->isAJAX()) {
            //get data post
            $obj_data = service('request')->getPost();
            $username = trim($obj_data['username']);
            $Customer = new CustomerModel();
            //get total comissions
            $obj_data = $Customer->get_search_by_username($username);
            //verify
            if (is_array($obj_data) && count($obj_data) > 0) {
                $data['status'] = true;
                $data['customer_id'] = $obj_data[0]->customer_id;
                $data['name'] = $obj_data[0]->first_name." ".$obj_data[0]->last_name;
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);            
            exit();
        }
    }

    public function send_commission()
    {
        if ($this->request->isAJAX()) {
            //get data session
            $id = $_SESSION['id'];
            //get data post
            $request = \Config\Services::request();
            $customer_id = $request->getPostGet('customer_id');
            $amount = $request->getPostGet('amount');
            $pin = $request->getPostGet('pin');
            $total_disponible = $request->getPostGet('total_disponible');
            //verify PIN
            $Customer = new CustomerModel();
            $result = $Customer->get_data_customer_email_pin($id, $pin);
            if($result == 1){
                //get % payout
                $Setting = new SettingModel();
                $info_pay = $Setting->get_all_by_id(2);
                $percent = format_number_miles($info_pay[0]->percent);
                $percent = ($amount * $percent) / 100;
                $amount_complete = $amount + $percent + 10;
                //verify
                if($total_disponible >= $amount_complete){
                    $Commissions = new CommissionsModel();
                    //discount customer
                    $param = [                    
                        "sell_id" => 0,
                        "customer_id" => $id,
                        "arrive_id" => $customer_id,
                        "bonus_id" => 9,
                        "amount" => -$amount_complete,
                        "date" => date("Y-m-d h:i:s"),
                        "active" => 2,
                        "status_value" => 1,
                        "created_at" => date("Y-m-d h:i:s"),
                        "created_by" => $customer_id,
                    ];
                    $comission_id = $Commissions->insertar($param);
                    //send transfer & set new val
                    $param = [                    
                        "sell_id" => 0,
                        "customer_id" => $customer_id,
                        "arrive_id" => $id,
                        "bonus_id" => 9,
                        "amount" => $amount,
                        "date" => date("Y-m-d h:i:s"),
                        "active" => 1,
                        "status_value" => 1,
                        "created_at" => date("Y-m-d h:i:s"),
                        "created_by" => $customer_id,
                    ];
                    $result = $Commissions->insertar($param);
                    if(!is_null($result)){
                        $data['status'] = true;
                    }else{
                        $data['status'] = false;
                        $data['message'] = "Vuelva a intentarlo";
                    }
                }else{
                    $data['status'] = false;
                    $data['message'] = "Importe Invalido";
                }
            }else{
                $data['status'] = false;
                $data['message'] = "PIN Invalido";
            }

            
            echo json_encode($data);            
            exit();
        }
    }

    public function logout()
    {
        $session = session();
        //$session->sess_destroy();
        $ses_data = [
            'id' => '',
            'name' => '',
            'email' => '',
            'isLoggedIn' => FALSE
        ];
        $session->set($ses_data);
        return redirect()->to('/login');
    }
}

