<?php

namespace App\Controllers;
use App\Models\KitModel;

class D_planes extends BaseController
{   
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data bonus
        $Kit = new KitModel();
        $obj_kit = $Kit->get_all();
        //send
        $data = array(
            'obj_kit' => $obj_kit,
            'session_name' => $session_name
        );
        return view('admin/planes/planes', $data);
    }
    
    public function load($id=false){
        $session = session();
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        $obj_kit = null;
        //verify id
        if ($id != false){
            //get data bonus by bonus
            $Kit = new KitModel();
            $obj_kit = $Kit->get_all_by_id($id);
          }
        //send
        $data = array(
            'obj_kit' => $obj_kit,
            'session_name' => $session_name
        );
        return view('admin/planes/load', $data);
    }

    public function validacion(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            $session = session();
            $db = \Config\Database::connect();
            $id = $session->get('id');
            $Kit = new KitModel();
            //get data post
            $res = service('request')->getPost();
            $kit_id = $res['kit_id'];
            $description = $res['description'];
            //verify
            if($kit_id != ""){
                $param = array(
                    'name' => $res['name'],
                    'price' => $res['price'],
                    'type' => $res['type'],
                    'point' => $res['point'],
                    'description' => $description,
                    'active' => $res['active'],
                    'status_value' => 1,
                    'updated_by' => $id,
                    'updated_at' => date("Y-m-d H:i:s")
                );
                $result = $Kit->update($kit_id, $param);
            }else{
                $param = array(
                    'name' => $this->input->post('name'),
                    'price' => $this->input->post('price'),
                    'type' => $this->input->post('type'),
                    'point' => $this->input->post('point'),
                    'img' => $img,
                    'description' => $description,
                    'active' => $this->input->post('active'),
                    'status_value' => 1,
                    'created_by' => $_SESSION['usercms']['user_id'],
                    'created_at' => date("Y-m-d H:i:s")
                );
                $result = $this->obj_kit->insert($param);
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
