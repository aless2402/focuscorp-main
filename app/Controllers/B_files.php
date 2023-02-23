<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Models\CommissionsModel;
use App\Controllers\B_perfil;

class B_files extends BaseController
{   
    public function index()
    {
        //get data session
        $id = $_SESSION['id'];
        //get data customer
        $Customer = new CustomerModel();
        $B_perfil =new B_perfil();
        $obj_customer = $Customer->get_data_customer_binary($id);
        //Verify the percentage of customization
        $percent_cust = $B_perfil->percentageofcustomization($obj_customer);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //get total commissions
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //set var
        $obj_earn_total = $obj_commission_total[0]->total_comissions;
        $obj_earn_disponible = $obj_commission_total[0]->total_disponible;
        //set title page
        $title = DOCUMENTS;
        //get data Customer
        $data = array(
            'title' => $title,
            'percent_cust' => $percent_cust,
            'obj_earn_total' => $obj_earn_total,
            'obj_earn_disponible' => $obj_earn_disponible,
            'obj_customer' => $obj_customer,
            'founder' => $obj_customer[0]->founder,
            'kit_id' => $obj_customer[0]->kit_id,
            'id' => $id,
            'tope' => $tope,
        );
        return view('admin/doc', $data);
    }
    

    public function media()
    {
        //get data session
        $id = $_SESSION['id'];
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_data_customer_binary($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //get total commissions
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //set var
        $obj_earn_total = $obj_commission_total[0]->total_comissions;
        $obj_earn_disponible = $obj_commission_total[0]->total_disponible;
        //set title page
        $title = DOCUMENTS;
        //get data Customer
        $data = array(
            'title' => $title,
            'obj_earn_total' => $obj_earn_total,
            'obj_earn_disponible' => $obj_earn_disponible,
            'obj_customer' => $obj_customer,
            'founder' => $obj_customer[0]->founder,
            'kit_id' => $obj_customer[0]->kit_id,
            'id' => $id,
            'tope' => $tope,
        );
        return view('admin/files_media', $data);
    }

    public function presentacion()
    {
        //get data session
        $id = $_SESSION['id'];
        //get data customer
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_data_customer_binary($id);
        //set tope FRONT
        $tope = $obj_customer[0]->tope;
        //get total commissions
        $Commissions = new CommissionsModel();
        $obj_commission_total = $Commissions->get_total_commission($id);
        //set var
        $obj_earn_total = $obj_commission_total[0]->total_comissions;
        $obj_earn_disponible = $obj_commission_total[0]->total_disponible;
        //set title page
        $title = DOCUMENTS;
        //get data Customer
        $data = array(
            'title' => $title,
            'obj_earn_total' => $obj_earn_total,
            'obj_earn_disponible' => $obj_earn_disponible,
            'obj_customer' => $obj_customer,
            'founder' => $obj_customer[0]->founder,
            'kit_id' => $obj_customer[0]->kit_id,
            'id' => $id,
            'tope' => $tope,
        );
        return view('backoffice_new/files_presentacion', $data);
    }
}
