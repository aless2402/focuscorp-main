<?php

namespace App\Controllers;
use App\Models\TicketModel;

class D_ticket extends BaseController
{   
    public function index()
    {
        $session = session();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data ticket
        $Ticket = new TicketModel();
        $obj_ticket = $Ticket->get_data();
        //send
        $data = array(
            'obj_ticket' => $obj_ticket,
            'session_name' => $session_name
        );
        return view('admin/ticket/ticket', $data);
    }
    
    public function load($id=false){
        $session = session();
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        $obj_ticket = null;
        //verify id
        if ($id != false){
            //get data bonus by bonus
            $Ticket = new TicketModel();
            $obj_ticket = $Ticket->get_data_by_id($id);
          }
        //send
        $data = array(
            'obj_ticket' => $obj_ticket,
            'session_name' => $session_name
        );
        return view('admin/ticket/load', $data);
    }

    public function validacion(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            //get data session
            $session = session();
            $Ticket = new TicketModel();
            //get data post
            $res = service('request')->getPost();
            $id = $res['id'];
            $status = $res['status'];
            //verify id
            if($id != ""){
                //PARAM DATA
                $param = array(
                    'respose' => $res['respose'],
                    'status' => $status,
                    ); 
                //SAVE DATA IN TABLE  
                $result = $Ticket->update($id, $param);     
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
            $Ticket = new TicketModel();
            //get data post
            $res = service('request')->getPost();
            $id = $res['id'];
            //verify                     
            if($id != null){
                $result = $Ticket->eliminar($id);
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
