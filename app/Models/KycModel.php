<?php
namespace App\Models;
use CodeIgniter\Model;

class KycModel extends Model{
    
    protected $table      = 'kyc';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'customer_id', 'date', 'anverso', 'reverso'];
    protected $useTimestamps = false;

    public function get_all(){
        $obj_result =  $this->db->query("SELECT * FROM (`kyc`)");
        return $obj_result->getResult();
    }

    public function verify_customer_id_kyc($id){
        $obj_result =  $this->db->query("SELECT id FROM kyc
                                         WHERE customer_id = $id");
        //get only 1 row
        return $obj_result->getRow();
    }

    public function get_by_id($id){
        $obj_result =  $this->db->query("SELECT *  FROM kyc
                                         WHERE id = $id");
        return $obj_result->getResult();
    }

    public function get_customer_kyc(){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`email`, `customer`.`dni`, `customer`.`phone`, `customer`.`address`, `customer`.`kyc`, `customer`.`status_value`, `kyc`.`anverso`, `kyc`.`reverso`, `kyc`.`date` 
                                        FROM (`customer`) 
                                        JOIN `kyc` ON `kyc`.`customer_id` = `customer`.`customer_id` 
                                        WHERE `customer`.`kyc` = 1 and customer.status_value = 1");
        return $obj_result->getResult();
    }
    
    public function get_customer_kyc_verify(){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`email`, `customer`.`dni`, `customer`.`phone`, `customer`.`address`, `customer`.`kyc`, `customer`.`status_value`, `kyc`.`anverso`, `kyc`.`reverso`, `kyc`.`date` 
                                        FROM (`customer`) 
                                        JOIN `kyc` ON `kyc`.`customer_id` = `customer`.`customer_id` 
                                        WHERE `customer`.`kyc` = 2 and customer.status_value = 1");
        return $obj_result->getResult();
    }

    public function insertar($data){
        $obj_comments = $this->db->table('kyc');
        $obj_comments->insert($data);
        return $this->db->insertId();
    }
}