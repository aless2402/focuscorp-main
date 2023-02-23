<?php
namespace App\Models;
use CodeIgniter\Model;

class CustomerModel extends Model{
    
    protected $table      = 'customer';
    protected $primaryKey = 'customer_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['customer_id', 
                                'kit_id', 
                                'range_id', 
                                'username', 
                                'email', 
                                'password', 
                                'first_name', 
                                'last_name', 
                                'pin', 
                                'kyc', 
                                'dni', 
                                'founder', 
                                'verification_phone', 
                                'date_start', 
                                'date_end', 
                                'address', 
                                'usdt', 
                                'ltc', 
                                'country', 
                                'phone', 
                                'financy', 
                                'tope', 
                                'avatar', 
                                'tope_amount', 
                                'qty_renovation', 
                                'temporal', 
                                'pay', 
                                'date_pay', 
                                'date_new_pay',  
                                'active', 
                                'status_value', 
                                'created_at', 
                                'created_by', 
                                'updated_at', 
                                'updated_by'];
    protected $useTimestamps = false;

    public function get_search_by_id($id){
        $obj_result =  $this->db->query("SELECT * FROM customer WHERE customer_id = $id and status_value = 1");
        return $obj_result->getResult();
    }

    public function get_search_by_username($username){
        $obj_result =  $this->db->query("SELECT * FROM customer WHERE username = '$username' and status_value = 1");
        return $obj_result->getResult();
    }

    public function get_all_data($id){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`,`customer`.`username`, `customer`.`active`,`customer`.`avatar`, `customer`.`temporal`, `customer`.`founder`,`customer`.`tope_amount`,`customer`.`tope`,`customer`.`qty_renovation`, `kit`.`name` as kit, `kit`.`kit_id`, `kit`.`img` as kit_img, `ranges`.`range_id`, `ranges`.`img`, `ranges`.`name`, `binary`.`binary_active`, `binary`.`left_active`, `binary`.`right_active`,`binary`.`node`,
                                        (select count(*) FROM unilevel WHERE ident like '%$id%') as total_register,
                                        (select sum(points_binary.left) FROM points_binary WHERE customer_id = '$id') as total_point_left,
                                        (select sum(points_binary.right) FROM points_binary WHERE customer_id = '$id') as total_point_right,    
                                        (select count(*) as total_referred FROM unilevel WHERE `unilevel`.`parend_id` = $id and unilevel.status_value = 1) as total_referred    
                                        FROM (customer) 
                                        JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `ranges` ON `customer`.`range_id` = `ranges`.`range_id` 
                                        JOIN `binary` ON `customer`.`customer_id` = `binary`.`customer_id` 
                                        WHERE `customer`.`customer_id` = $id and customer.status_value = 1");
        return $obj_result->getResult();
    }

    public function get_data_customer($id){
        $obj_result =  $this->db->query("SELECT * FROM (`customer`) JOIN `binary` ON `customer`.`customer_id` = `binary`.`customer_id` WHERE `customer`.`customer_id` = $id");
        return $obj_result->getResult();
    }

    public function get_data_customer_perfil($id){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`,`customer`.`username`, `customer`.`avatar`,`customer`.`kyc`,`customer`.`kit_id`,`customer`.`pin`,`customer`.`verification_phone`, `customer`.`avatar`,`customer`.`country`, `customer`.`email`, `customer`.`first_name`, `customer`.`last_name`,`customer`.`founder`, `customer`.`usdt`, `customer`.`ltc`, `customer`.`created_at`, `customer`.`date_start`, `customer`.`address`, `customer`.`phone`, `customer`.`dni`, `customer`.`tope`, `customer`.`active`, `paises`.`id` as country, `paises`.`nombre` as pais, `paises`.`id_wsp`, `paises`.`img`, `kit`.`name` as kit 
                                        FROM (`customer`) 
                                        JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `paises` ON `customer`.`country` = `paises`.`id` 
                                        WHERE `customer`.`customer_id` = $id and customer.status_value = 1 and paises.id_idioma = 7");
        return $obj_result->getResult();
    }

    public function get_data_customer_binary($id){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`kyc`,`customer`.`pin`, `customer`.`avatar`,`customer`.`username`,`customer`.`email`, `customer`.`first_name`, `customer`.`last_name`,`customer`.`founder`, `customer`.`kit_id`, `customer`.`range_id`, `customer`.`tope`,  
                                        (select sum(points_binary.left) FROM points_binary WHERE customer_id = $id) as total_point_left, 
                                        (select sum(points_binary.right) FROM points_binary WHERE customer_id = $id) as total_point_right, 
                                        `customer`.`active`, `kit`.`name` as kit_name, `kit`.`img` as kit_img, `ranges`.`name` as range_name, `binary`.`node`, `binary`.`qty_node`, `paises`.`img` as pais_img, `paises`.`nombre` as pais, `binary`.`node` 
                                        FROM (`customer`) JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` JOIN `ranges` ON `customer`.`range_id` = `ranges`.`range_id` 
                                        JOIN `binary` ON `customer`.`customer_id` = `binary`.`customer_id` 
                                        JOIN `paises` ON `paises`.`id` = `customer`.`country` 
                                        WHERE `customer`.`customer_id` = $id and customer.status_value = 1 and paises.id_idioma = 7");
        return $obj_result->getResult();
    }

    public function get_data_customer_binary_second($where){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`avatar`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`kit_id`, `customer`.`range_id`, `customer`.`active`, `kit`.`name` as kit_name, `kit`.`img` as kit_img, `ranges`.`name` as range_name, `binary`.`node`, `binary`.`leg`, `paises`.`img` as pais_img, `binary`.`qty_node` 
                                        FROM (`customer`) 
                                        JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `ranges` ON `customer`.`range_id` = `ranges`.`range_id` 
                                        JOIN `binary` ON `customer`.`customer_id` = `binary`.`customer_id` 
                                        JOIN `paises` ON `paises`.`id` = `customer`.`country` 
                                        WHERE $where");
        return $obj_result->getResult();
    }

    public function get_data_customer_binary_third($where){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`kit_id`, `customer`.`range_id`, `customer`.`active`, `kit`.`name` as kit_name, `kit`.`img` as kit_img, `ranges`.`name` as range_name, `binary`.`node`, `binary`.`leg`, `paises`.`img` as pais_img, `binary`.`qty_node` 
                                        FROM (`customer`) 
                                        JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `ranges` ON `customer`.`range_id` = `ranges`.`range_id` 
                                        JOIN `binary` ON `customer`.`customer_id` = `binary`.`customer_id` 
                                        JOIN `paises` ON `paises`.`id` = `customer`.`country` 
                                        WHERE $where");
        return $obj_result->getResult();
    }

    public function get_data_customer_binary_fourth($where){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`kit_id`, `customer`.`range_id`, `customer`.`active`, `kit`.`name` as kit_name, `kit`.`img` as kit_img, `ranges`.`name` as range_name, `binary`.`node`, `binary`.`leg`, `paises`.`img` as pais_img, `binary`.`qty_node` 
                                        FROM (`customer`) 
                                        JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `ranges` ON `customer`.`range_id` = `ranges`.`range_id` 
                                        JOIN `binary` ON `customer`.`customer_id` = `binary`.`customer_id` 
                                        JOIN `paises` ON `paises`.`id` = `customer`.`country` 
                                        WHERE $where");
        return $obj_result->getResult();
    }
    
    public function get_data_customer_range($id){
        $obj_result =  $this->db->query("SELECT `ranges`.`range_id`, `ranges`.`img`, `ranges`.`name`, `customer`.`username`,`customer`.`pin`,`customer`.`kyc`, `customer`.`customer_id`,`customer`.`kit_id`,`customer`.`verification_phone`, `customer`.`avatar`, `customer`.`email`, `customer`.`first_name`, `customer`.`last_name`,`customer`.`founder`,`customer`.`tope`,`kit`.`name` as kit,`paises`.`nombre` as pais, 
                                        (select sum(points_binary.left) FROM points_binary WHERE customer_id = $id and status = 1) as total_point_left,
                                        (select sum(points_binary.right) FROM points_binary WHERE customer_id = $id and status = 1) as total_point_right   
                                        FROM (`customer`) 
                                        JOIN `ranges` ON `customer`.`range_id` = `ranges`.`range_id` 
                                        JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `paises` ON `paises`.`id` = `customer`.`country` 
                                        WHERE `customer`.`customer_id` = $id and customer.status_value = 1 and paises.id_idioma = 7");
        return $obj_result->getResult();
    }
    
    public function get_all_customer_inactive(){
        $obj_result =  $this->db->query("SELECT `username`, `first_name`, `last_name`, `dni`, `customer_id` 
                                        FROM (`customer`) 
                                        WHERE `active` = 0");
        return $obj_result->getResult();
    }

    public function get_customer_by_kit(){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`username`,`customer`.`usdt`, `customer`.`first_name`, `customer`.`email`, `customer`.`last_name`, `customer`.`created_at`, `customer`.`active`, `kit`.`name` as kit, `customer`.`status_value` 
                                        FROM (`customer`) 
                                        JOIN `kit` ON `kit`.`kit_id` = `customer`.`kit_id` 
                                        WHERE `customer`.`status_value` = 1");
        return $obj_result->getResult();
    }

    public function get_customer_register($username){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`username`, `customer`.`temporal`, `binary`.`qty_node` , `binary`.`node`
                                        FROM (`customer`) 
                                        JOIN `binary` 
                                        ON `customer`.`customer_id` = `binary`.`customer_id` 
                                        WHERE `username` = '$username'");
        return $obj_result->getResult();
    }

    public function get_customer_active(){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `kit`.`name`, `kit`.`price`, `customer`.`tope_amount`, `customer`.`active` 
                                        FROM (`customer`) 
                                        JOIN `kit` 
                                        ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        WHERE `kit`.`type` = 1 and kit.price >= 100 and customer.active = 1 and customer.tope = 0 and customer.financy <> 1");
        return $obj_result->getResult();
    }    
    
    public function get_customer_crone_binario($date){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`tope_amount`, `kit`.`price`,`binary`.`binary_active`
                                        FROM (`customer`) 
                                        JOIN `points_binary` ON `points_binary`.`customer_id` = `customer`.`customer_id` 
                                        JOIN `kit` ON `kit`.`kit_id` = `customer`.`kit_id` 
                                        JOIN `binary` ON `binary`.`customer_id` = `customer`.`customer_id` 
                                        WHERE `points_binary`.`date` > '$date' GROUP BY `customer`.`customer_id`");
        return $obj_result->getResult();
    }

    public function comisiones_by_system(){
        $obj_result =  $this->db->query("SELECT `commissions`.`commissions_id`, `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `commissions`.`amount`, `commissions`.`date`, `commissions`.`active`, `bonus`.`bonus_id` 
                                        FROM (`customer`) 
                                        JOIN `commissions` ON `customer`.`customer_id` = `commissions`.`customer_id` 
                                        JOIN `bonus` ON `commissions`.`bonus_id` = `bonus`.`bonus_id` 
                                        WHERE `bonus`.`name` = 'Sistema'");
        return $obj_result->getResult();
    }

    public function comisiones_by_system_id($id){
        $obj_result =  $this->db->query("SELECT `commissions`.`commissions_id`, `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`dni`, `commissions`.`amount`, `commissions`.`date`, `commissions`.`active`, `bonus`.`bonus_id` 
                                        FROM (`customer`) 
                                        JOIN `commissions` ON `customer`.`customer_id` = `commissions`.`customer_id` 
                                        JOIN `bonus` ON `commissions`.`bonus_id` = `bonus`.`bonus_id` 
                                        WHERE commissions.commissions_id = $id");
        return $obj_result->getResult();
    }

    public function comisiones_by_discount(){
        $obj_result =  $this->db->query("SELECT `commissions`.`commissions_id`, `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `commissions`.`amount`, `commissions`.`date`, `commissions`.`active`, `bonus`.`bonus_id` 
                                        FROM (`customer`) 
                                        JOIN `commissions` ON `customer`.`customer_id` = `commissions`.`customer_id` 
                                        JOIN `bonus` ON `commissions`.`bonus_id` = `bonus`.`bonus_id` 
                                        WHERE commissions.discount_system = 1");
        return $obj_result->getResult();
    }

    public function get_point_binary_by_customer(){
        $obj_result =  $this->db->query("SELECT `points_binary`.`id`, `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `points_binary`.`left`, `points_binary`.`right`, `points_binary`.`date`, `points_binary`.`status` 
                                        FROM (`customer`) 
                                        JOIN `points_binary` 
                                        ON `points_binary`.`customer_id` = `customer`.`customer_id` 
                                        WHERE `points_binary`.`system` = 1");
        return $obj_result->getResult();
    }

    public function get_point_binary_by_customer_by_id($id){
        $obj_result =  $this->db->query("SELECT `points_binary`.`id`, `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`dni`, `points_binary`.`left`, `points_binary`.`right`, `points_binary`.`date`, `points_binary`.`status` 
                                        FROM (`customer`) 
                                        JOIN `points_binary` 
                                        ON `points_binary`.`customer_id` = `customer`.`customer_id` 
                                        WHERE `points_binary`.`id` = $id");
        return $obj_result->getResult();
    }

    public function get_all_panel($year, $new_year){
        $obj_result =  $this->db->query("SELECT sum(kit.price) as total_invest, 
                                        (select count(*) from customer) as total_customer, 
                                        (select count(*) from customer where financy = 0 and active = 1) as total_customer_active, 
                                        (select sum(amount) from pay where active = 2) as total_pagos, 
                                        (select count(*) from customer where created_at >= '$year-01-01' and created_at <= '$year-02-01' and customer.financy = 0 and customer.active = 1) as total_ene, 
                                        (select count(*) from customer where created_at >= '$year-02-01' and created_at <= '$year-03-01' and customer.financy = 0 and customer.active = 1) as total_feb, 
                                        (select count(*) from customer where created_at >= '$year-03-01' and created_at <= '$year-04-01' and customer.financy = 0 and customer.active = 1) as total_mar, 
                                        (select count(*) from customer where created_at >= '$year-04-01' and created_at <= '$year-05-01' and customer.financy = 0 and customer.active = 1) as total_abr, 
                                        (select count(*) from customer where created_at >= '$year-05-01' and created_at <= '$year-06-01' and customer.financy = 0 and customer.active = 1) as total_may, 
                                        (select count(*) from customer where created_at >= '$year-06-01' and created_at <= '$year-07-01' and customer.financy = 0 and customer.active = 1) as total_jun, 
                                        (select count(*) from customer where created_at >= '$year-07-01' and created_at <= '$year-08-01' and customer.financy = 0 and customer.active = 1) as total_jul,
                                        (select count(*) from customer where created_at >= '$year-08-01' and created_at <= '$year-09-01' and customer.financy = 0 and customer.active = 1) as total_ago, 
                                        (select count(*) from customer where created_at >= '$year-09-01' and created_at <= '$year-11-01' and customer.financy = 0 and customer.active = 1) as total_set, 
                                        (select count(*) from customer where created_at >= '$year-10-01' and created_at <= '$year-10-31' and customer.financy = 0 and customer.active = 1) as total_oct, 
                                        (select count(*) from customer where created_at >= '$year-11-01' and created_at <= '$year-12-01' and customer.financy = 0 and customer.active = 1) as total_nov, 
                                        (select count(*) from customer where created_at >= '$year-12-01' and created_at <= '$new_year-01-01' and customer.financy = 0 and customer.active = 1) as total_dic, 
                                        (select count(*) from customer where kit_id = 1 and customer.financy = 0 and customer.active = 1) as total_100, 
                                        (select count(*) from customer where kit_id = 2 and customer.financy = 0 and customer.active = 1) as total_300, 
                                        (select count(*) from customer where kit_id = 3 and customer.financy = 0 and customer.active = 1) as total_500, 
                                        (select count(*) from customer where kit_id = 4 and customer.financy = 0 and customer.active = 1) as total_1000, 
                                        (select count(*) from customer where kit_id = 5 and customer.financy = 0 and customer.active = 1) as total_2000, 
                                        (select count(*) from customer where kit_id = 7 and customer.financy = 0 and customer.active = 1) as total_4000, 
                                        (select count(*) from customer where kit_id = 8 and customer.financy = 0 and customer.active = 1) as total_8000, 
                                        (select count(*) from customer where kit_id = 13 and customer.financy = 0 and customer.active = 1) as total_15000, 
                                        (select count(*) from customer where kit_id = 14 and customer.financy = 0 and customer.active = 1) as total_30000, 
                                        (select count(*) from customer where kit_id = 15 and customer.financy = 0 and customer.active = 1) as total_50000, 
                                        (select count(*) from users) as total_users, 
                                        (select count(*) from ticket) as total_ticket, 
                                        (select count(*) from ticket where status = 1) as total_ticket_pending, 
                                        (select count(*) from comments) as total_comments, 
                                        (select count(*) from comments where active = 1) as total_comments_pending
                                        FROM (`customer`) JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        WHERE `customer`.`financy` = 0 AND customer.active = 1");
        return $obj_result->getResult();
    }
    
    public function get_customer_by_kit_by_id($id){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`,`customer`.`username`,`customer`.`pin`,`customer`.`usdt`,`customer`.`pay`,`customer`.`kyc`, `customer`.`first_name`, `customer`.`email`,`customer`.`avatar`, `customer`.`last_name`, `customer`.`created_at`, `customer`.`active`,`customer`.`founder`,`customer`.`tope`, `kit`.`price`, `kit`.`kit_id`,`kit`.`name` as kit , `paises`.`nombre` as pais
                                        FROM (`customer`) 
                                        JOIN `kit` ON `kit`.`kit_id` = `customer`.`kit_id` 
                                        JOIN `paises` ON `paises`.`id` = `customer`.`country` 
                                        WHERE `customer`.`customer_id` = $id and paises.id_idioma = 7");
        return $obj_result->getResult();
    }

    public function get_data_customer_pin($id, $pin){
        $obj_result =  $this->db->query("SELECT * FROM (`customer`) WHERE `customer_id` = $id AND pin = '$pin'");
        return $obj_result->getResult();
    }

    public function get_data_customer_email_pin($id, $pin){
        $obj_result =  $this->db->query("SELECT * FROM (`customer`) WHERE `customer_id` = '$id' AND pin = '$pin'");
        return $obj_result->getNumRows();
    }
    

    public function insertar($data){
        $query = $this->db->table('customer');
        $query->insert($data);
        return $this->db->insertId();
    }
}