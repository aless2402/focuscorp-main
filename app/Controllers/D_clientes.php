<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Models\PaisesModel;
use App\Models\RangesModel;
use App\Models\KitModel;
use App\Models\BinaryModel;

class D_clientes extends BaseController
{   
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data invoices by customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_customer_by_kit();
        //send
        $data = array(
            'obj_customer' => $obj_customer,
            'session_name' => $session_name
        );
        return view('admin/clientes/clientes', $data);
    }
    
    public function load($id = false)
    {
        $session = session();
        $db = \Config\Database::connect();
        //isset id
        if ($id != ""){
            $Customer = new CustomerModel();
            $obj_customer = $Customer->get_data_customer($id);
          }
          //get paises
          $Paises = new PaisesModel();
          $obj_paises = $Paises->get_data();
          //get ranges
          $Ranges = new RangesModel();
          $obj_ranges = $Ranges->get_all_data();
          //get kit
          $Kit = new KitModel();
          $obj_kit = $Kit->get_all();
        //get session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //send data
        $data = array(
            'obj_customer' => $obj_customer,
            'obj_paises' => $obj_paises,
            'obj_ranges' => $obj_ranges,
            'obj_kit' => $obj_kit,
            'session_name' => $session_name,
        );
        return view('admin/clientes/load',$data);
    }

    public function validacion(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
                //get data session
                $session = session();
                $id = $session->get('id');
                $Customer = new CustomerModel();
                $Binary = new BinaryModel();
                //get data post
                $request = \Config\Services::request();
                $last_name = $request->getPostGet('last_name');
                $date_start = $request->getPostGet('date_start');
                if($date_start == ""){
                    $date_start = null; 
                }
                $customer_id = $request->getPostGet('customer_id');
                $binary_id = $request->getPostGet('binary_id');
                //update table customer
                $param = array(
                        'first_name' => $request->getPostGet('first_name'),
                        'last_name' => $last_name,
                        'username' => $request->getPostGet('username'),
                        'financy' => $request->getPostGet('financy'),
                        'range_id' => $request->getPostGet('rango'),
                        'email' => $request->getPostGet('email'),
                        'dni' => $request->getPostGet('dni'),  
                        'date_start' => $date_start,  
                        'phone' => $request->getPostGet('phone'),
                        'tope' => $request->getPostGet('tope'),
                        'tope_amount' => $request->getPostGet('tope_amount'),
                        'country' => $request->getPostGet('pais'),
                        'kit_id' => $request->getPostGet('kit'),
                        'address' => $request->getPostGet('address'),
                        'usdt' => $request->getPostGet('usdt'),
                        'ltc' => $request->getPostGet('ltc'),
                        'pay' => $request->getPostGet('pay'),
                        'active' => $request->getPostGet('active'),
                        'updated_at' => date("Y-m-d H:i:s"),
                        'updated_by' => $id
                        );  
                    $Customer->update($customer_id, $param);    
                    //updated table binary
                    $param_binary = array(
                        'binary_active' => $request->getPostGet('binary_active'),
                        'left_active' => $request->getPostGet('left_active'),
                        'right_active' => $request->getPostGet('right_active'),
                        );          

                    //SAVE DATA IN TABLE    
                    $result = $Binary->update($binary_id, $param_binary);    
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
