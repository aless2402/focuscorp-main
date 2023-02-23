<?php

namespace App\Controllers;
use App\Models\KycModel;
use App\Models\CustomerModel;

class D_kyc extends BaseController
{   
    public function index()
    {
        //get data session
        $session_name = $_SESSION['first_name']." ".$_SESSION['last_name'];
        //get data invoices by customer
        $Kyc = new KycModel();
        $obj_customer = $Kyc->get_customer_kyc();
         //send
        $data = array(
            'obj_customer' => $obj_customer,
            'session_name' => $session_name
        );
        return view('admin/kyc/kyc_pending', $data);
    }

    public function kyc_verificados()
    {
        //get data session
        $session_name = $_SESSION['first_name']." ".$_SESSION['last_name'];
        //get data invoices by customer
        $Kyc = new KycModel();
        $obj_customer = $Kyc->get_customer_kyc_verify();
        //send
        $data = array(
            'obj_customer' => $obj_customer,
            'session_name' => $session_name
        );
        return view('admin/kyc/kyc_verify', $data);
    }
    
    public function verificado(){
        if ($this->request->isAJAX()) {
            $CustomerModel = new CustomerModel();
            //get data post
            $res = service('request')->getPost();
            $customer_id = $res['customer_id'];
            //verify
            if($customer_id != null){
                $param = array(
                    'kyc' => 2
                ); 
                $result = $CustomerModel->update($customer_id, $param);
                if(!is_null($result)){
                    $data["status"] = true;
                }else{
                    $data["status"] = false;
                }
            }else{
                $data["status"] = false;
            }
            echo json_encode($data);            
        exit();
        }
    }

    public function rechazado(){
        //UPDATE DATA ORDERS
        if ($this->request->isAJAX()) {
            $CustomerModel = new CustomerModel();
            //get data post
            $res = service('request')->getPost();
            $customer_id = $res['customer_id'];
            //verify
            if($customer_id != null){
                $param = array(
                    'kyc' => 3
                ); 
                $result = $CustomerModel->update($customer_id, $param);
                if(!is_null($result)){
                    $data["status"] = true;
                }else{
                    $data["status"] = false;
                }
            }else{
                $data["status"] = false;
            }
            echo json_encode($data);            
        exit();
        }
    }
    
}
