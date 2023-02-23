<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Models\PayModel;

class D_pagos extends BaseController
{   
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data invoices by customer
        $Pay = new PayModel();
        $obj_pay = $Pay->get_data_by_customer();
        //send
        $data = array(
            'obj_pay' => $obj_pay,
            'session_name' => $session_name
        );
        return view('admin/pagos/pagos', $data);
    }
    
    public function load($id = false)
    {
        $session = session();
        //get session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        $db = \Config\Database::connect();
        //isset id
        if ($id != false){
            $Pay = new PayModel();
            $obj_pays = $Pay->get_data_by_customer_id($id);
        }
        //send data
        $data = array(
            'obj_pays' => $obj_pays,
            'session_name' => $session_name,
        );
        return view('admin/pagos/load',$data);
    }

    public function validacion(){
        if ($this->request->isAJAX()) {
            $Pay = new PayModel();
            //get data session
            $session = session();
            $id = $session->get('id');
            //get data post
            $res = service('request')->getPost();
            $pay_id = $res['pay_id'];
            $amount = $res['amount'];
            $descount = $res['descount'];
            $amount_total =  $res['amount_total'];
            $date =  $res['date'];
            $active =  $res['active'];
            //update table invoices
            if($pay_id != ""){
                $param = array(
                    'amount' => $amount,
                    'descount' => $descount,
                    'amount_total' => $amount_total,
                    'date' => $date,
                    'active' => $active,  
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $id
                    );   
                //update table invoices
                $result = $Pay->update($pay_id, $param);
            }
            if(!is_null($result)){
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);   
            exit();
        
        /*
            
            //SELECT COMISSION
            $params = array(
                        "select" =>"commissions_id",
                         "where" => "pay_id = $pay_id",
            ); 
            $obj_pays  = $this->obj_pay_commission->get_search_row($params); 
            $commissions_id = $obj_pays->commissions_id;
            
            //UPDATE DATA PAY COMISSION
            $data = array(
                    'amount' => -$amount,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $_SESSION['usercms']['user_id']
            );          
            //SAVE DATA IN TABLE    
            $this->obj_commission->update($commissions_id, $data);*/
        }
    }
    
}
