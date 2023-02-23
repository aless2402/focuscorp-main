<?php

namespace App\Controllers;
use App\Models\CustomerModel;


class Forget extends BaseController
{   

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
      $session = \Config\Services::session();
      $language = \Config\Services::language();
      $language->setLocale($session->lang);
    }

    public function index()
    {
        /// view forget page
        return view('recover_pass');
    }

    public function validacion()
    {
            $session = session();
            $Customer = new CustomerModel();
            //get data post
            $res = service('request')->getPost();
            $username = $res['username'];
            $obj_customer = $Customer->get_search_by_username($username);
            //verify            
            if(!empty($obj_customer)){
                //send message
                $url = "https://focuscorp.es/password/$username";
                $this->message($obj_customer[0]->first_name, $obj_customer[0]->email, $url);
                //send json
              $data['status'] = true;
            }else{
              $data['status'] = false;
            }
            echo json_encode($data);
            exit();
    }
    
    public function recover($username = false){
      //get customer_id encrypt
      $Customer = new CustomerModel();
      //get data post
      $obj_customer = $Customer->get_search_by_username($username);
      //send data
      $data = array(
        'obj_customer' => $obj_customer,
      );
      /// view
      return view('change_pass',$data);
    }

    public function validate_recover(){
        $Customer = new CustomerModel();
        //get data post
        $res = service('request')->getPost();
        $customer_id = $res['customer_id'];
        $pass = $res['pass'];
        //SET PARAMETER
        if(!empty($customer_id)){
          //update table customer
          $data_customer = array(
              'password'=> password_hash($pass, PASSWORD_DEFAULT),
            ); 
          $Customer->update($customer_id,$data_customer);
          //send json
          $data['status'] = true;
        }else{
          $data['status'] = false;
        }
        echo json_encode($data); 
        exit(); 
    }
    
    public function recover_pin($username = false){
      //get customer_id encrypt
      $Customer = new CustomerModel();
      //get data post
      $obj_customer = $Customer->get_search_by_username($username);
      //send data
      $data = array(
        'obj_customer' => $obj_customer,
      );
      /// view
      return view('change_pin',$data);
    }

    public function validate_pin(){
      if ($this->request->isAJAX()) {
          $Customer = new CustomerModel();
          //get data post
          $res = service('request')->getPost();
          $customer_id = $res['customer_id'];
          $pin = $res['pin'];
          //SET PARAMETER
          if(!empty($customer_id)){
            //update table customer
            $data_customer = array(
                'pin'=> $pin,
              ); 
            $Customer->update($customer_id,$data_customer);
            //send json
            $data['status'] = true;
          }else{
            $data['status'] = false;
          }
          echo json_encode($data); 
          exit(); 
        }
    }

    public function message($name, $email_customer, $url){   
        $mensaje = wordwrap("<html>
        <table width='750' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#f8f6f7' style='padding:15px 75px 15px'>
        <tbody><tr>
          <td align='center'>
            <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' style='background-color:#fff'>
              <tbody>
              <tr>
                <td>
                  <table width='600' border='0' align='center' cellpadding='0' cellspacing='0'>
                    <tbody><tr>
                      <td width='100%' style='padding:43px 0 38px;text-align:center'>
                        <table align='center' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0'>
                          <tbody><tr style='text-align:center'>
                            <td height='26'>
                              <img border='0' style='display:inline-block' src='https://focuscorp.es/assets/images/logo/logo.png' width='90' class='CToWUd'>
                            </td>
                              </tr>
                        </tbody>
                      </table>
                    </td>
                    </tr>
                    <tr>
                      <td style='font:20px Arial;padding:0 0 11px;color:#485360;text-align:center'>
                          Greetings, $name                                 
                      </td>
                    </tr>
                    <tr>
                      <td style='color:#485360;font:400 28px/28px Arial;padding:0 7%;text-align:center'>
                        Click on the following link to recover your password.
                      </td>
                    </tr>
                    <tr>
                      <td style='color:#485360;font:600 16px Arial;letter-spacing:-1px;padding:30px 0 22px;text-align:center'>
                        <p>
                          <a href='$url' target='_blank'>
                              Click Here
                          </a>
                        </p>
                      </td>
                    </tr>
                    <tr>
                        <td style='background-color:#1577ab;color:#ffffff;font:800 15px Arial;padding:3%' align='center'>
                          Access to your virtual office through the following link
                          <table style='margin:1% auto'>
                            <tbody>
                            <tr>
                              <td style='color:#ffffff' align='center'>
                              <a href='https://focuscorp.es/' style='color:#ffffff' target='_blank'>
                                www.focuscorp.es
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
        $email->setFrom("system@focuscorp.es", "FOCUS CORP");
        $email->setTo($email_customer);
        $email->setSubject("Recover Password - [FOCUS CORP]");
        $email->setMessage($mensaje);
        $email->send();
        return true;
    }
}
