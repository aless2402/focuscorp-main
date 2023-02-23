<?php
namespace App\Models;
use CodeIgniter\Model;

class UnilevelModel extends Model{
    
    protected $table      = 'unilevel';
    protected $primaryKey = 'unilevel_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['unilevel_id', 'customer_id', 'active', 'parend_id', 'ident', 'status_value', 'created_at', 'created_by', 'updated_at', 'updated_by'];
    protected $useTimestamps = false;

    public function get_search_by_id($id){
        $obj_result =  $this->db->query("SELECT * FROM customer WHERE customer_id = $id and status_value = 1");
        return $obj_result->getResult();
    }

    public function get_all_referred($id){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`email`, `customer`.`kit_id`, `customer`.`phone`, `customer`.`created_at`, `customer`.`date_start`, `customer`.`active`, `paises`.`nombre` as pais,`paises`.`img`, `kit`.`name` as kit_name 
                                        FROM (`unilevel`) 
                                        JOIN `customer` ON `customer`.`customer_id` = `unilevel`.`customer_id` 
                                        JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `paises` ON `customer`.`country` = `paises`.`id` 
                                        WHERE `unilevel`.`parend_id` = $id and unilevel.status_value = 1 and paises.id_idioma = 7 ORDER BY `unilevel`.`unilevel_id` DESC");
        return $obj_result->getResult();
    }

    public function get_all_referred_by_kit($id){
        $obj_result =  $this->db->query("SELECT count(*) as total_0, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 1 and customer.status_value = 1) as total_20, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 2 and customer.status_value = 1) as total_50, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 3 and customer.status_value = 1) as total_100, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 4 and customer.status_value = 1) as total_300, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 5 and customer.status_value = 1) as total_500, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 6 and customer.status_value = 1) as total_1000, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 7 and customer.status_value = 1) as total_3000, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 8 and customer.status_value = 1) as total_5000, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 9 and customer.status_value = 1) as total_10000, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 10 and customer.status_value = 1) as total_15000, 
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 11 and customer.status_value = 1) as total_25000,
                                        (SELECT count(*) FROM unilevel JOIN customer ON customer.customer_id = unilevel.customer_id WHERE unilevel.parend_id = $id and customer.kit_id = 12 and customer.status_value = 1) as total_50000
                                        FROM (`unilevel`) 
                                        JOIN `customer` ON `customer`.`customer_id` = `unilevel`.`customer_id` 
                                        WHERE `unilevel`.`parend_id` = 1 and customer.kit_id = 13 and customer.status_value = 1");
        return $obj_result->getResult();
    } 

    public function get_data_by_customer($id){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`avatar`,`customer`.`email`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`,`customer`.`founder`, `customer`.`kit_id`, `customer`.`range_id`,`customer`.`tope`, `customer`.`active`, `kit`.`name` as kit, `kit`.`img` as kit_img, `ranges`.`name` as range_name , `paises`.`img` as pais_img, `paises`.`nombre` as pais
                                        FROM (`customer`) 
                                        JOIN `paises` ON `customer`.`country` = `paises`.`id` 
                                        JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `ranges` ON `customer`.`range_id` = `ranges`.`range_id` 
                                        WHERE `customer`.`customer_id` = $id and customer.status_value = 1 and paises.id_idioma = 7 ");
        return $obj_result->getResult();
    }

    public function get_partners_by_level($id){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`kit_id`, `customer`.`range_id`, `customer`.`active`, `kit`.`name` as kit_name, `kit`.`img` as kit_img, `ranges`.`name` as range_name, `paises`.`img` as pais_img 
                                        FROM (`customer`) 
                                        JOIN `paises` ON `customer`.`country` = `paises`.`id` 
                                        JOIN `unilevel` ON `unilevel`.`customer_id` = `customer`.`customer_id`
                                        JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `ranges` ON `customer`.`range_id` = `ranges`.`range_id` 
                                        WHERE `unilevel`.`parend_id` = $id and customer.status_value = 1 and paises.id_idioma = 7 
                                        ORDER BY `unilevel`.`unilevel_id` ASC");
        return $obj_result->getResult();
    }

    public function get_partners_in_level($id){
        $obj_result =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`kit_id`, `customer`.`range_id`, `unilevel`.`parend_id`, `customer`.`active`, `kit`.`name` as kit_name, `kit`.`img` as kit_img, `ranges`.`name` as range_name, `paises`.`img` as pais_img
                                        FROM (`customer`) 
                                        JOIN `paises` ON `customer`.`country` = `paises`.`id` 
                                        JOIN `unilevel` ON `unilevel`.`customer_id` = `customer`.`customer_id` 
                                        JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `ranges` ON `customer`.`range_id` = `ranges`.`range_id` 
                                        WHERE `unilevel`.`parend_id` in ($id) and customer.status_value = 1 and paises.id_idioma = 7 ORDER BY `unilevel`.`unilevel_id` ASC");
        return $obj_result->getResult();
    }

    public function get_total_partners($id){
        $obj_result =  $this->db->query("SELECT count(`unilevel_id`) as total FROM (`unilevel`) WHERE `ident` like '%$id%'");
        return $obj_result->getResult();
    }

    public function get_ident_by_customer($id){
        $obj_result =  $this->db->query("SELECT `ident`FROM (`unilevel`) WHERE customer_id = $id");
        return $obj_result->getResult();
    }

    public function insertar($data){
        $query = $this->db->table('unilevel');
        $query->insert($data);
        return $this->db->insertId();
    }
}