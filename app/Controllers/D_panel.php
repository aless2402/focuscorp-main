<?php

namespace App\Controllers;
use App\Models\CustomerModel;

class D_panel extends BaseController
{   
    public function index()
    {
        //get data session
        $id = $_SESSION['id'];
        $session_name = $_SESSION['first_name']." ".$_SESSION['last_name'];
        //get data invoices by customer
        $Customer =new CustomerModel();
        //get year
        $year = date("Y");
        $new_year = date('Y', strtotime('+1 year', strtotime($year)) );
        //get all partnert by id
        $obj_pending = $Customer->get_all_panel($year, $new_year);
        //get data
        $data = array(
            'obj_pending' => $obj_pending,
            'session_name' => $session_name
        );
        return view('admin/panel', $data);
    }
}
