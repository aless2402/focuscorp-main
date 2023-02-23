<?php
namespace App\Models;
use CodeIgniter\Model;

class BinaryModel extends Model{
    
    protected $table      = 'binary';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'customer_id', 'sponsor', 'node', 'qty_node', 'leg', 'binary_active', 'left_active', 'right_active'];
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
        $obj_result =  $this->db->query("SELECT `customer`.`username`, `customer`.`active`, `customer`.`temporal`, `customer`.`qty_renovation`, `customer`.`tope_amount`, `kit`.`name` as kit, `kit`.`kit_id`, `kit`.`img` as kit_img, `ranges`.`range_id`, `ranges`.`img`, `ranges`.`name`, `binary`.`binary_active`, `binary`.`left_active`, `binary`.`right_active`,`binary`.`leg`, `binary`.`node`,`binary`.`sponsor`,
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

    public function get_data_customer_perfil($id){
        $obj_result =  $this->db->query("SELECT `customer`.`username`, `customer`.`email`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`usdt`, `customer`.`ltc`, `customer`.`created_at`, `customer`.`date_start`, `customer`.`address`, `customer`.`phone`, `customer`.`dni`, `customer`.`active`, `paises`.`nombre` as pais, `paises`.`id_wsp`, `paises`.`img`, `kit`.`name` as kit FROM (`customer`) JOIN `kit` ON `customer`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `paises` 
                                        ON `customer`.`country` = `paises`.`id` 
                                        WHERE `customer`.`customer_id` = $id and customer.status_value = 1 and paises.id_idioma = 7");
        return $obj_result->getResult();
    }

    public function get_last_user($qty_node, $node){
        $obj_result =  $this->db->query("SELECT `id`, `node`, `customer_id`, `qty_node` FROM (`binary`) WHERE qty_node = $qty_node and node like '%$node'");
        return $obj_result->getResult();
    }

    public function get_user_binary($qty_node, $node){
        $obj_result =  $this->db->query("SELECT `id`, `node`, `customer_id`, `qty_node` FROM (`binary`) WHERE qty_node = $qty_node and node = '$node'");
        return $obj_result->getResult();
    }

    public function get_total_partner_left_right($where_total_left, $where_total_right){
        $obj_data =  $this->db->query("SELECT count(id) as total_partner_left, 
                                      (SELECT count(id) FROM (`binary`) WHERE $where_total_right) as total_partner_right 
                                      FROM (`binary`) 
                                      WHERE $where_total_left");
        return $obj_data->getResult();
    }


    public function insertar($data){
        $query = $this->db->table('binary');
        $query->insert($data);
        return $this->db->insertId();
    }
}