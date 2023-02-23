<?php
namespace App\Models;
use CodeIgniter\Model;

class Pay_commissionModel extends Model{
    
    protected $table      = 'pay_commission';
    protected $primaryKey = 'pay_commission_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['pay_commission_id',
                                'pay_id', 
                                'commissions_id',  
                                'status_value',  
                                'created_at',  
                                'created_by',  
                                'updated_at',  
                                'updated_by',  
                                ];
    protected $useTimestamps = false;

    public function get_commission_id($id){
        $obj_kit =  $this->db->query("SELECT commissions_id FROM pay_commission WHERE pay_id = $id");
        return $obj_kit->getResult();
    }

    public function get_all(){
            $obj_kit =  $this->db->query("select * from pay_commission");
            return $obj_kit->getResult();
    }

    public function get_search_by_id($id){
        $obj_result =  $this->db->query("SELECT pay.date, pay.amount, pay.pay_id, pay.descount, pay.active, customer.usdt, customer.pay 
                                         FROM pay 
                                         JOIN customer
                                         ON pay.customer_id = customer.customer_id
                                         WHERE pay.customer_id = $id and pay.status_value = 1
                                         ORDER BY pay.date DESC");
        return $obj_result->getResult();
    }

    public function insertar($data){
        $obj_comments = $this->db->table('pay_commission');
        $obj_comments->insert($data);
        return $this->db->insertId();
    }
}