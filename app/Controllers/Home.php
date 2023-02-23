<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\CommentsModel;
use App\Models\CustomerModel;
use App\Models\NewsletterModel;
use App\Models\PaisesModel;

class Home extends BaseController
{   
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
      $session = \Config\Services::session();
      $language = \Config\Services::language();
      $language->setLocale($session->lang);
    }

    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function send_messages(){
        if ($this->request->isAJAX()) {
            $Comments = new CommentsModel();
            //get data post
            $obj_comments = service('request')->getPost();
            //set param
            $newComments = [                    
                "name" => $obj_comments['name'],
                "email" => $obj_comments['email'],
                "phone" => $obj_comments['phone'],
                "comment" => $obj_comments['message'],
                "date_comment" => date("Y-m-d"),
                "active" => 1,
                "status_value" => 1,
            ];
            $result = $Comments->insertar($newComments);
            //verufy
            if(!is_null($result)){
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
            echo json_encode($data);            
            exit();
        }
    }

    public function service()
    {
        return view('service');
    }

    public function service_genex()
    {
        return view('service_detail');
    }

    public function otras()
    {
        return view('404');
    }

    public function validate_username(){
        if ($this->request->isAJAX()) {
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
        }
    }

    public function newsletter(){
        if ($this->request->isAJAX()) {
            //SELECT ID FROM CUSTOMER 
            $Newsletter = new NewsletterModel();
            //get data post
            $res = service('request')->getPost();
            $email = $res['email'];
            //verify is isset
            $result = $this->validate_newsletter($email);
            //verify
            if($result){
                $data['status'] = false;
            }else{
                //save data
                $new = [                    
                    "email" => $email,
                    "date" => date("Y-m-d"),
                    "status" => 1,
                ];
                $result = $Newsletter->insertar($new);
                $data['status'] = true;
            }
            echo json_encode($data);
            exit();
        }
    }

    public function validate_newsletter($email)
    {
        //search username
        $db = \Config\Database::connect();
        //get data
        return $obj_newsletter = $db->query("SELECT email FROM (`newsletter`) WHERE email = '$email'")->getResult();   
    }


    public function terminos()
    {
        return view('term');
    }

    public function policy()
    {
        return view('policy');
    }
    public function faq()
    {
        return view('pages/faq');
    }

    /*para el api */
    public function usuarios()
    {
        
        $db = \Config\Database::connect();
        $query = $db->query('select * from customer');
        $result = $query->getResult();
        echo '<pre>';
        print_r($result);
    }

    public function update_user()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id=$session->get('id');
        $userModel=new UserModel($db);
		$request= \Config\Services::request();
		$data=array(
			'dni'=>$request->getPostGet('dni'),
            'address'=>$request->getPostGet('address'),
            'phone'=>$request->getPostGet('phone'),
		);
        $response = $userModel->update($id, $data);
        return json_encode($response);

    }

    public function update_password()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id=$session->get('id');
        $userModel=new UserModel($db);
		$request= \Config\Services::request();

        $pass = $request->getPostGet('pass');
        $user_password = $db->query('select password from customer where customer_id = '.$id.'')->getResult();
        
        $authenticatePassword = password_verify($pass, $user_password[0]->password);
            
        if($authenticatePassword){
            $update_data=array(
                'password'=>password_hash($request->getPostGet('new_pass'), PASSWORD_DEFAULT)
            );
            $response = $userModel->update($id, $update_data);
            if($response){
                $data['status'] = true;
                return json_encode($data);
            }
        }else{
            $data['status'] = 'false2';
            return json_encode($data);
        }

    }

    public function sitemap()
    {
        $year = date("Y");
		$month = date("m");
		$day = date("d");
		$date = "$year-$month-$day";
        $codigo = '<?xml version="1.0" encoding="UTF-8"?>
		<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
			xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
			';
				$codigo .='<url>';
				$codigo .='<loc>' . site_url() . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>1.00</priority>';
				$codigo .='
			</url>';
				$codigo .='<url>';
				$codigo .='<loc>' . site_url() . '/inicio' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>1.00</priority>';
				$codigo .='
			</url>';
				$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'ecosistema' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.80</priority>';
				$codigo .='
			</url>';
			$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'ecosistema/genex' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.50</priority>';
				$codigo .='
			</url>';
			$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'ecosistema/genpro' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.50</priority>';
				$codigo .='
			</url>';
			$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'ecosistema/genmo' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.50</priority>';
				$codigo .='
			</url>';
			$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'rocket-pro' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.80</priority>';
				$codigo .='
			</url>';
			$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'nosotros' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.80</priority>';
				$codigo .='
			</url>';
			$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'noticias' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.50</priority>';
				$codigo .='
			</url>';
			$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'contacto' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.80</priority>';
				$codigo .='
			</url>';
				$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'iniciar-sesion' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.80</priority>';
				$codigo .='
			</url>';
			$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'preguntas-frecuentes' . '</loc>';
				$codigo .='<lastmod>'.$date.'T19:18:39+00:00</lastmod>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.40</priority>';
				$codigo .='
			</url>';
				$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'terminos-y-condiciones' . '</loc>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.40</priority>';
				$codigo .='
			</url>';
			$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'politica-de-privacidad' . '</loc>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.40</priority>';
				$codigo .='
			</url>';
				$codigo .='<url>';
				$codigo .='<loc>' . site_url() . 'recuperar-contrasena' . '</loc>';
				$codigo .='<changefreq>weekly</changefreq>
				<priority>0.30</priority>';
				$codigo .='
			</url>';
				$codigo .='</urlset>';
            
            return view('sitemap', $codigo);    
            return view('admin/admin');

				/*$path = site_url("doc/sitemap.xml");
				$modo = "w+";
				if ($fp = fopen($path, $modo)) {
					fwrite($fp, $codigo);
					echo "Se realizo con Exito";
				} else {
					echo "Error";
				}*/


    }

    public function perfil()
    {
        $session = session();
        echo "Hello : ".$session->get('name')."<br>";
        echo "<a href='/logout'>Logout</a>";

    }
    public function backoffice()
    {
        return view('backoffice/home');
    }
    
   
   
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

    public function email()
    {
        $email = \Config\Services::email();
        $email->setFrom('contacto@genexlatam.com', 'Genex Latam');
        $email->setTo('software.contreras@gmail.com');
        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');
        if($email->send()){
            echo "Enviado";
        }else{
            echo "Error";
        }
    }

    public function logout()
    {
        $session = session();
        //$session->sess_destroy();
        $ses_data = [
            'id' => '',
            'name' => '',
            'email' => '',
            'username' => '',
            'isLoggedIn' => FALSE
        ];
        $session->set($ses_data);
        return redirect()->to('/');
    }

    public function adm_logout()
    {
        $session = session();
        //$session->sess_destroy();
        $ses_data = [
            'id' => '',
            'name' => '',
            'email' => '',
            'username' => '',
            'isLoggedIn' => FALSE
        ];
        $session->set($ses_data);
        return redirect()->to('/admin');
    }
}
