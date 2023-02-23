<?php

namespace App\Controllers;
use App\Models\CommissionsModel;
use App\Models\BinaryModel;
use App\Models\CustomerModel;
use App\Models\UnilevelModel;

class B_binario extends BaseController
{   
    public function index()
    {
        //SELECT URL    
        $db = \Config\Database::connect();
        //get url
        $url = explode("/",uri_string());
        //get data session
        $id = $_SESSION['id'];
        if(isset($url[2])){
            $customer_id = decrypt($url[2]);
        }else{
            //GET CUSTOMER_ID  FROM $_SESSION
            $customer_id = $id;
        }   
        //set variable
        $level_2_left = null;
        $level_2_right = null;
        $level_3_left = null;
        $level_3_right = null;
        $level_3_3_left = null;
        $level_3_4_right = null;
        $level_4_left = null;
        $level_4_2_right = null;
        $level_4_3_left = null;
        $level_4_4_right = null;
        $level_4_5_left = null;
        $level_4_6_right = null;
        $level_4_7_left = null;
        $level_4_8_right = null;
        //get all data customer
        $Customer =new CustomerModel();
        $obj_customer = $Customer->get_data_customer_binary($customer_id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //set node
        if($customer_id == 1){
            $qty_node = 1;
            $where = "qty_node = $qty_node and paises.id_idioma = 7";
            $where_total_partner = "binary.node like '%1L,' or binary.node like '%1R,'";
        }else{
            $qty_node = $obj_customer[0]->qty_node + 1;
            $node = $obj_customer[0]->node;
            $where = "qty_node = $qty_node and binary.node like '%$node' and paises.id_idioma = 7";
            $where_total_partner = "binary.node like '%$node'";
        }
        //get total partner
        $obj_total_partner = $db->query("SELECT count(id) as total_partner FROM (`binary`) WHERE $where_total_partner")->getResult();
        $total_partner = $obj_total_partner[0]->total_partner;
        //get second level
        $obj_level_2 = $Customer->get_data_customer_binary_second($where);
        //verify is null
        if(is_array($obj_level_2) && count($obj_level_2) > 0){
            //set variable 
            foreach ($obj_level_2 as $value) {
                if($value->leg == 1){
                    $level_2_left = array(
                        'customer_id' => $value->customer_id,
                        'username' => $value->username,
                        'first_name' => $value->first_name,
                        'last_name' => $value->last_name,
                        'kit_name' => $value->kit_name,
                        'kit_img' => $value->kit_img,
                        'active' => $value->active,
                        'range_name' => $value->range_name,
                        'node' => $value->node,
                        'qty_node' => $value->qty_node,
                        'pais_img' => $value->pais_img,
                    ); 
                    //GET TECER LEVEL LEFT
                            $node = $value->node;
                            $qty_node = $value->qty_node + 1;
                            $where = "qty_node = $qty_node and binary.node like '%$node' and paises.id_idioma = 7";
                            //get data 3 level
                            $obj_level_3 = $Customer->get_data_customer_binary_third($where);
                            //set variable 
                            foreach ($obj_level_3 as $value) {
                                if($value->leg == 1){
                                    $level_3_left = array(
                                        'customer_id' => $value->customer_id,
                                        'username' => $value->username,
                                        'first_name' => $value->first_name,
                                        'last_name' => $value->last_name,
                                        'kit_name' => $value->kit_name,
                                        'kit_img' => $value->kit_img,
                                        'active' => $value->active,
                                        'range_name' => $value->range_name,
                                        'node' => $value->node,
                                        'qty_node' => $value->qty_node,
                                        'pais_img' => $value->pais_img,
                                    ); 
                                    //GET CUARTO LEVEL LEFT
                                    $node = $value->node;
                                    $qty_node = $value->qty_node + 1;
                                    $where = "qty_node = $qty_node and binary.node like '%$node' and paises.id_idioma = 7";
                                    $obj_level_4 = $Customer->get_data_customer_binary_fourth($where);
                                    //set variable 
                                    foreach ($obj_level_4 as $value) {
                                        if($value->leg == 1){
                                            $level_4_left = array(
                                                'customer_id' => $value->customer_id,
                                                'username' => $value->username,
                                                'first_name' => $value->first_name,
                                                'last_name' => $value->last_name,
                                                'kit_name' => $value->kit_name,
                                                'kit_img' => $value->kit_img,
                                                'active' => $value->active,
                                                'range_name' => $value->range_name,
                                                'node' => $value->node,
                                                'qty_node' => $value->qty_node,
                                                'pais_img' => $value->pais_img,
                                            ); 
                                        }elseif($value->leg == 2){
                                            $level_4_2_right = array(
                                                'customer_id' => $value->customer_id,
                                                'username' => $value->username,
                                                'first_name' => $value->first_name,
                                                'last_name' => $value->last_name,
                                                'kit_name' => $value->kit_name,
                                                'kit_img' => $value->kit_img,
                                                'active' => $value->active,
                                                'range_name' => $value->range_name,
                                                'node' => $value->node,
                                                'qty_node' => $value->qty_node,
                                                'pais_img' => $value->pais_img,
                                            ); 
                                        }
                                    }
                                }elseif($value->leg == 2){
                                    $level_3_right = array(
                                        'customer_id' => $value->customer_id,
                                        'username' => $value->username,
                                        'first_name' => $value->first_name,
                                        'last_name' => $value->last_name,
                                        'kit_name' => $value->kit_name,
                                        'kit_img' => $value->kit_img,
                                        'active' => $value->active,
                                        'range_name' => $value->range_name,
                                        'node' => $value->node,
                                        'qty_node' => $value->qty_node,
                                        'pais_img' => $value->pais_img,
                                    ); 
                                    //GET CUARTO LEVEL LEFT 2
                                    $node = $value->node;
                                    $qty_node = $value->qty_node + 1;
                                    $where = "qty_node = $qty_node and binary.node like '%$node' and paises.id_idioma = 7";
                                    $obj_level_4 = $Customer->get_data_customer_binary_fourth($where);
                                     //set variable 
                                    foreach ($obj_level_4 as $value) {
                                        if($value->leg == 1){
                                            $level_4_3_left = array(
                                                'customer_id' => $value->customer_id,
                                                'username' => $value->username,
                                                'first_name' => $value->first_name,
                                                'last_name' => $value->last_name,
                                                'kit_name' => $value->kit_name,
                                                'kit_img' => $value->kit_img,
                                                'active' => $value->active,
                                                'range_name' => $value->range_name,
                                                'node' => $value->node,
                                                'qty_node' => $value->qty_node,
                                                'pais_img' => $value->pais_img,
                                            ); 
                                        }elseif($value->leg == 2){
                                            $level_4_4_right = array(
                                                'customer_id' => $value->customer_id,
                                                'username' => $value->username,
                                                'first_name' => $value->first_name,
                                                'last_name' => $value->last_name,
                                                'kit_name' => $value->kit_name,
                                                'kit_img' => $value->kit_img,
                                                'active' => $value->active,
                                                'range_name' => $value->range_name,
                                                'node' => $value->node,
                                                'qty_node' => $value->qty_node,
                                                'pais_img' => $value->pais_img,
                                            ); 
                                        }
                                    }
                                }
                            }
                //send level 2    
                }elseif($value->leg == 2){
                    $level_2_right = array(
                        'customer_id' => $value->customer_id,
                        'username' => $value->username,
                        'first_name' => $value->first_name,
                        'last_name' => $value->last_name,
                        'kit_name' => $value->kit_name,
                        'kit_img' => $value->kit_img,
                        'active' => $value->active,
                        'range_name' => $value->range_name,
                        'node' => $value->node,
                        'qty_node' => $value->qty_node,
                        'pais_img' => $value->pais_img,
                    ); 
                     //GET TECER LEVEL RIGHT
                     $node = $value->node;
                     $qty_node = $value->qty_node + 1;
                     $where = "qty_node = $qty_node and binary.node like '%$node' and paises.id_idioma = 7";
                     $obj_level_3 = $Customer->get_data_customer_binary_third($where);
                     //set variable 
                     foreach ($obj_level_3 as $value) {
                         if($value->leg == 1){
                             $level_3_3_left = array(
                                 'customer_id' => $value->customer_id,
                                 'username' => $value->username,
                                 'first_name' => $value->first_name,
                                 'last_name' => $value->last_name,
                                 'kit_name' => $value->kit_name,
                                 'kit_img' => $value->kit_img,
                                 'active' => $value->active,
                                 'range_name' => $value->range_name,
                                 'node' => $value->node,
                                 'qty_node' => $value->qty_node,
                                 'pais_img' => $value->pais_img,
                             ); 
                                 //GET CUARTO LEVEL LEFT 3
                                 $node = $value->node;
                                 $qty_node = $value->qty_node + 1;
                                 $where = "qty_node = $qty_node and binary.node like '%$node'";
                                 $obj_level_4 = $Customer->get_data_customer_binary_fourth($where);
                                  //set variable 
                                 foreach ($obj_level_4 as $value) {
                                     if($value->leg == 1){
                                         $level_4_5_left = array(
                                             'customer_id' => $value->customer_id,
                                             'username' => $value->username,
                                             'first_name' => $value->first_name,
                                             'last_name' => $value->last_name,
                                             'kit_name' => $value->kit_name,
                                             'kit_img' => $value->kit_img,
                                             'active' => $value->active,
                                             'range_name' => $value->range_name,
                                             'node' => $value->node,
                                             'qty_node' => $value->qty_node,
                                             'pais_img' => $value->pais_img,
                                         ); 
                                     }elseif($value->leg == 2){
                                         $level_4_6_right = array(
                                             'customer_id' => $value->customer_id,
                                             'username' => $value->username,
                                             'first_name' => $value->first_name,
                                             'last_name' => $value->last_name,
                                             'kit_name' => $value->kit_name,
                                             'kit_img' => $value->kit_img,
                                             'active' => $value->active,
                                             'range_name' => $value->range_name,
                                             'node' => $value->node,
                                             'qty_node' => $value->qty_node,
                                             'pais_img' => $value->pais_img,
                                         ); 
                                     }
                                 }

                         }elseif($value->leg == 2){
                             $level_3_4_right = array(
                                 'customer_id' => $value->customer_id,
                                 'username' => $value->username,
                                 'first_name' => $value->first_name,
                                 'last_name' => $value->last_name,
                                 'kit_name' => $value->kit_name,
                                 'kit_img' => $value->kit_img,
                                 'active' => $value->active,
                                 'range_name' => $value->range_name,
                                 'node' => $value->node,
                                 'qty_node' => $value->qty_node,
                                 'pais_img' => $value->pais_img,
                             ); 
                             //GET CUARTO LEVEL LEFT 4
                             $node = $value->node;
                             $qty_node = $value->qty_node + 1;
                             $where = "qty_node = $qty_node and binary.node like '%$node'";
                             $obj_level_4 = $Customer->get_data_customer_binary_fourth($where);
                             //set variable 
                             foreach ($obj_level_4 as $value) {
                                 if($value->leg == 1){
                                     $level_4_7_left = array(
                                         'customer_id' => $value->customer_id,
                                         'username' => $value->username,
                                         'first_name' => $value->first_name,
                                         'last_name' => $value->last_name,
                                         'kit_name' => $value->kit_name,
                                         'kit_img' => $value->kit_img,
                                         'active' => $value->active,
                                         'range_name' => $value->range_name,
                                         'node' => $value->node,
                                         'qty_node' => $value->qty_node,
                                         'pais_img' => $value->pais_img,
                                     ); 
                                 }elseif($value->leg == 2){
                                     $level_4_8_right = array(
                                         'customer_id' => $value->customer_id,
                                         'username' => $value->username,
                                         'first_name' => $value->first_name,
                                         'last_name' => $value->last_name,
                                         'kit_name' => $value->kit_name,
                                         'kit_img' => $value->kit_img,
                                         'active' => $value->active,
                                         'range_name' => $value->range_name,
                                         'node' => $value->node,
                                         'qty_node' => $value->qty_node,
                                         'pais_img' => $value->pais_img,
                                     ); 
                                 }
                             }

                         }
                     }
                }
            }
        }
        //send data        
        $data = array(
            'obj_customer' => $obj_customer,
            'total_partner' => $total_partner,
            'level_2_right' => $level_2_right,
            'level_2_left' => $level_2_left,
            'level_3_left' => $level_3_left,
            'level_3_right' => $level_3_right,
            'level_3_3_left' => $level_3_3_left,
            'level_3_4_right' => $level_3_4_right,
            'level_4_left' => $level_4_left,
            'level_4_2_right' => $level_4_2_right,
            'level_4_3_left' => $level_4_3_left,
            'level_4_4_right' => $level_4_4_right,
            'level_4_5_left' => $level_4_5_left,
            'level_4_6_right' => $level_4_6_right,
            'level_4_7_left' => $level_4_7_left,
            'level_4_8_right' => $level_4_8_right,
            'founder' => $obj_customer[0]->founder,
            'kit_id' => $obj_customer[0]->kit_id,
            'tope' => $tope
        );
        
        return view('backoffice/binario', $data);
    }

    public function register()
    {
        if ($this->request->isAJAX()) {
            date_default_timezone_set('America/Lima');
            //get data
            $res = service('request')->getPost();
            $username = $res['username'];
            //search username
            $db = \Config\Database::connect();
            //verify username disponible
            $result = $db->query("SELECT count(customer_id) as total_customer FROM (`customer`) WHERE username = '$username'")->getResult();
            $result = $result[0]->total_customer;
            if($result == 1){
                $data['status'] = "username";
            }else{
                $customer_session = $res['customer_session'];;
                $parent_id = $res['customer_id'];
                $name = $res['name'];
                $last_name = $res['last_name'];
                $email = $res['email'];
                $pass = $res['pass'];
                $country = $res['country'];
                $temporal = $res['temporal'];
                $leg = $res['temporal'];
                $node = trim($res['node']);
                $qty_node = $res['qty_node'];
                $qty_node = $qty_node == "" ? 0 : $qty_node;
                //insert table customer
                $param_customer = array(
                        'first_name' => $name,
                        'last_name' => $last_name,
                        'kit_id' => 0,
                        'range_id' => 0,
                        'username' => $username,
                        'email' => $email,
                        'password' => password_hash($pass, PASSWORD_DEFAULT),
                        'country' => $country,
                        'temporal' => 1,
                        'active' => 0,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                $Customer = new CustomerModel();
                $customer_id = $Customer->insertar($param_customer);   
                //set binary 
                $qty_node = $qty_node + 1;
                $temporal = $temporal==1?"L":"R";
                $node = $parent_id."$temporal".",".$node;
                //Insert Binary
                  $data_binary = array(
                      'customer_id' => $customer_id,
                      'node' => $node,
                      'sponsor' => $customer_session,
                      'leg' => $leg,
                      'qty_node' => $qty_node,
                  );
                  $Binary = new BinaryModel();
                  $Binary->insertar($data_binary);  
                  //get ident    
                  $result = $db->query("SELECT ident FROM (`unilevel`) WHERE customer_id = $parent_id")->getResult();
                  $ident =  $result[0]->ident;
                  //CRETE NEW IDENT 
                  $new_ident = $ident.",$parent_id";
                  //CREATE UNILEVEL
                  $data_unilevel = array(
                            'customer_id' => $customer_id,
                            'parend_id' => $customer_session,
                            'ident' => $new_ident,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                        );
                    $Unilevel = new UnilevelModel();
                    $result = $Unilevel->insertar($data_unilevel);
                    if(!is_null($result)){
                        $data['status'] = true;
                    }else{
                        $data['status'] = false;
                    }
            }
         //   $this->message($name, $email);    
            echo json_encode($data);
            exit();
        }
    }

    public function top()
    {
        if ($this->request->isAJAX()) {
            //get session
            $session = session();
            $Customer = new CustomerModel();
            $Binary = new BinaryModel();
            //get data
            $res = service('request')->getPost();
            $encryt_username = $res['encryt_username'];
            $username = decrypt($encryt_username);
            $username_session = $session->get('username');
            //verify top
            if("$username" == "$username_session"){
                $data['status'] = false;
                
            }else{
                if($username != ""){
                    $obj_customer = $Customer->get_customer_register($username); 
                    //set variable
                    //set new qty node
                    $new_qty_node = $obj_customer[0]->qty_node - 1;
                    $node = $obj_customer[0]->node;
                    //get new node
                    $explo_node = explode(",", $node);
                    $search = $explo_node[0].",";
                    //set new nmode
                    $new_last_node = str_replace("$search", "", "$node");
                    $obj_new_binary = $Binary->get_user_binary($new_qty_node, $new_last_node);
                    //set id customer
                    $customer_id = $obj_new_binary[0]->id;
                    //encrypt    
                    $customer_id = encrypt($customer_id);
                    //send
                    $data['status'] = true;
                    $data['id'] = $customer_id;
                }else{
                    $data['status'] = false;
                }
            }
            echo json_encode($data);
            exit();
        }
    }

    public function left()
    {
        if ($this->request->isAJAX()) {
            
            $Customer = new CustomerModel();
            $Binary = new BinaryModel();
            //get data
            $res = service('request')->getPost();
            $encryt_username = $res['encryt_username'];
            $username = decrypt($encryt_username);
            //get data customer            
            $obj_customer = $Customer->get_customer_register($username); 
            //set new data to search
            $node = $obj_customer[0]->node;
            $qty_node = $obj_customer[0]->qty_node + 1;
            $temporal = "L";
            $new_node = "$temporal".",".$node;
            //verificar cual es el ultimo registro
            $obj_binary = $Binary->get_last_user($qty_node, $new_node);
            if(count($obj_binary) > 0){
                //set var
                for ($x = 0; $x < 10000000; $x++) {
                    $new_qty_node = $obj_binary[0]->qty_node + 1;
                    $new_last_node = $obj_binary[0]->customer_id."$temporal".",".$obj_binary[0]->node;
                    //get data las customer
                    $obj_binary = $Binary->get_last_user($new_qty_node, $new_last_node);
                    if(count($obj_binary) > 0){
                        $new_qty_node = $obj_binary[0]->qty_node + 1;
                        $new_last_node = $obj_binary[0]->customer_id."$temporal".",".$new_last_node;
                    }else{
                        break; 
                    }   
                }
                //set new qty node
                $new_qty_node = $new_qty_node - 1;
                //get new node
                $explo_node = explode(",", $new_last_node);
                $search = $explo_node[0].",";
                //set new nmode
                $new_last_node = str_replace("$search", "", "$new_last_node");
                $obj_new_binary = $Binary->get_user_binary($new_qty_node, $new_last_node);
                //set id customer
                $customer_id = $obj_new_binary[0]->id;
                //encrypt    
                $customer_id = encrypt($customer_id);
                //send
                $data['status'] = true;
                $data['id'] = $customer_id;
            }else{
                //send
                $data['status'] = false;
            }
            //verify
            echo json_encode($data);
            exit();
        }
    }

    public function right()
    {
        if ($this->request->isAJAX()) {
            
            $Customer = new CustomerModel();
            $Binary = new BinaryModel();
            //get data
            $res = service('request')->getPost();
            $encryt_username = $res['encryt_username'];
            $username = decrypt($encryt_username);
            //get data customer            
            $obj_customer = $Customer->get_customer_register($username); 
            //set new data to search
            $node = $obj_customer[0]->node;
            $qty_node = $obj_customer[0]->qty_node + 1;
            $temporal = "R";
            $new_node = "$temporal".",".$node;
            //verificar cual es el ultimo registro
            $obj_binary = $Binary->get_last_user($qty_node, $new_node);
            if(count($obj_binary) > 0){
                //set var
                for ($x = 0; $x < 10000000; $x++) {
                    $new_qty_node = $obj_binary[0]->qty_node + 1;
                    $new_last_node = $obj_binary[0]->customer_id."$temporal".",".$obj_binary[0]->node;
                    //get data las customer
                    $obj_binary = $Binary->get_last_user($new_qty_node, $new_last_node);
                    if(count($obj_binary) > 0){
                        $new_qty_node = $obj_binary[0]->qty_node + 1;
                        $new_last_node = $obj_binary[0]->customer_id."$temporal".",".$new_last_node;
                    }else{
                        break; 
                    }   
                }
                //set new qty node
                $new_qty_node = $new_qty_node - 1;
                //get new node
                $explo_node = explode(",", $new_last_node);
                $search = $explo_node[0].",";
                //set new nmode
                $new_last_node = str_replace("$search", "", "$new_last_node");
                $obj_new_binary = $Binary->get_user_binary($new_qty_node, $new_last_node);
                //set id customer
                $customer_id = $obj_new_binary[0]->id;
                //encrypt    
                $customer_id = encrypt($customer_id);
                //send
                $data['status'] = true;
                $data['id'] = $customer_id;
            }else{
                //send
                $data['status'] = false;
            }
            //verify
            echo json_encode($data);
            exit();
        }
    }

    public function message($name, $email_customer){   
        //send email
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
                            Tu registro en GENEX ha sido creado exitosamente. =)
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
        $email->setSubject("Bienvenido - [GENEX LATAM]");
        $email->setMessage($mensaje);
        if($email->send()){
            echo "Enviado";
        }else{
            echo "Error";
        }
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
