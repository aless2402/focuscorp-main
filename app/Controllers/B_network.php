<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Models\UnilevelModel;
use App\Models\CommissionsModel;
use App\Controllers\B_perfil;

class B_network extends BaseController
{   
    public function index()
    {
        //get data session
        $id = $_SESSION['id'];
        $Unilevel =new UnilevelModel();
        $Customer =new CustomerModel();
        $B_perfil =new B_perfil();
        //get all partnert by id
        $obj_referidos = $Unilevel->get_all_referred($id);
        //get partnert by plan
        $obj_total = $Unilevel->get_all_referred_by_kit($id);
        //get data customer
        $obj_customer = $Customer->get_data_customer_perfil($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //get data total
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //sen data
        $data = array(
            'obj_referidos' => $obj_referidos,
            'obj_customer' => $obj_customer,
            'obj_total' => $obj_total,
            'kit_id' => $obj_customer[0]->kit_id,
            'tope' => $tope
        );
        return view('admin/referidos', $data);
    }

    public function unilevel()
    {
        //get data session
        $id = $_SESSION['id'];
        //GET DATA URL
        $url = explode("/",uri_string());
        if(isset($url[2])){
            $customer_id = decrypt($url[2]);
        }else{
            $customer_id = $_SESSION['id'];
        } 
        //set var
        $direct_3 = null;
        $direct_4 = null;
        $obj_customer_n2 = null;
        $obj_customer_n3 = null;
        $obj_customer_n4 = null;
        //unilevel
        $Unilevel = new UnilevelModel();
        $obj_customer = $Unilevel->get_data_by_customer($customer_id); 
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //get partner level 2
        $obj_customer_n2 = $Unilevel->get_partners_by_level($customer_id); 
        //total referred
        $obj_total_direct = count($obj_customer_n2);
        //get partner level 3
        if(count($obj_customer_n2) > 0){
            $customer_id_n2 = "";
                foreach ($obj_customer_n2 as $key => $value) {
                       $customer_id_n2 .= $value->customer_id.",";
                }
                //DELETE LAST CARACTER ON STRING
                $customer_id_n2 = substr ($customer_id_n2, 0, strlen($customer_id_n2) - 1);
                if(!is_null($customer_id_n2) && $customer_id_n2 != ""){
                    //get data level 3
                    $obj_customer_n3 = $Unilevel->get_partners_in_level($customer_id_n2); 
                    $direct_3 = count($obj_customer_n3);
                    //GET CUSTOMER BY PARENTS_ID 4 LEVEL
                    if(count($obj_customer_n3) > 0){
                        $customer_id_n3 = "";
                        foreach ($obj_customer_n3 as $key => $value) {
                            $customer_id_n3 .= $value->customer_id.",";
                        }
                        //DELETE LAST CARACTER ON STRING
                        $customer_id_n3 = substr ($customer_id_n3, 0, strlen($customer_id_n3) - 1);
                        //get data level 4
                        $obj_customer_n4 = $Unilevel->get_partners_in_level($customer_id_n3); 
                        $direct_4 = count($obj_customer_n4);
                        }
                }
           }
        //GET TOTAL REFERRED
        $obj_total_referidos = $Unilevel->get_total_partners($customer_id); 
        //get data total
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //set var total & available
        $obj_earn_total = $obj_commission_total[0]->total_comissions;
        $obj_earn_disponible = $obj_commission_total[0]->total_disponible;
        //set title
        $title = UNILEVEL;
        //sen data
        $data = array(
            'title' => $title,
            'obj_earn_total' => $obj_earn_total,
            'obj_earn_disponible' => $obj_earn_disponible,
            'obj_total_referidos' => $obj_total_referidos,
            'obj_total_direct' => $obj_total_direct,
            'direct_3' => $direct_3,
            'direct_4' => $direct_4,
            'obj_customer_n2' => $obj_customer_n2,
            'obj_customer_n3' => $obj_customer_n3,
            'obj_customer_n4' => $obj_customer_n4,
            'obj_customer' => $obj_customer,
            'founder' => $obj_customer[0]->founder,
            'kit_id' => $obj_customer[0]->kit_id,
            'tope' => $tope
        );
        return view('admin/unilevel', $data);
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
}
