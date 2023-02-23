<?php
namespace App\Models;
use CodeIgniter\Model;

class PayModel extends Model{
    
    protected $table      = 'pay';
    protected $primaryKey = 'pay_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['pay_id',
                                'customer_id', 
                                'date',  
                                'date_pay',  
                                'hash_id',  
                                'amount',  
                                'descount',  
                                'amount_total',  
                                'type_cripto',  
                                'obs', 
                                'active', 
                                'status_value', 
                                'created_at', 
                                'created_by', 
                                'updated_at', 
                                'updated_by',
                                ];
    protected $useTimestamps = false;

    public function get_all(){
            $obj_kit =  $this->db->query("select * from pay");
            return $obj_kit->getResult();
    }

    public function get_search_by_id($id){
        $obj_result =  $this->db->query("SELECT pay.date, pay.amount, pay.pay_id, pay.descount, pay.active, customer.usdt, customer.pay , customer.first_name, customer.last_name, customer.username
                                         FROM pay 
                                         JOIN customer
                                         ON pay.customer_id = customer.customer_id
                                         WHERE pay.customer_id = $id and pay.status_value = 1
                                         ORDER BY pay.date DESC");
        return $obj_result->getResult();
    }

    public function comision_disponible($id){
        $obj_data =  $this->db->query("SELECT sum(amount) as total_comissions,
                                       (SELECT sum(amount) FROM commissions WHERE customer_id = $id and bonus_id <> 3) as total_disponible
                                       FROM commissions
                                       WHERE customer_id = $id and active = 1 and bonus_id <> 9 and bonus_id <> 3");
        return $obj_data->getResult();
    }

    public function get_data_by_customer(){
        $obj_data =  $this->db->query("SELECT `pay`.`pay_id`, `pay`.`date`, `pay`.`amount`, `pay`.`descount`, `pay`.`amount_total`, `pay`.`active`, `customer`.`customer_id`, `customer`.`first_name`, `customer`.`username`, `customer`.`usdt`, `customer`.`last_name` 
                                     FROM (`pay`) JOIN `customer` ON `pay`.`customer_id` = `customer`.`customer_id` 
                                     ORDER BY `pay`.`pay_id` DESC");
        return $obj_data->getResult();
    }

    public function get_data_by_customer_id($id){
        $obj_data =  $this->db->query("SELECT `pay`.`pay_id`, `pay`.`amount`, `pay`.`descount`, `pay`.`amount_total`, `pay`.`date`,`pay`.`hash_id`,`pay`.`obs`, `pay`.`active`, `pay`.`customer_id`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`username` 
                                      FROM (`pay`) 
                                      JOIN `customer` ON `pay`.`customer_id` = `customer`.`customer_id` 
                                      WHERE `pay_id` = $id");
        return $obj_data->getResult();
    }

    public function get_crud_pay(){
        $obj_data =  $this->db->query("SELECT `pay`.`pay_id`, `pay`.`date`, `pay`.`amount`, `pay`.`descount`, `pay`.`amount_total`, `pay`.`hash_id`, `pay`.`active`, `customer`.`customer_id`, `customer`.`first_name`, `customer`.`username`, `customer`.`email`, `customer`.`usdt`, `paises`.`nombre` as pais, `customer`.`last_name` 
                                      FROM (`pay`) 
                                      JOIN `customer` ON `pay`.`customer_id` = `customer`.`customer_id` 
                                      JOIN `paises` ON `customer`.`country` = `paises`.`id` 
                                      WHERE `paises`.`id_idioma` = 7 ORDER BY `pay`.`pay_id` DESC");
        return $obj_data->getResult();
    }

    public function get_pending_pay(){
        $obj_data =  $this->db->query("SELECT sum(amount) as pending_total_pay FROM (`pay`) WHERE `active` = 1");
        return $obj_data->getResult();
    }

    public function insertar($data){
        $query = $this->db->table('pay');
        $query->insert($data);
        return $this->db->insertId();
    }
}