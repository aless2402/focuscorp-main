<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CommentsModel;
use App\Models\CustomerModel;
use App\Models\PaisesModel;
use App\Models\BinaryModel;
use App\Models\UnilevelModel;

class Registro extends BaseController
{   
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
      $session = \Config\Services::session();
      $language = \Config\Services::language();
      $language->setLocale($session->lang);
    }

    public function index($username)
    {
        $Customer = new CustomerModel();
        $Paises = new PaisesModel();
        //set var
        $obj_customer = null;
        //verify
        if($username != false){
            $obj_customer = $Customer->get_customer_register($username); 
        }
        //get all paises
         $obj_paises = $Paises->get_data();    
        //send data
        $data = array(
            'obj_paises' => $obj_paises,
            'obj_customer' => $obj_customer,
        );
        //render
        return view('register', $data);
    }

    public function validacion()
    {
       // if ($this->request->isAJAX()) {
            $session = session();
            $Customer = new CustomerModel();
            $Binary = new BinaryModel();
            $Unilevel = new UnilevelModel();
            //get data post
            $res = service('request')->getPost();
            $username = $res['username'];
            $node = $res['node'];
            //verify username free
            $result = $this->validate_username_register($username);
            if($result == 1){
                $data['status'] = "username";
            }else{
                //get data post
                $parent_id = $res['parent_id'];
                $parent_id_unilevel = $res['parent_id'];
                $name = $res['first_name'];
                $last_name = $res['last_name'];
                $email = $res['email'];
                $pass = $res['password'];
                $country = $res['country'];
                $temporal = $res['temporal'];
                $leg = $res['temporal'];
                $qty_node = $res['qty_node'];
                //send message
                //INSERT TABLE CUSTOMER
                $param_customer_new = array(
                        'first_name' => $name,
                        'last_name' => $last_name,
                        'kit_id' => 1,
                        'range_id' => 1,
                        'username' => $username,
                        'email' => $email,
                        'password'=> password_hash($pass, PASSWORD_DEFAULT),
                        'country' => $country,
                        'temporal' => 1,
                        'active' => 0,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                $customer_id = $Customer->insertar($param_customer_new);
                //set new binary 
                $qty_node = $qty_node + 1;
                $temporal = $temporal==1?"L":"R";
                $new_node = $parent_id."$temporal".",".$node;
                //verificar cual es el ultimo registro
                $obj_binary = $Binary->get_last_user($qty_node, $new_node);
                if(count($obj_binary) > 0){
                    //set var
                    for ($x = 0; $x < 10000000; $x++) {
                        $new_qty_node = $obj_binary[0]->qty_node + 1;
                        $new_last_node = $obj_binary[0]->customer_id."$temporal".",".$obj_binary[0]->node;
                        //get data las customer
                        $obj_binary = $Binary->get_last_user($new_qty_node, $new_last_node);
                        if(count($obj_binary) > 0){
                            $new_qty_node = $obj_binary[0]->qty_node + 1;
                            $new_last_node = $obj_binary[0]->customer_id."$temporal".",".$new_last_node;
                        }else{
                            break; 
                        }   
                      }
                }else{
                    $new_qty_node = $qty_node;
                    $new_last_node = $new_node;
                }
                //inser table binary
                $param = array(
                    'customer_id' => $customer_id,
                    'node' => $new_last_node,
                    'sponsor' => $parent_id,
                    'leg' => $leg,
                    'qty_node' => $new_qty_node,
                );
                $Binary->insertar($param);
                // get ident by sponsor
                $obj_unilevel = $Unilevel->get_ident_by_customer($parent_id_unilevel);
                $ident = $obj_unilevel[0]->ident;
                //create new ident
                $new_ident = $ident.",$parent_id_unilevel";
                //insert table unilevel
                $param_unilevel = array(
                        'customer_id' => $customer_id,
                        'parend_id' => $parent_id_unilevel,
                        'ident' => $new_ident,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                    );
                $result = $Unilevel->insertar($param_unilevel);
                //start session
                $ses_data = [
                    'id' => $customer_id,
                    'name' => $name." ".$last_name,
                    'active' => 0,
                    'email' => $email,
                    'username' => $username,
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                //send result
                $data['status'] = true;
          }
          echo json_encode($data);
          exit();
    }
    
    public function validate_username_register($username)
    {
            //search username
            $db = \Config\Database::connect();
            $customer = $db->query("SELECT count(customer_id) as total_customer FROM (`customer`) WHERE username = '$username'")->getResult();
            $result = $customer[0]->total_customer;
            return $result;
    }

    public function validate_username()
    {
        //if ($this->request->isAJAX()) {
            //SELECT ID FROM CUSTOMER
            $res = service('request')->getPost();
            $username = $res['username'];
            //search username
            $db = \Config\Database::connect();
            $customer = $db->query("SELECT count(customer_id) as total_customer FROM (`customer`) WHERE username = '$username'")->getResult();
            $result = $customer[0]->total_customer;
            if ($result > 0) {
                $data['message'] = "true";
                $data['print'] = "No esta disponible! <i class='fa fa-times-circle-o' aria-hidden='true'></i>";
            } else {
                $data['message'] = "false";
                $data['print'] = "Usuario Disponible! <i class='fa fa-check-square-o' aria-hidden='true'></i>";
            }
            echo json_encode($data);
            exit();
        //}
    }
    
    public function message($name, $email_customer){   
        
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
                            Felicidades, $name                                 
                      </td>
                    </tr>
                    <tr>
                      <td style='color:#485360;font:400 28px/28px Arial;padding:0 7%;text-align:center'>
                            Tu registro en GENEX ha sido creado exitosamente. =)
                      </td>
                    </tr>
                    <tr>
                      <td style='color:#2397d4;font:600 16px Arial;letter-spacing:-1px;padding:30px 0 22px;text-align:center'>
                        <p>Gracias por confiar en nosotros.</p>
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
        $email->setFrom("contacto@genexlatam.com", "Genex Latam");
        $email->setTo($email_customer);
        $email->setSubject("Bienvenido - [GENEX LATAM]");
        $email->setMessage($mensaje);
        $email->send();
        return true;
    }


    public function registro_user()
    {
        $db = \Config\Database::connect();
        //$tabla_customer = $db->table('customer');

        $userModel=new UserModel($db);
		$request= \Config\Services::request();
		$data=array(
			'kit_id'=>$request->getPostGet('kit_id'),
			'range_id'=>$request->getPostGet('range_id'),
            'username'=>$request->getPostGet('username'),
			'email'=>$request->getPostGet('email'),
            'password'=> password_hash($request->getPostGet('password'), PASSWORD_DEFAULT),
			'first_name'=>$request->getPostGet('first_name'),
            'last_name'=>$request->getPostGet('last_name'),
			'dni'=>$request->getPostGet('dni'),
            'date_start'=>$request->getPostGet('date_start'),
            'date_end'=>$request->getPostGet('date_end'),
            'address'=>$request->getPostGet('address'),
            'usdt'=>$request->getPostGet('usdt'),
            'ltc'=>$request->getPostGet('ltc'),
            'country'=>$request->getPostGet('country'),
            'phone'=>$request->getPostGet('phone'),
            'financy'=>$request->getPostGet('financy'),
            'tope'=>0,
            'tope_amount'=>0.00,
            'temporal'=>0,
            'pay'=>0,
            'active'=>0,
            'status_value'=>0,
            'created_by'=>$request->getPostGet('created_by'),
            'updated_by'=>$request->getPostGet('updated_by'),
		);
        //email validate
        $email_validate = $db->query('select customer_id from customer where email = "'.$request->getPostGet('email').'"')->getResult();
        if(!empty($email_validate)){
            var_dump($userModel->errors());
            return redirect()->to('/registro');
        }
		if($userModel->save($data)===false){
			var_dump($userModel->errors());
            return redirect()->to('/registro');
		}else{
            $id_user = $db->insertID();
            $user = $db->query('select * from customer where customer_id = '.$id_user)->getResult();
            return redirect()->to('/login');
        }
    }
 


}
