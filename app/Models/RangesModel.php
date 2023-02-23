<?php
namespace App\Models;
use CodeIgniter\Model;

class RangesModel extends Model{
    
    protected $table      = 'ranges';
    protected $primaryKey = 'range_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name', 
        'point_personal', 
        'point_grupal', 
        'img', 
        'active', 
        'status_value', 
        'created_by', 
        'updated_by'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function get_all(){
        $obj_kit =  $this->db->query("SELECT `ranges`.`range_id`, `ranges`.`name`, `ranges`.`point_personal`, `ranges`.`img` 
                                    FROM (`ranges`) 
                                    WHERE `ranges`.`active` = 1 and ranges.status_value = 1 and ranges.range_id > 0 ORDER BY `range_id` ASC");
        return $obj_kit->getResult();
    }

    public function get_all_data(){
        $obj_kit =  $this->db->query("SELECT `ranges`.`range_id`, `ranges`.`name`, `ranges`.`point_personal`, `ranges`.`img` 
                                    FROM (`ranges`) 
                                    WHERE `ranges`.`active` = 1 and ranges.status_value = 1 ORDER BY `range_id` ASC");
        return $obj_kit->getResult();
    }

    public function get_all_crud(){
        $obj_kit =  $this->db->query("SELECT * FROM (`ranges`)");
        return $obj_kit->getResult();
    }

    public function get_all_crud_by_id($id){
        $obj_kit =  $this->db->query("SELECT * FROM (`ranges`) WHERE range_id = $id");
        return $obj_kit->getResult();
    }

    public function get_range_by_customer(){
        $obj_kit =  $this->db->query("SELECT customer.customer_id, customer.first_name, customer.last_name, customer.username,customer.active, ranges.range_id, ranges.name, ranges.point_grupal FROM (`customer`)
                                    JOIN ranges
                                    ON customer.range_id = ranges.range_id
                                    WHERE customer.range_id > 0");
        return $obj_kit->getResult();
    }

    public function get_range_next($id, $first_day, $last_day){
        $obj_kit =  $this->db->query("SELECT `ranges`.`range_id`, `ranges`.`name`, `ranges`.`point_personal` as POINT, 
                                    (select sum(points_binary.left) FROM points_binary WHERE `points_binary`.`date` >= '$first_day' AND `points_binary`.`date` < '$last_day' AND customer_id = $id and status = 1) as total_point_left, 
                                    (select sum(points_binary.right) FROM points_binary WHERE `points_binary`.`date` >= '$first_day' AND `points_binary`.`date` < '$last_day' AND customer_id = $id and status = 1) as total_point_right, 
                                    (select name FROM ranges WHERE point_personal > point LIMIT 1) as next_range_name, 
                                    (select point_personal FROM ranges WHERE point_personal > point LIMIT 1) as next_range_point 
                                    FROM (`customer`) JOIN `ranges` ON `customer`.`range_id` = `ranges`.`range_id` 
                                    WHERE `customer`.`customer_id` = $id and customer.status_value = 1");
        return $obj_kit->getResult();
    }

    
    
}