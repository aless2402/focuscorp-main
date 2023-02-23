<?php

namespace App\Controllers;
use App\Models\CommissionsModel;
use App\Models\BonusModel;

class D_comisiones extends BaseController
{   
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get date
        $year = date("Y");
        $month = date("m");
        $date_start = "$year-$month-01";
        $date_end = "$year-$month-31";
        //get data invoices by customer
        $Commissions = new CommissionsModel();
        $obj_comission = $Commissions->get_all_by_date($date_start, $date_end);
        //send
        $data = array(
            'obj_comission' => $obj_comission,
            'session_name' => $session_name
        );
        return view('admin/comisiones/comisiones', $data);
    }
    
    public function load($id = false)
    {
        $Commissions = new CommissionsModel();
        $Bonus = new BonusModel();
        $session = session();
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        $db = \Config\Database::connect();
        //isset id
        if ($id != false){
            $obj_comission = $Commissions->get_comssions_by_customer($id);
        }
        //get all bonus
        $obj_bonus = $Bonus->get_all();
        //send data
        $data = array(
            'obj_comission' => $obj_comission,
            'obj_bonus' => $obj_bonus,
            'session_name' => $session_name,
        );
        return view('admin/comisiones/load',$data);
    }

    public function validacion(){ 
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            //get data session
            $session = session();
            $id = $session->get('id');
            $Commissions = new CommissionsModel();
            $res = service('request')->getPost();
            $commissions_id = $res['commissions_id'];
            $date = formato_fecha_db_mes_dia_ano($res['date']);
            //update table commissions
            $param = array(
                    'amount' => $res['amount'],
                    'bonus_id' => $res['bonus_id'],
                    'date' => $date,
                    'active' => $res['active'],  
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $id
            );      
            $result = $Commissions->update($commissions_id, $param);
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
            $Commissions = new CommissionsModel();
            //get data post
            $res = service('request')->getPost();
            $id = $res['id'];
            //verify                     
            if($id != null){
                $result = $Commissions->eliminar($id);
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