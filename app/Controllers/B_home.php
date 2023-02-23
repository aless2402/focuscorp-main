<?php

namespace App\Controllers;
use App\Models\CommissionsModel;
use App\Models\CustomerModel;
use App\Models\PayModel;
use App\Models\RangesModel;
use App\Models\Points_binaryModel;

class B_home extends BaseController
{   
    public function index()
    {
        $db = \Config\Database::connect();
        //get data session
        $id = $_SESSION['id'];
        //get data point ranges
        $year = date("Y");
        $month = date("m");
        //get data customer
        $Customer = new CustomerModel();
        //get all row
        $obj_customer = $Customer->get_all_data($id);
        //send tope template
        $temporal = $obj_customer[0]->temporal;
        $binary_active = $obj_customer[0]->binary_active;
        $left_active = $obj_customer[0]->left_active;
        $right_active = $obj_customer[0]->right_active;
        $node = $obj_customer[0]->node;
        $total_point_binary = $obj_customer[0]->total_point_left + $obj_customer[0]->total_point_right;
        //where total partner
        if($id == 1){
            $where_total_partner = "binary.node like '%1L,' or binary.node like '%1R,'";
            $where_total_left = "binary.node like '%L,1L,%'";
            $where_total_right = "binary.node like '%R,1R,%'";
        }else{
            $where_total_partner = "binary.node like '%$node'";
            $where_total_left = "binary.node like '%L,$node'";
            $where_total_right = "binary.node like '%R,$node'"; 
        } 
        //get all socios by id
        $obj_total_partner = $db->query("SELECT count(id) as total_partner FROM `binary` WHERE $where_total_partner")->getResult();
        $total_partner = $obj_total_partner[0]->total_partner - 1;  
        //get month and year
        $month = date('m');
        $year = date('Y');
        $first_day = first_month_day($month, $year);
        $last_day = last_month_day($month,$year);
        $last_day = date("Y-m-d", strtotime('+1 day', strtotime($last_day)));
        //get data Commissions by year 
        $Commissions = new CommissionsModel();
        $obj_commission_by_year = $Commissions->commission_by_year($id, $where_total_left, $where_total_right);
        //set varibale
        $total_comissions = $obj_commission_by_year[0]->total_comissions;
        $total_disponible = $obj_commission_by_year[0]->total_disponible;
        $total_partner_left = $obj_commission_by_year[0]->total_partner_left;
        $total_partner_right = $obj_commission_by_year[0]->total_partner_right;
        $total_pagos_diarios = $obj_commission_by_year[0]->total_pagos_diarios;
        //get data comission
        $obj_commissions = $Commissions->get_commission_data($id);
        //get range_id and next range
        $Ranges = new RangesModel();
        $obj_ranges = $Ranges->get_range_next($id, $first_day, $last_day);
        //select the lowest score
        if($obj_ranges[0]->total_point_left > $obj_ranges[0]->total_point_right){
            $point = $obj_ranges[0]->total_point_right;
        }elseif($obj_ranges[0]->total_point_right > $obj_ranges[0]->total_point_left){
            $point = $obj_ranges[0]->total_point_left;
        }else{
            $point = $obj_ranges[0]->total_point_left;
        }
        //set percent
        if($point > 0){
            $percent = ($point / $obj_ranges[0]->next_range_point)*100;
            if($percent > 100){
                $percent = 100;
            }
        }else{
            $percent = 0;
        }
        //set circle
        $tope_amount = $obj_customer[0]->tope_amount; 
        if($tope_amount == 0){
            $percent_cicle = 0;
            $grade = 0;
            $missing = 0;
        }else{
            $percent_cicle = ($total_comissions / $tope_amount) * 100;
            $percent_cicle = format_number_miles($percent_cicle);
            //62;
            $grade = ($percent_cicle /100) * 180;
            $missing = $tope_amount - $total_comissions;
        } 
        //set data view
        $data = array(
            'obj_customer' => $obj_customer,
            'obj_ranges' => $obj_ranges,
            'total_comissions' => $total_comissions,
            'total_disponible' => $total_disponible,
            'total_pagos_diarios' => $total_pagos_diarios,
            'total_point_binary' => $total_point_binary,
            'obj_commissions' => $obj_commissions,
            'total_partner' => $total_partner,
            'binary_active' => $binary_active,
            'left_active' => $left_active,
            'right_active' => $right_active,
            'temporal' => $temporal,
            'grade' => $grade,
            'percent_cicle' => $percent_cicle,
            'tope_amount' => $tope_amount,
            'missing' => $missing,
            'point' => $point,
            'percent' => $percent,
            'total_partner_left' => $total_partner_left,
            'total_partner_right' => $total_partner_right,
            'kit_id' => $obj_customer[0]->kit_id,
        );

        //return view('backoffice_new/home', $data);

        return view('admin/home', $data);



        //return view('backoffice/home', $data);
    }

    public function temporal() {
        if ($this->request->isAJAX()) {
            $Customer = new CustomerModel();
            //get session
            $session = session();
            //get data session
            $customer_id = $session->get('id');
            $request = \Config\Services::request();
            $temporal = $request->getPostGet('position');
            //insert table customer
            $param = array(
                'temporal' => $temporal,
            ); 
            $result = $Customer->update($customer_id, $param);
            if(!is_null($result)){
                $data['status'] = true;
            }else{
                $data['status'] = false;
            }
        }
        echo json_encode($data);
        exit();
    }

    public function logout()
    {
        $session = session();
        //$session->sess_destroy();
        $ses_data = [
            'id' => '',
            'name' => '',
            'email' => '',
            'isLoggedIn' => FALSE
        ];
        $session->set($ses_data);
        return redirect()->to('/iniciar-sesion');
    }
}
