<?php

namespace App\Controllers;
use App\Models\User_adminModel;

class D_usuarios extends BaseController
{   
    public function index()
    {
        //get data session
        $id = $_SESSION['id'];
        $session_name = $_SESSION['first_name']." ".$_SESSION['last_name'];
        //get data bonus
        $Users = new User_adminModel();
        $obj_users = $Users->get_all();
        //send
        $data = array(
            'obj_users' => $obj_users,
            'session_name' => $session_name
        );
        return view('admin/usuarios/usuarios', $data);
    }
    
    public function load($id=false){
        $session_name = $_SESSION['first_name']." ".$_SESSION['last_name'];
        $obj_users = null;
        //verify id
        if ($id != false){
            //get data bonus by bonus
            $Users = new User_adminModel();
            $obj_users = $Users->get_all_by_id($id);
          }
        //send
        $data = array(
            'obj_users' => $obj_users,
            'session_name' => $session_name
        );
        return view('admin/usuarios/load', $data);
    }

    public function validacion(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            $session = session();
            $db = \Config\Database::connect();
            $id = $session->get('id');
            $Users = new User_adminModel();
            //get data post
            $request = \Config\Services::request();
            $user_id = $request->getPostGet('user_id');
            //verify
            if($user_id != ""){
                //update table users
                $param = array(
                    'first_name' => $request->getPostGet('first_name'),
                    'last_name' => $request->getPostGet('last_name'),
                    'password' => $request->getPostGet('password'),
                    'email' => $request->getPostGet('email'),
                    'privilage' => $request->getPostGet('privilage'),
                    'active' => $request->getPostGet('active'),
                    'status_value' => 1,
                    'updated_by' => $id,
                    'updated_at' => date("Y-m-d H:i:s")
                );
                $result = $Users->update($user_id, $param);
            }else{
                //insert table users
                $param = array(
                    'first_name' => $request->getPostGet('first_name'),
                    'last_name' => $request->getPostGet('last_name'),
                    'password' => $request->getPostGet('password'),
                    'email' => $request->getPostGet('email'),
                    'privilage' => $request->getPostGet('privilage'),
                    'active' => $request->getPostGet('active'),
                    'status_value' => 1,
                    'created_by' => $id,
                    'created_at' => date("Y-m-d H:i:s")
                );
                $result = $Users->insertar($param);
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
            $Users = new User_adminModel();
            //get data post
            $res = service('request')->getPost();
            $user_id = $res['user_id'];
            //verify                     
            if($user_id != null){
                $result = $Users->eliminar($user_id);
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
