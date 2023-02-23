<?php

namespace App\Controllers;
use App\Models\CommissionsModel;
use App\Models\Pay_commissionModel;
use App\Models\PayModel;


class D_activar_pagos extends BaseController
{   
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data pay
        $Pay = new PayModel();
        $obj_pay = $Pay->get_crud_pay();
        //get pending pay
        $obj_total = $Pay->get_pending_pay();
        //send
        $data = array(
            'obj_pay' => $obj_pay,
            'obj_total' => $obj_total,
            'session_name' => $session_name
        );
        return view('admin/activar_pagos/activar_pagos', $data);
    }
    
    public function load($id=false){
        //get session
        $session = session();
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        $obj_pay = null;
        $Pay = new PayModel();
        //verify
        if ($id != ""){
            //get data customer and pay
            $obj_pay = $Pay->get_data_by_customer_id($id);
          }
        //send
        $data = array(
            'obj_pay' => $obj_pay,
            'session_name' => $session_name
        );
        return view('admin/activar_pagos/load', $data);
    }

    public function pagado(){
        if ($this->request->isAJAX()) {
            $session = session();
            //get data session
            $id = $session->get('id');
            $Pay = new PayModel();
            ///get data post
            $res = service('request')->getPost();
            $pay_id = $res['pay_id'];
            $amount = $res['amount'];
            $descount = $res['descount'];
            $amount_total = $res['amount_total'];
            $email = $res['email'];
            $first_name = $res['first_name'];
            $hash_id = $res['hash_id'];
            $date_pay = date("Y-m-d H:i:s");
            //update table pay
            $param = array(
                        'active' => 2,
                        'date_pay' => date("Y-m-d H:i:s"),
                        'hash_id' => $hash_id,
                        'updated_by' =>  $id,
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
            $result = $Pay->update($pay_id, $param);   
            //send message email
           // $this->message($first_name, $email, $amount, $descount, $amount_total, $hash_id, $date_pay);
             if(!is_null($result)){
                $data['status'] = true;
             }else{
                $data['status'] = false;
             }       
            echo json_encode($data); 
            exit();
        }
    }

    public function devolver(){
        if ($this->request->isAJAX()) {
            $session = session();
            //get data session
            $id = $session->get('id');
            $Commissions = new CommissionsModel();
            $Pay = new PayModel();
            $Pay_commission = new Pay_commissionModel();
            //get data post
            $res = service('request')->getPost();
            $pay_id = $res['pay_id'];
            //update table pay
            $param = array(
                        'active' => 3,
                        'updated_by' =>  $id,
                        'updated_at' => date("Y-m-d H:i:s")
                    ); 
            $Pay->update($pay_id, $param);   
             //get commission id       
            $obj_pays = $Pay_commission->get_commission_id($pay_id);          
            $commissions_id = $obj_pays[0]->commissions_id;
            //update table comissions
            $param = array(
                    'amount' => 0,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $id
            );          
            $result = $Commissions->update($commissions_id, $param);   
             if(!is_null($result)){
                $data['status'] = true;
             }else{
                $data['status'] = false;
             }     
            echo json_encode($data); 
            exit();
        }
    }

    public function validacion(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            //get session
            $session = session();
            $id = $session->get('id');
            $Pay = new PayModel();
            //get data
            $res = service('request')->getPost();
            $pay_id = $res['id'];
            $amount = $res['amount'];
            $descount = $res['descount'];
            $amount_total = $res['amount_total'];
            $obs = $res['obs'];
            $hash_id = $res['hash_id'];
            $active = $res['active'];

            if(!is_null($pay_id)){
                //update table pay
                $param = array(
                    'amount' => $amount,
                    'descount' => $descount,
                    'amount_total' => $amount_total,
                    'obs' => $obs,
                    'hash_id' => $hash_id,
                    'active' => $active
                ); 
                $result = $Pay->update($pay_id, $param);   
            }
             if(!is_null($result)){
                $data['status'] = true;
             }else{
                $data['status'] = false;
             }       
            echo json_encode($data); 
            exit();
        }
    }

    public function eliminar(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            $session = session();
            $db = \Config\Database::connect();
            $Bonus = new BonusModel();
            //get data post
            $res = service('request')->getPost();
            $bonus_id = $res['bonus_id'];
            //verify                     
            if($bonus_id != null){
                $result = $Bonus->eliminar($bonus_id);
                if(!is_null($result)){
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
}
