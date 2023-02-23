<?php

namespace App\Controllers;
use App\Models\KitModel;
use App\Models\InvoicesModel;

class D_facturas extends BaseController
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
        $obj_invoices = $Invoices->get_all();
        //send
        $data = array(
            'obj_invoices' => $obj_invoices,
            'session_name' => $session_name
        );
        return view('admin/facturas/facturas', $data);
    }
    
    public function load($id = false)
    {
        $Invoices = new InvoicesModel();
        $Kit = new KitModel();
        $session = session();
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        $db = \Config\Database::connect();
        //isset id
        if ($id != false){
            $obj_invoices = $Invoices->get_data_customer_kit($id);
        }
        //get kit
        $obj_kit = $Kit->get_all();
        //send data
        $data = array(
            'obj_invoices' => $obj_invoices,
            'obj_kit' => $obj_kit,
            'session_name' => $session_name,
        );
        return view('admin/facturas/load',$data);
    }

    public function validacion(){
        if ($this->request->isAJAX()) {
            $Invoices = new InvoicesModel();
            //get data session
            $session = session();
            $id = $session->get('id');
            //get data post
            $res = service('request')->getPost();
            $invoice_id = $res['invoice_id'];
            $kit_id = $res['kit'];
            $date = $res['date'];
            $active =  $res['active'];
            $financy =  $res['financy'];
            //update table invoices
            $param = array(
                'kit_id' => $kit_id,
                'financy' => $financy,
                'date' => $date,
                'active' => $active,  
                'updated_at' => date("Y-m-d H:i:s"),
                'updated_by' => $id
                );   
            //update table invoices
            $result = $Invoices->update($invoice_id, $param);
            if(!is_null($result)){
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);   
            exit();
        }
    }
}
