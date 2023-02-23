<?php

namespace App\Controllers;
use App\Models\TicketModel;
use App\Models\Concepto_ticketModel;
use App\Models\CustomerModel;
use CodeIgniter\Files\File;

class B_ticket extends BaseController
{   
    public function index()
    {
        //get data session
        $id = $_SESSION['id'];
        //get data planes
        $Ticket = new TicketModel();
        $obj_ticket = $Ticket->get_ticket_all_customer($id);
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_customer_by_kit_by_id($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //get concept tikect
        $Concepto_ticket = new Concepto_ticketModel();
        $obj_concepto_ticket = $Concepto_ticket->get_all();
        //set title
        $title = SUPPORTS;
        //render
        $data = array(
            'title' => $title,
            'obj_ticket' => $obj_ticket,
            'obj_customer' => $obj_customer,
            'obj_concepto_ticket' => $obj_concepto_ticket,
            'kit_id' => $obj_customer[0]->kit_id,
            'id' => $id,
            'tope' => $tope,
        );
        return view('admin/ticket', $data);
    }
    

    public function send_ticket()
    {
        if ($this->request->isAJAX()) {
            //get data post
            $res = service('request')->getPost();
            $customer_id = $_SESSION['id'];
            $subject = $res['subject'];
            $content = $res['content'];
            //get data file
            $img = $this->request->getFile('image_file');
            //verify
            if(!is_null($customer_id)){
                //inset table ticket
                $data_ticket = array(
                    'customer_id' => $customer_id,
                    'concepto_tiket_id' => $subject,
                    'content' => $content,
                    'status' => 1,
                );
                $Ticket = new TicketModel();
                $ticket_id = $Ticket->insertar($data_ticket);
                //set path
                $estructura = './ticket/'.$ticket_id;
                //create file
                if(!mkdir($estructura, 0777, true)) {} 
                //upload imagen 1
                //validation
                $validationRule = [
                    'image_file' => [
                        'label' => 'Image File',
                        'rules' => 'uploaded[userfile]'
                            . '|is_image[userfile]'
                            . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                            . '|max_size[userfile,10000]'
                            . '|max_dims[userfile,1024,768]',
                    ],
                ];
                
                if (! $this->validate($validationRule)) {
                    $data['status'] = false;
                }
        
                if ($img->isValid() && ! $img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('./ticket/' . $ticket_id , $newName);
                }

                $name = $img->getName();
                //update ticket image
                $param = array(
                    'img' => $newName,
                );
                $result = $Ticket->update($ticket_id, $param);
                //send respose
                if(!is_null($result)){
                    $data['status'] = true;
                }else{
                    $data['status'] = false;
                } 
                echo json_encode($data);            
                exit();
            }else{

            }
        }
    }

    public function description($ticket_id=null)
    {
        //get data session
        $id = $_SESSION['id'];
        //get data planes
        $Ticket = new TicketModel();
        $obj_ticket = $Ticket->get_data_by_id($ticket_id);
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_customer_by_kit_by_id($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //get concept tikect
        $Concepto_ticket = new Concepto_ticketModel();
        $obj_concepto_ticket = $Concepto_ticket->get_all();
        //set title
        $title = HELP;
        //render
        $data = array(
            'title' => $title,
            'obj_ticket' => $obj_ticket,
            'obj_customer' => $obj_customer,
            'obj_concepto_ticket' => $obj_concepto_ticket,
            'founder' => $obj_customer[0]->founder,
            'kit_id' => $obj_customer[0]->kit_id,
            'id' => $id,
            'tope' => $tope,
        );
        return view('admin/ticket_description', $data);
    }

  
}
