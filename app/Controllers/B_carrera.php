<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\RangesModel;
use App\Models\UnilevelModel;
use App\Models\CommissionsModel;
use App\Controllers\B_perfil;

class B_carrera extends BaseController
{   
    public function index()
    {
        $db = \Config\Database::connect();
        //get data session
        $id = $_SESSION['id'];
        //get data planes
        $Customer = new CustomerModel();
        $B_perfil =new B_perfil();
        //get total comissions
        //get data points by customer
        $obj_customer = $Customer->get_data_customer_range($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //set point minor
        $left = $obj_customer[0]->total_point_left==""?0:$obj_customer[0]->total_point_left;                
        $right = $obj_customer[0]->total_point_right==""?0:$obj_customer[0]->total_point_right;
        if($left > $right){
            $point = $right;
        }elseif($right > $left){
            $point = $left;
        }else{
            $point = $left;
        }
        //get all ranges
        $Ranges = new RangesModel();
        $obj_range = $Ranges->get_all();
        //get total commissions
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //set var
        $obj_earn_total = $obj_commission_total[0]->total_comissions;
        $obj_earn_disponible = $obj_commission_total[0]->total_disponible;
        //Verify the percentage of customization
        $percent_cust = $B_perfil->percentageofcustomization($obj_customer);
        //send data        
        $data = array(
            'obj_earn_total' => $obj_earn_total,
            'percent_cust' => $percent_cust,
            'obj_earn_disponible' => $obj_earn_disponible,
            'obj_range' => $obj_range,
            'point' => $point,
            'obj_customer' => $obj_customer,
            'kit_id' => $obj_customer[0]->kit_id,
            'tope' => $tope
        );
        return view('backoffice/carrera', $data);
    }

    public function facturas()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_active = $session->get('active');
        $session_name = $session->get('name');
        //get data planes
        $Invoices = new InvoicesModel();
        //get total comissions
        $obj_invoices = $Invoices->get_invoices_by_id_kit($id);
        //get data Customer
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at,
            'obj_invoices' => $obj_invoices,
            'session_active' => $session_active,
            'session_name' => $session_name,
        );
        return view('backoffice/facturas', $data);
    }

    public function envios()
    {   
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_active = $session->get('active');
        $session_name = $session->get('name');
        //get total commission disponible
        $data = $db->query('SELECT sum(amount) as total FROM commissions WHERE customer_id = '.$id.'')->getResult();
        $total_disponible = $data[0]->total;
        //get data Customer
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at,
            'total_disponible' => $total_disponible,
            'session_active' => $session_active,
            'session_namess' => $session_name
        );
        return view('backoffice/envios', $data);
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
                $data['username'] = $obj_data[0]->username;
                $data['name'] = $obj_data[0]->first_name." ".$obj_data[0]->last_name;
                $data['dni'] = $obj_data[0]->dni;
                $data['phone'] = $obj_data[0]->phone;
                $data['active'] = $obj_data[0]->active;
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
            //get data post
            $id = $session->get('id');
            $obj_data = service('request')->getPost();
            $customer_id = trim($obj_data['customer_id']);
            $amount = trim($obj_data['amount']);
            $total_disponible = trim($obj_data['total_disponible']);
            if($total_disponible >= $amount){
                $Commissions = new CommissionsModel();
                //discount customer
                $param = [                    
                    "sell_id" => 0,
                    "customer_id" => $id,
                    "bonus_id" => 9,
                    "amount" => -$amount,
                    "date" => date("Y-m-d h:i:s"),
                    "active" => 1,
                    "status_value" => 1,
                    "created_at" => date("Y-m-d h:i:s"),
                    "created_by" => $customer_id,
                ];
                $Commissions->insertar($param);
                //send transfer
                $param = [                    
                    "sell_id" => 0,
                    "customer_id" => $customer_id,
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
                }
            }else{
                $data['status'] = "false2";
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
