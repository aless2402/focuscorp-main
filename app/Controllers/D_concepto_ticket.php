<?php

namespace App\Controllers;
use App\Models\Concepto_ticketModel;

class D_concepto_ticket extends BaseController
{   
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data bonus
        $Concepto_ticket = new Concepto_ticketModel();
        $obj_concepto_ticket = $Concepto_ticket->get_all_data();
        //send
        $data = array(
            'obj_concepto_ticket' => $obj_concepto_ticket,
            'session_name' => $session_name
        );
        return view('admin/concepto_ticket/concepto_ticket', $data);
    }
    
    public function load($id=false){
        $session = session();
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        $obj_concepto_ticket = null;
        //verify id
        if ($id != false){
            //get data bonus
            $Concepto_ticket = new Concepto_ticketModel();
            $obj_concepto_ticket = $Concepto_ticket->get_all_data_by_id($id);
          }
        //send
        $data = array(
            'obj_concepto_ticket' => $obj_concepto_ticket,
            'session_name' => $session_name
        );
        return view('admin/concepto_ticket/load', $data);
    }

    public function validacion(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            $session = session();
            $db = \Config\Database::connect();
            $id = $session->get('id');
            $Concepto_ticket = new Concepto_ticketModel();
            //ger data post
            $res = service('request')->getPost();
            $concept_id = $res['id'];
            //verify                     
            if($concept_id != ""){
                //update tabla concept_ticket
                $param = array(
                    'title' => $res['title'],
                    'status' => $res['status'],
                );       
                $result = $Concepto_ticket->update($concept_id, $param);  
            }else{
                //insert tabla concept_ticket
                $param = array(
                    'title' => $res['title'],
                    'date' => date("Y-m-d H:i:s"),
                    'status' => $res['status']
                );       
               $result = $Concepto_ticket->insertar($param); 
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
