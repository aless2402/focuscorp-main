<?php
namespace App\Models;
use CodeIgniter\Model;

class Points_binaryModel extends Model{
    
    protected $table      = 'points_binary';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'id', 
        'customer_id', 
        'departure_id', 
        'left', 
        'right', 
        'date', 
        'system', 
        'status'
    ];

    protected $useTimestamps = false;

    public function get_all_by_customer($date_start, $date_end){
        $obj_data =  $this->db->query("SELECT `points_binary`.`id`, `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `points_binary`.`left`, `points_binary`.`right`, `points_binary`.`date`, `points_binary`.`system`, `points_binary`.`status` 
                                      FROM (`customer`) 
                                      JOIN `points_binary` ON `points_binary`.`customer_id` = `customer`.`customer_id` 
                                      WHERE `points_binary`.`date` >= '$date_start' and points_binary.date <= '$date_end'");
        return $obj_data->getResult();
    }

    public function get_all_by_customer_by_id($id){
        $obj_data =  $this->db->query("SELECT `points_binary`.`id`, `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `points_binary`.`left`, `points_binary`.`right`, `points_binary`.`date`, `points_binary`.`system`, `points_binary`.`status` 
                                     FROM (`customer`) 
                                     JOIN `points_binary` 
                                     ON `points_binary`.`customer_id` = `customer`.`customer_id` 
                                     WHERE `points_binary`.`id` = $id");
        return $obj_data->getResult();
    }

    public function get_all_by_customer_by_id_date($id, $date_start, $date_end){
        $obj_data =  $this->db->query("SELECT `points_binary`.`id`, `points_binary`.`left`, `points_binary`.`right`, `points_binary`.`date`, `points_binary`.`system`, `points_binary`.`status`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`username`
                                     FROM (`points_binary`) 
                                     LEFT JOIN `customer` ON `points_binary`.`departure_id` = `customer`.`customer_id` 
                                     WHERE `points_binary`.`date` >= '$date_start' and points_binary.date <= '$date_end' and `points_binary`.`customer_id` = $id
                                     ORDER BY `points_binary`.`id` DESC");
        return $obj_data->getResult();
    }

    public function get_left_right_by_customer($id){
        $obj_data =  $this->db->query("SELECT sum(points_binary.left) as total_left, 
                                     (select sum(points_binary.right) from points_binary where customer_id = $id) as total_right 
                                     FROM (`points_binary`) WHERE `customer_id` = $id");
        return $obj_data->getResult();
    }

    public function get_point_by_customer_ranges($customer_id, $first_month_day, $last_month_day){
        $obj_data =  $this->db->query("SELECT SUM(points_binary.left) as total_point_left, 
                                        (select sum(points_binary.right) FROM points_binary WHERE `points_binary`.`date` >= '$first_month_day' AND `points_binary`.`date` < '$last_month_day' AND customer_id = $customer_id and status = 1) as total_point_right 
                                        FROM (`points_binary`) 
                                        WHERE `points_binary`.`date` >= '$first_month_day' AND `points_binary`.`date` < '$last_month_day' AND `customer_id` = $customer_id and status = 1");
        return $obj_data->getResultArray();
    }

    public function insertar($data){ 
        $obj_comments = $this->db->table('points_binary');
        $obj_comments->insert($data);
        return $this->db->insertId();
    }

    public function eliminar($id){
        return $this->db->query("DELETE FROM points_binary WHERE id = $id");
    }
}