<?php

namespace App\Controllers;
use App\Models\CustomerModel;
use App\Models\BonusModel;
use App\Models\CommissionsModel;
use App\Models\Points_binaryModel;

class D_pagos_diarios extends BaseController
{   
    public function index()
    {
            //get data customer active
            $Commissions = new CommissionsModel();
            $Customer = new CustomerModel();
            $obj_customer = $Customer->get_customer_active();
            //set pay and verify 200%
            $Bonus = new BonusModel();
            $obj_pay_dialy = $Bonus->get_percent_bonus_pagos_diarios();
            $percent = $obj_pay_dialy[0]->percent;
            //pay
            foreach($obj_customer as $value){
                $amount = ($value->price * $percent) / 100;
                //verify tope
                $result = $this->get_all_commission($value->customer_id, $amount, $value->tope_amount);
                if($result < 0){
                    $amount = $amount + $result;
                    //insert pay dialy
                    $param = array(
                        'sell_id' => 0,
                        'customer_id' => $value->customer_id,
                        'bonus_id' => $obj_pay_dialy[0]->bonus_id,
                        'amount' => $amount,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 1,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => 1,
                    );
                    $Commissions->insertar($param); 
                    //updated customer
                    $data_customer = array(
                        'tope' => 1,
                        'active' => 0,
                        'status_value' => 1,
                    ); 
                    $Customer->update($value->customer_id, $data_customer);
                }else{
                    //insert pay dialy on table comission
                    $param = array(
                        'sell_id' => 0,
                        'customer_id' => $value->customer_id,
                        'bonus_id' => $obj_pay_dialy[0]->bonus_id,
                        'amount' => $amount,
                        'date' => date("Y-m-d H:i:s"),
                        'active' => 1,
                        'status_value' => 1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'created_by' => 1,
                    ); 
                    $Commissions->insertar($param);
                }
            }
            echo "Realizado con éxito";
    }

    public function binario(){  

        $date_now = date('d-m-Y');
        $date_past = strtotime('-1 day', strtotime($date_now));
        $date_past = date('Y-m-d', $date_past);
        //get customer last two day
        $Commissions = new CommissionsModel();
        $Customer = new CustomerModel();
        $obj_customer = $Customer->get_customer_crone_binario($date_past);
        //get points
        foreach($obj_customer as $value){
            //verify binary active
            if($value->binary_active == 1){
                $Points_binary = new Points_binaryModel();
                $obj_points = $Points_binary->get_left_right_by_customer($value->customer_id);
                //set value point
                $points_left = $obj_points[0]->total_left;
                $points_right = $obj_points[0]->total_right;
                //verify left power    
                if($points_left > $points_right){
                    $real_point = $points_right;
                }elseif($points_right > $points_left){
                    $real_point = $points_left;
                }else{
                    $real_point = $points_left;
                }
                if($real_point > 0){
                    $percent = 0.10;
                    $amount = $real_point * $percent;
                    //verify tope
                    $result = $this->get_tope($value->customer_id, $amount, $value->tope_amount);
                    //verify
                    if($result < 0){
                        $amount = $amount + $result;
                        //insert pay dialy
                        $data = array(
                            'sell_id' => 0,
                            'customer_id' => $value->customer_id,
                            'bonus_id' => 8,
                            'amount' => $amount,
                            'date' => date("Y-m-d H:i:s"),
                            'active' => 1,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => 1,
                        ); 
                        $Commissions->insertar($data);
                        //updated customer
                        $param = array(
                            'tope' => 1,
                            'active' => 0,
                            'status_value' => 1,
                        ); 
                        $Customer->update($value->customer_id, $param);
                    }else{
                        //insert pay dialy
                        $data = array(
                            'sell_id' => 0,
                            'customer_id' => $value->customer_id,
                            'bonus_id' => 8,
                            'amount' => $amount,
                            'date' => date("Y-m-d H:i:s"),
                            'active' => 1,
                            'status_value' => 1,
                            'created_at' => date("Y-m-d H:i:s"),
                            'created_by' => 1,
                        ); 
                      $Commissions->insertar($data);
                    }
                    //update point
                    $param = array(
                        'customer_id' => $value->customer_id,
                        'left' => -$real_point,
                        'right' => -$real_point,
                        'date' => date("Y-m-d H:i:s"),
                        'status' => 2,
                    ); 
                    $Points_binary->insertar($param);
                } 
            }
        }
        echo "Binario con Exito";
    }

    public function get_all_commission($customer_id, $amount, $tope_amount){  
        //get total gain
        $Commissions = new CommissionsModel();
        $obj_total_commissions = $Commissions->get_total_commission_by_customer($customer_id);
        $total = $obj_total_commissions[0]->total_comissions;
        $new_total = $total + $amount;
        $result =  $tope_amount - $new_total;
        return $result;
    }

    public function get_tope($customer_id, $amount, $tope_amount){  
        //get total gain
        $Commissions = new CommissionsModel();
        $obj_total_commissions = $Commissions->get_total_commission_by_customer($customer_id);
        //set var        
        $total = $obj_total_commissions[0]->total_comissions;
        $new_total = $total + $amount;
        $result =  $tope_amount - $new_total;
        return $result;
    }


    public function rangos(){

        //get data customer active
        $Commissions = new CommissionsModel();
        $Customer = new CustomerModel();
        $Points_binary = new Points_binaryModel();
        //set date
        /*$date_now = date('Y-m-d');
        $date_past = date("Y-m-d", strtotime('-90 day', strtotime($date_now)));*/
        $month_menos_1 = date('Y-m', strtotime('-1 month'));
        //get month and year
        $explo = explode('-' ,$month_menos_1);
        $year = $explo[0];
        $month = $explo[1];
        //get first day month
        $first_month_day = first_month_day($month,$year);
        $last_month_day = last_month_day($month,$year);
        $last_month_day = date("Y-m-d", strtotime('+1 day', strtotime($last_month_day)));
        //get data commission customer from month and active binary
        $obj_commissions = $Commissions->get_total_commission_by_customer_ranges($first_month_day, $last_month_day);
        //VERIFY RANGE
        foreach ($obj_commissions as $value_pricipal) {
          //Get points by customer
          $obj_points_binary = $Points_binary->get_point_by_customer_ranges($value_pricipal->customer_id, $first_month_day, $last_month_day);
          //set value point
          $points_left = $obj_points_binary[0]->total_point_left;
          $points_right = $obj_points_binary[0]->total_point_right;
          //verify left power    
           if($points_left > $points_right){
              $real_point = $points_right;
           }elseif($points_right > $points_left){
              $real_point = $points_left;
           }else{
              $real_point = $points_left;
           }
          //verify range CONSULTANT
          if ($real_point >= 2000 && $real_point < 5000) {
              //set id range
              $range_next_id = 1;
              if($range_next_id > $value_pricipal->range_id){
                  //set param
                $param = array(
                    'range_id' => $range_next_id
                ); 
                $Customer->update($value_pricipal->customer_id, $param);
              }
          //VISIONARIO
          }elseif($real_point >= 5000 && $real_point < 10000){
              //set id range
              $range_next_id = 2;
              if($range_next_id > $value_pricipal->range_id){
                  //set param
                $param = array(
                    'range_id' => $range_next_id
                ); 
                $Customer->update($value_pricipal->customer_id, $param);
              }
          //LEADER    
          }elseif($real_point >= 10000 && $real_point < 20000){
            //set id range
            $range_next_id = 3;
            if($range_next_id > $value_pricipal->range_id){
                //set param
              $param = array(
                  'range_id' => $range_next_id
              ); 
              $Customer->update($value_pricipal->customer_id, $param);
              //insert comission 100$
              $data = array(
                  'customer_id' => $value_pricipal->customer_id,
                  'sell_id' => 0,
                  'bonus_id' => 3,
                  'amount' => 100,
                  'date' => date("Y-m-d H:i:s"),
                  'active' => 1,
                  'status_value' => 1,
                  'created_at' => date("Y-m-d H:i:s"),
              );
              $Commissions->insertar($data);
            }
        //Team Leader    
        }elseif($real_point >= 20000 && $real_point < 40000){
            //set id range
            $range_next_id = 4;
            if($range_next_id > $value_pricipal->range_id){
                //set param
              $param = array(
                  'range_id' => $range_next_id
              ); 
              $Customer->update($value_pricipal->customer_id, $param);
                //insert comission 200$
                $data = array(
                    'customer_id' => $value_pricipal->customer_id,
                    'sell_id' => 0,
                    'bonus_id' => 3,
                    'amount' => 200,
                    'date' => date("Y-m-d H:i:s"),
                    'active' => 1,
                    'status_value' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                );
                $Commissions->insertar($data);
            }
        //Titan  
        }elseif($real_point >= 40000 && $real_point < 80000){
            //set id range
            $range_next_id = 5;
            if($range_next_id > $value_pricipal->range_id){
                //set param
              $param = array(
                  'range_id' => $range_next_id
              ); 
              $Customer->update($value_pricipal->customer_id, $param);
            }
        //Gen X 
        }elseif($real_point >= 80000 && $real_point < 120000){
            //set id range
            $range_next_id = 6;
            if($range_next_id > $value_pricipal->range_id){
                //set param
              $param = array(
                  'range_id' => $range_next_id
              ); 
              $Customer->update($value_pricipal->customer_id, $param);
            }
            
        }elseif($real_point >= 120000){
            //set id range
            $range_next_id = 7;
            if($range_next_id > $value_pricipal->range_id){
                //set param
              $param = array(
                  'range_id' => $range_next_id
              ); 
              $Customer->update($value_pricipal->customer_id, $param);
            }
        }
      }
      echo "Realizado con exito rangos";
    }
}
