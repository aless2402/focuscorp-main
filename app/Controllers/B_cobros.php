<?php

namespace App\Controllers;
use App\Models\CommissionsModel;
use App\Models\CustomerModel;
use App\Models\PayModel;
use App\Models\Pay_commissionModel;
use App\Models\SettingModel;
use App\Controllers\B_perfil;

class B_cobros extends BaseController
{   
    public function index()
    {
        $db = \Config\Database::connect();
        //get data session
        $id = $_SESSION['id'];
        //get all pay
        $Pay = new PayModel();
        $Setting = new SettingModel();
        $Customer = new CustomerModel();
        $B_perfil =new B_perfil();
        //get hour 24 h
        //$hour = date("G");
        //get all row
        $obj_pay = $Pay->get_search_by_id($id);
        //get data customer
        $obj_customer = $Customer->get_customer_by_kit_by_id($id);
        //ser var
        $wallet = $obj_customer[0]->usdt;
        $customer_pay = $obj_customer[0]->pay;
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //verify pay all
        $date_pay = first_thu_month();
        $date_now = date("Y-m-d");
        //get active button pay
        $obj_setting_button_pay = $Setting->get_all_by_id(3);
        $allow = $obj_setting_button_pay[0]->status; 
        //get data total
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //set var    
        $obj_earn_total = $obj_commission_total[0]->total_comissions;
        $obj_earn_disponible = $obj_commission_total[0]->total_disponible;
        //set title    
        $title = PAYS;
        //send
        $data = array(
            'id' => $id,
            'title' => $title,
            'obj_customer' => $obj_customer,
            'obj_earn_total' => $obj_earn_total,
            'obj_earn_disponible' => $obj_earn_disponible,
            'obj_pay' => $obj_pay,
            'wallet' => $wallet,
            'customer_pay' => $customer_pay,
            'obj_earn_total' => $obj_earn_total,
            'obj_earn_disponible' => $obj_earn_disponible,
            'founder' => $obj_customer[0]->founder,
            'tope' => $tope,
            'allow' => $allow,
        );
        return view('admin/cobros', $data);
    }

    public function send_pin() {
        if ($this->request->isAJAX()) {
            $Customer = new CustomerModel();
            //get data post
            $obj_data = service('request')->getPost();
            $customer_id = $obj_data['id'];
            $name = $obj_data['name'];
            $email = $obj_data['email'];
            //set pin randon 6 digit
            $rand = random_int(1, 999999);
            //send message
            $this->message($name, $email, $rand);
            //update customer pin
            $param = array(
                'pin' => $rand,
            ); 
            $result = $Customer->update($customer_id, $param);
            if(!is_null($result)){
                $data['status'] = true;
                $data['message'] = "Enviado, revise su bandeja de correo";
            }else{
                $data['status'] = false;
                $data['message'] = "Sucedio un error, vuelva a intentarlo";
            }
            echo json_encode($data);
            exit();
        }
    }

    public function validate_wallet() {
        if ($this->request->isAJAX()) {
            //get data session
            $session = session();
            $id = $session->get('id');
            //get data post
            $obj_data = service('request')->getPost();
            $value = trim($obj_data['value']);
            //get data customer
            $Customer = new CustomerModel();
            $obj_customer = $Customer->get_search_by_id($id);
            if($value == 1){
                //set wallet USDT
                $wallet = $obj_customer[0]->usdt;
            }else{
                //set wallet USDT
                $wallet = $obj_customer[0]->ltc;
            }    
            //send respose
            $data['wallet'] = $wallet;
            echo json_encode($data);
            exit();
        }
    }

    public function make_pay() {
        if ($this->request->isAJAX()) {
            //get data session
            $id = $_SESSION['id'];
            //get data post
            $obj_data = service('request')->getPost();
            $amount = $obj_data['amount'];
            $total_disponible = $obj_data['total_disponible'];
            $pin = $obj_data['pin'];   
            //verify Pin
            $Customer = new CustomerModel();
            $result = $Customer->get_data_customer_pin($id, $pin);
            if($result){
                $percent = 10;
                //set tax
                $tax = ($amount * $percent) / 100;
                //set tax           
                $resultado = $amount - $tax;
                //verify amount
                if($amount >= 20 && $amount <= $total_disponible){
                    $Pay = new PayModel();
                    //insert table pay
                        $param = array(
                            'customer_id' => $id,
                            'amount' => $amount,
                            'descount' => $tax,
                            'amount_total' => $resultado,
                            'active' => 1,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $id,
                        ); 
                        $pay_id = $Pay->insertar($param);
                        //insert commission table
                        $Commissions = new CommissionsModel();
                        $param2 = array(
                            'customer_id' => $id,
                            'amount' => -$amount,
                            'active' => 2,
                            'status_value' => 1,
                            'date' => date("Y-m-d H:i:s"),
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $id,
                        ); 
                        $commissions_id = $Commissions->insertar($param2);
                        //insert table pay comission
                        $Pay_commission = new Pay_commissionModel();
                        $param_commissions = array(
                            'pay_id' => $pay_id,
                            'commissions_id' => $commissions_id,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => $id,
                        ); 
                        $result = $Pay_commission->insertar($param_commissions);
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

    public function message($name, $email_customer, $rand){   
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
                        Hello, $name                                 
                      </td>
                    </tr>
                    <tr>
                      <td style='color:#485360;font:400 28px/28px Arial;padding:0 7%;text-align:center'>
                        Here is your transfer PIN
                      </td>
                    </tr>
                    <tr>
                      <td style='color:#485360;font:600 16px Arial;letter-spacing:-1px;padding:30px 0 22px;text-align:center'>
                        <p>$rand</p>
                      </td>
                    </tr>
                    <tr>
                        <td style='background-color:#1577ab;color:#ffffff;font:800 15px Arial;padding:3%' align='center'>
                          Access to your virtual office through the following links
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
        $email->setFrom("system@focuscorp.com", " PIN");
        $email->setTo($email_customer);
        $email->setSubject("PIN - [FOCUS CORP]");
        $email->setMessage($mensaje);
        $email->send();
        return true;
    }
}
