<?php

namespace App\Controllers;
use App\Models\BonusModel;

class D_bonos extends BaseController
{   
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data bonus
        $Bonus = new BonusModel();
        $obj_bonus = $Bonus->get_all();
        //send
        $data = array(
            'obj_bonus' => $obj_bonus,
            'session_name' => $session_name
        );
        return view('admin/bonos/bonos', $data);
    }
    
    public function load($id=false){
        $session = session();
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        $obj_bonus = null;
        //verify id
        if ($id != false){
            //get data bonus by bonus
            $Bonus = new BonusModel();
            $obj_bonus = $Bonus->get_all_by_id($id);
          }
        //send
        $data = array(
            'obj_bonus' => $obj_bonus,
            'session_name' => $session_name
        );
        return view('admin/bonos/load', $data);
    }

    public function validacion(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            $session = session();
            $db = \Config\Database::connect();
            $id = $session->get('id');
            $Bonus = new BonusModel();
            date_default_timezone_set('America/Lima');
            $res = service('request')->getPost();
            $bonus_id = $res['bonus_id'];
            $name = $res['name'];
            $percent = $res['percent'];
            $active = $res['active'];
            //verify                     
            if($bonus_id != ""){
                //update tabla bonus
                $param = array(
                    'bonus_id' => $bonus_id,
                    'name' => $name,
                    'percent' => $percent,
                    'active' => $active,  
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $id
                );       
                $result = $Bonus->update($bonus_id, $param);   
            }else{
                //UPDATE DATA
                $param = array(
                    'name' => $name,
                    'percent' => $percent,
                    'active' => $active,  
                    'created_at' => date("Y-m-d H:i:s"),
                    'created_by' => $id
                );       
               $result = $Bonus->insertar($param);  
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
