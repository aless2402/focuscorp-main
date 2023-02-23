<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Models\CommissionsModel;
use App\Models\PaisesModel;
use App\Models\KycModel;
use CodeIgniter\Files\File;

class B_perfil extends BaseController
{   
    public function index()
    {
        //get data session
        $id = $_SESSION['id'];
        //get data acustomer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_data_customer_perfil($id);
        //get data acustomer
        $Paises = new PaisesModel();
        $obj_paises = $Paises->get_data();
        //get data total
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //set var total & available
        $obj_earn_total = $obj_commission_total[0]->total_comissions;
        $obj_earn_disponible = $obj_commission_total[0]->total_disponible;
        //send data
        $data = array(
            'obj_paises' => $obj_paises,
            'obj_earn_total' => $obj_earn_total,
            'obj_earn_disponible' => $obj_earn_disponible,
            'obj_customer' => $obj_customer,
        );
        return view('admin/perfil', $data);
        //return view('backoffice_new/perfil', $data);
    }

    public function save_profile()
    {
        if ($this->request->isAJAX()) {
            $id = $_SESSION['id'];
            $Customer = new CustomerModel();
            $request = \Config\Services::request();
            //get data post
            $name = $request->getPostGet('name');
            $last_name = $request->getPostGet('last_name');
            $phone = $request->getPostGet('phone');
            $email = $request->getPostGet('email');
            $name = $request->getPostGet('name');
            $last_name = $request->getPostGet('last_name');
            $country = $request->getPostGet('country');
            $wallet = $request->getPostGet('wallet');
            //UPDATE DATA EN CUSTOMER TABLE
            $param = array(
                'first_name' => $name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone,
                'country' => $country,
                'usdt' => $wallet,
            ); 
            $result = $Customer->update($id, $param);
            if(!is_null($result)){
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);            
            exit();
        }
    }

    public function kyc(){
        //get data session
        $id = $_SESSION['id'];
        //get data acustomer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_data_customer_perfil($id);
        //get data acustomer
        $Paises = new PaisesModel();
        $obj_paises = $Paises->get_data();
        //get data total
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //set var total & available
        $obj_earn_total = $obj_commission_total[0]->total_comissions;
        $obj_earn_disponible = $obj_commission_total[0]->total_disponible;
        //set title
        $title = KYC;
        //send data
        $data = array(
            'obj_paises' => $obj_paises,
            'obj_earn_total' => $obj_earn_total,
            'obj_earn_disponible' => $obj_earn_disponible,
            'obj_customer' => $obj_customer,
        );
        return view('admin/kyc', $data);
    }

    public function kyc_validate()
    {
        if ($this->request->isAJAX()) {
            $id = $_SESSION['id'];
            $Customer = new CustomerModel();
            $Kyc = new KycModel();
            //get data file
            $img = $this->request->getFile('img');
            $img2 = $this->request->getFile('img2');
            //set path
            $estructura = './kyc/'.$id;
            //create file
            if(!is_dir($estructura)){
                mkdir($estructura, 0777, true);
            }
            //upload imagen 1
            //validation
            $validationRule = [
                'img' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[userfile]'
                        . '|is_image[userfile]'
                        . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[userfile,100]'
                        . '|max_dims[userfile,1024,768]',
                ],
            ];
            
            if (! $this->validate($validationRule)) {
                $data['status'] = false;
            }
    
            if ($img->isValid() && ! $img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move('./kyc/' . $id , $newName);
            }
             
            if ($img2->isValid() && ! $img2->hasMoved()) {
                $newName2 = $img2->getRandomName();
                $img2->move('./kyc/' . $id , $newName2);
            }

            //update table customer
            $param = array(
                'kyc' => 1,
                ); 
            $Customer->update($id, $param);
            //set var image
            $anverso = $img->getName();
            $reverso = $img2->getName();
            //insert or update table KYC
            //verify si existe
            $kyc_id = $Kyc->verify_customer_id_kyc($id);
            //verify
            if($kyc_id == ""){
                //insert
                $param_kyc = array(
                    'customer_id' => $id,
                    'date' => date("Y-m-d"),
                    'anverso' => $anverso,
                    'reverso' => $reverso
                ); 
                $result = $Kyc->insertar($param_kyc);
            }else{
                //update data
                $param_kyc = array(
                        'date' => date("Y-m-d"),
                        'anverso' => $anverso,
                        'reverso' => $reverso
                ); 
                $result = $Kyc->update($id, $param_kyc);
            }  
            if(!is_null($result)){
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            //respose
            echo json_encode($data); 
            exit();
        }
    }

    public function pin(){
        //get data session
        $id = $_SESSION['id'];
        //get data acustomer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_data_customer_perfil($id);
        //set founter
        $founder = $obj_customer[0]->founder;
        //Verify the percentage of customization
        $percent_cust = $this->percentageofcustomization($obj_customer);
        //get data acustomer
        $Paises = new PaisesModel();
        $obj_paises = $Paises->get_data();
        //get data total
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //set var total & available
        $obj_earn_total = $obj_commission_total[0]->total_comissions;
        $obj_earn_disponible = $obj_commission_total[0]->total_disponible;
        //set title
        $title = PIN;
        //send data
        $data = array(
            'title' => $title,
            'founder' => $founder,
            'percent_cust' => $percent_cust,
            'obj_paises' => $obj_paises,
            'obj_earn_total' => $obj_earn_total,
            'obj_earn_disponible' => $obj_earn_disponible,
            'obj_customer' => $obj_customer,
        );
        return view('admin/pin', $data);
    }

    public function save_pin()
    {
        if ($this->request->isAJAX()) {
            $id = $_SESSION['id'];
            $Customer = new CustomerModel();
            $request = \Config\Services::request();
             //get data post
            $code_1 = $request->getPostGet('code_1');
            $code_2 = $request->getPostGet('code_2');
            $code_3 = $request->getPostGet('code_3');
            $code_4 = $request->getPostGet('code_4');
            $code_5 = $request->getPostGet('code_5');
            $code_6 = $request->getPostGet('code_6');
            //set pin
            $pin = $code_1.$code_2.$code_3.$code_4.$code_5.$code_6;
            //update pin
            $param = array(
                'pin' => $pin,
            ); 
            $result = $Customer->update($id, $param);

            if(!is_null($result)){
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            //respose
            echo json_encode($data); 
            exit();
        }
    }

    public function recover_pin()
    {
        if ($this->request->isAJAX()) {
            $name = $_SESSION['name'];
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];
            //send email recover
            $url = "https://genexlatam.com/recover-pin/$username";
            $this->message($name, $email, $url);       
            $data['status'] = true;
            //respose
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
              <tbody><tr>
                <td style='color:#485360;font:100 10px Arial;padding:0px 0% 10px;text-align:center'>
                  <p>
                      GENEX LATAM CORPORATION
                    </p>
                </td>
              </tr>
              <tr>
                <td>
                  <table width='600' border='0' align='center' cellpadding='0' cellspacing='0'>
                    <tbody><tr>
                      <td width='100%' style='padding:43px 0 38px;text-align:center'>
                        <table align='center' bgcolor='#ffffff' border='0' cellpadding='0' cellspacing='0'>
                          <tbody><tr style='text-align:center'>
                            <td height='26'>
                              <img border='0' style='display:inline-block' src='https://genexlatam.com/assets/images/logo/logo.png' width='90' class='CToWUd'>
                            </td>
                              </tr>
                        </tbody>
                      </table>
                    </td>
                    </tr>
                    <tr>
                      <td style='font:20px Arial;padding:0 0 11px;color:#485360;text-align:center'>
                            Saludos, $name                                 
                      </td>
                    </tr>
                    <tr>
                      <td style='color:#485360;font:400 28px/28px Arial;padding:0 7%;text-align:center'>
                        Da clic en el siguiente enlace para que puedas modificar su pin de seguridad.
                      </td>
                    </tr>
                    <tr>
                      <td style='color:#485360;font:600 16px Arial;letter-spacing:-1px;padding:30px 0 22px;text-align:center'>
                        <p>
                          <a href='$url' target='_blank'>
                                Clic Aquí
                          </a>
                        </p>
                      </td>
                    </tr>
                    <tr>
                        <td style='background-color:#1577ab;color:#ffffff;font:800 15px Arial;padding:3%' align='center'>
                        Accede a tu oficina virtual a través del siguiente enlance
                          <table style='margin:1% auto'>
                            <tbody>
                            <tr>
                              <td style='background-color:#f7952f;color:#ffffff' align='center'>
                              <a href='https://genexlatam.com/' target='_blank'>
                                www.genexlatam.com                         
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
        $email->setFrom("soporte@genexlatam.com", "Genex Latam");
        $email->setTo($email_customer);
        $email->setSubject("Recuperar PIN - [GENEX LATAM]");
        $email->setMessage($mensaje);
        $email->send();
        return true;
    }

    public function save_pass()
    {
        if ($this->request->isAJAX()) {
            //get session
            $db = \Config\Database::connect();
            $id = $_SESSION['id'];
            $Customer = new CustomerModel();
            //get post
            $request = \Config\Services::request();
            $newpass = $request->getPostGet('newpass');
            $confirmpass = $request->getPostGet('confirmpass');
            //verify pass            
            $user_password = $db->query('select password from customer where customer_id = '.$id.'')->getResult();
                if("$newpass" == "$confirmpass"){
                    $update_data = array(
                        'password'=>password_hash($newpass, PASSWORD_DEFAULT)
                    );
                    $result = $Customer->update($id, $update_data);
                    $data['status'] = true;
                }else{
                    $data['status'] = false;
                }
            echo json_encode($data); 
            exit();
        }
    }

    public function save_wallet()
    {
        if ($this->request->isAJAX()) {
            //get session data
            $id = $_SESSION['id'];
            $Customer = new CustomerModel();
            $request = \Config\Services::request();
            $wallet = $request->getPostGet('wallet');
            //validate
            if($wallet != ""){
                $param = array(
                  'usdt' => $wallet,
                ); 
                $result = $Customer->update($id, $param);
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

    public function save_email()
    {
        if ($this->request->isAJAX()) {
            //get session data
            $db = \Config\Database::connect();
            $id = $_SESSION['id'];
            $Customer = new CustomerModel();
            $request = \Config\Services::request();
            $email = $request->getPostGet('email');
            $pass = $request->getPostGet('pass');
            $pin = $request->getPostGet('pin');
            //verify pass            
            $user_password = $db->query('select password from customer where customer_id = '.$id.'')->getResult();
            //verify pass
            $authenticatePassword = password_verify($pass, $user_password[0]->password);
            if($authenticatePassword){
                //verify pin
                $result = $Customer->get_data_customer_email_pin($id, $pin);
                if($result == 1){
                    //update table customer
                    $param = array(
                        'email' => $email,
                        ); 
                    $Customer->update($id, $param);
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

    public function percentageofcustomization($obj_customer){
        //set var        
        $pin = $obj_customer[0]->pin;
        $kyc = $obj_customer[0]->kyc;
        $avatar = $obj_customer[0]->avatar;
        //calculate
        $pin = $pin <> null ? 25:0;
        $kyc = $kyc >= 1 ? 25:0;
        $avatar = $avatar <> null ? 25:0;
        return $percent = 25 + $pin + $kyc + $avatar;
    }
}
