<?php

namespace App\Controllers;
use App\Models\RangesModel;
use App\Models\CommissionsModel;

class D_rangos extends BaseController
{   
    public function index()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data point binary
        $Ranges = new RangesModel();
        $obj_ranges = $Ranges->get_all_crud();
        //send
        $data = array(
            'obj_ranges' => $obj_ranges,
            'session_name' => $session_name
        );
        return view('admin/rangos/rangos', $data);
    }
    
    public function nuevos_rangos()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data point binary
        $Ranges = new RangesModel();
        //get ranges by customer where range > 0
        $obj_ranges = $Ranges->get_range_by_customer();
        //send
        $data = array(
            'obj_ranges' => $obj_ranges,
            'session_name' => $session_name
        );
        return view('admin/rangos/nuevos_rangos', $data);
    }
    
    public function liderazgo()
    {
        $session = session();
        $db = \Config\Database::connect();
        //get data session
        $id = $session->get('id');
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        //get data point binary
        $Commissions = new CommissionsModel();
        //get ranges by customer where range > 0
        $obj_commissions = $Commissions->get_customer_bonus_liderazgo();
        //send
        $data = array(
            'obj_commissions' => $obj_commissions,
            'session_name' => $session_name
        );
        return view('admin/rangos/bonus_liderazgo', $data);
    }
    
    public function liderazgo_pagado(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            $session = session();
            $id = $session->get('id');
            $Commissions = new CommissionsModel();
            //get data post
            $request = \Config\Services::request();
            $comission_id = $request->getPostGet('comission_id');
            //verify ID
            if($comission_id != ""){
                //update table point_binary  
                $param = array(
                    'active' => 2,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $id
                    );          
                $result = $Commissions->update($comission_id, $param);
                //verify 
                if(!is_null($result)){
                    $data['status'] = true;
                }else{
                    $data['status'] = false;
                }     
                echo json_encode($data); 
                exit();
            }
        }
    }


    public function load($id=false){
        //get session
        $session = session();
        $session_name = $session->get('first_name')." ".$session->get('last_name');
        $Ranges = new RangesModel();
        $obj_ranges = null;
        //verify id
        if ($id != false){
            //get data bonus by bonus
            $obj_ranges = $Ranges->get_all_crud_by_id($id);
          }
        //send
        $data = array(
            'obj_ranges' => $obj_ranges,
            'session_name' => $session_name
        );
        return view('admin/rangos/load', $data);
    }

    public function validacion(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            $session = session();
            $db = \Config\Database::connect();
            $id = $session->get('id');
            $Ranges = new RangesModel();
            //get data post
            $request = \Config\Services::request();
            $range_id = $request->getPostGet('range_id');
            $name = $request->getPostGet('name');
            $point_personal = $request->getPostGet('point_personal');
            $point_grupal = $request->getPostGet('point_grupal');
            $active = $request->getPostGet('active');
            //verify ID
            if($range_id != ""){
                //update table point_binary  
                $param = array(
                    'name' => $name,
                    'point_personal' => $point_personal,
                    'point_grupal' => $point_grupal,
                    'active' => $active,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'updated_by' => $id
                    );          
                $result = $Ranges->update($range_id, $param);
                //verify 
                if(!is_null($result)){
                    $data['status'] = true;
                }else{
                    $data['status'] = false;
                }     
                echo json_encode($data); 
                exit();
            }
        }
    }

    public function eliminar(){
        //ACTIVE CUSTOMER NORMALY
        if ($this->request->isAJAX()) {
            $session = session();
            $db = \Config\Database::connect();
            $Points_binary = new Points_binaryModel();
            //get data post
            $res = service('request')->getPost();
            $id = $res['id'];
            //verify                     
            if($id != null){
                $result = $Points_binary->eliminar($id);
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
