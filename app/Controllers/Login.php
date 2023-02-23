<?php

namespace App\Controllers;
use App\Models\CustomerModel;

class Login extends BaseController
{   

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
      $session = \Config\Services::session();
      $language = \Config\Services::language();
      $language->setLocale($session->lang);
    }

    public function index()
    {
        return view('login');
    }

    public function login_user(){
      //  if ($this->request->isAJAX()) {
                //init session
                $session = session();
                $db = \Config\Database::connect();
                $request= \Config\Services::request();
                $username = $request->getPostGet('username');
                $password = $request->getPostGet('password');
                //get data from customer 
                $data = $db->query('select customer_id,username,first_name, last_name, active, email, password from customer where username = "'.$username.'"')->getResult();
                //verify data
                if($data){
                    //verify pass
                    $pass = $data[0]->password;
                    $pass = strval($pass);
                    $password = strval($password);
                    //validate pass
                    $authenticatePassword = password_verify($password, $pass);
                   //aunthenticate
                    if($authenticatePassword){
                        $ses_data = [
                            'id' => $data[0]->customer_id,
                            'name' => $data[0]->first_name." ".$data[0]->last_name,
                            'active' => $data[0]->active,
                            'email' => $data[0]->email,
                            'username' => $data[0]->username,
                            'isLoggedIn' => TRUE
                        ];
                        //begin session
                        $session->set($ses_data);
                        $data['status'] = true;
                    }else{
                        $session->setFlashdata('msg', 'Password is incorrect.');
                        $data['status'] = false;
                    }
                }else{
                    $data['status'] = false;
                }    
            echo json_encode($data);
            exit();
     //   }
    }
}
