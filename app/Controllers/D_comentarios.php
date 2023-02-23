<?php

namespace App\Controllers;
use App\Models\CommentsModel;

class D_comentarios extends BaseController
{   
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data invoices by customer
        $Comments = new CommentsModel();
        $obj_comments = $Comments->get_all();
        //send
        $data = array(
            'obj_comments' => $obj_comments,
            'session_name' => $session_name
        );
        return view('admin/comentarios/comentarios', $data);
    }
    
    public function change_status(){
        //UPDATE DATA ORDERS
        if ($this->request->isAJAX()) {
            $Comments = new CommentsModel();
            $session = session();
            //get data session
            $id = $session->get('id');
            //get data post
            $res = service('request')->getPost();
            $comment_id = $res['comment_id'];
            //verify
            if($comment_id != null){
                $param = array(
                    'active' => 0,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $id,
                ); 
                $result = $Comments->update($comment_id, $param);
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

    public function change_status_no(){
        //UPDATE DATA ORDERS
        if ($this->request->isAJAX()) {
            $Comments = new CommentsModel();
            $session = session();
            //get data session
            $id = $session->get('id');
            //get data post
            $res = service('request')->getPost();
            $comment_id = $res['comment_id'];
            //verify
            if($comment_id != null){
                $param = array(
                    'active' => 1,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $id,
                ); 
                $result = $Comments->update($comment_id, $param);
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
