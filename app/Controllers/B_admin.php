<?php
namespace App\Controllers;
use App\Models\CustomerModel;

class B_admin extends BaseController
{   
    public function admin()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('admin/admin');
    }
    public function login_admin()
    {
        $session_2 = session();
        $db = \Config\Database::connect();
        $request= \Config\Services::request();
        $email = $request->getPostGet('email');
        $password = $request->getPostGet('password');
        $data = $db->query('select user_id,first_name,last_name,email,password,privilage,active,status_value from users where email = "'.$email.'"')->getResult();
        if($data){
            $pass = $data[0]->password;
            //$authenticatePassword = password_verify($password, $pass);
            //if($authenticatePassword){
            if($pass === $password){
                $ses_data = [
                    'id' => $data[0]->user_id,
                    'first_name' => $data[0]->first_name,
                    'last_name' => $data[0]->last_name,
                    'email' => $data[0]->email,
                    'privilage' => $data[0]->privilage,
                    'active' => $data[0]->active,
                    'status_value' => $data[0]->status_value,
                    'isLoggedIn' => TRUE
                ];

                $session_2->set($ses_data);
                $data2['status'] = true;
                return json_encode($data2);
            }else{
                $session_2->setFlashdata('msg', 'Password is incorrect.');
                $data['status'] = 'false2';
                return json_encode($data);
            }
        }else{
            $session_2->setFlashdata('msg', 'Email does not exist.');
            $data['status'] = false;
            return json_encode($data);
        }
    }
    public function panel()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/panel');
    }
    public function bonos()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/bonos');
    }
    public function clientes()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/clientes');
    }
    public function comentarios()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/comentarios');
    }
    public function comisiones()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/comisiones');
    }
    public function facturas()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/facturas');
    }
    public function membresias()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/membresias');
    }
    public function pagos()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/pagos');
    }
    public function puntos()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/puntos');
    }
    public function rangos()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');

        $request= \Config\Services::request();
        $page = $request->getPostGet('page');
        $item = $request->getPostGet('item');
        $search = $request->getPostGet('search');
        if(empty($page)){
            $page = 1;
        }
        if(empty($item)){
            $item = 10;
        }
        if(empty($search)){
            $search = '';
        }
        $table = $db->table('ranges');
        $table->select('*');
        $table->orderBy('ranges.range_id', 'DESC');
        $table->like("ranges.name", $search);
        $table->limit($item , $page);
        $query = $table->get();
        $result = $query->getResult();

        if(count($result) > 0)
        {
            $data = array(
                'status' => true,
                'data' => $result
            );
        }
        else
        {
            $data['status'] = false;
        }
        
        return view('backoffice/admin/rangos', $data);
    }
    public function concepto_ticket()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/concepto_ticket');
    }
    public function usuarios()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/usuarios');
    }
    public function activaciones()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/activaciones');
    }
    public function upgrade()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/upgrade');
    }
    public function activar_pagos()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/activar_pagos');
    }
    public function integracion_pagos()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/integracion_pagos');
    }
    public function descuentos_pagos()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/descuentos_pagos');
    }
    public function integracion_puntos()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/integracion_puntos');
    }
    public function ticket()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
/*
        $result = $db->query('select customer_id,username,first_name,last_name,country,created_at from customer where customer_id = '.$id.'')->getResult();
        $data = array(
            'username' => $result[0]->username,
            'first_name' => $result[0]->first_name,
            'last_name' => $result[0]->last_name,
            'country' => $result[0]->country,
            'created_at' => $result[0]->created_at
        );
        */
        return view('backoffice/admin/ticket');
    }
    
}
