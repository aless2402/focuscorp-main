<?php
namespace App\Models;
use CodeIgniter\Model;

class KitModel extends Model{
    
    protected $table      = 'kit';
    protected $primaryKey = 'kit_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['kit_id', 'name', 'price', 'type', 'point', 'img', 'description', 'active', 'created_at', 'created_by', 'updated_at', 'updated_by'];
    protected $useTimestamps = false;

    public function get_all(){
            $obj_kit =  $this->db->query("select * from kit ORDER BY price ASC");
            return $obj_kit->getResult();
    }

    public function get_all_cryptopoll(){
        $obj_kit =  $this->db->query("SELECT * FROM kit WHERE `price` > 0 and `type` = 1 ORDER BY price ASC");
        return $obj_kit->getResult();
    }

    public function get_all_cryptopoll_mayor_price($price){
        $obj_kit =  $this->db->query("SELECT * FROM kit WHERE `price` > $price and `type` = 1 ORDER BY price ASC");
        return $obj_kit->getResult();
    }

    public function get_all_by_inmobiliario($price){
        $obj_kit =  $this->db->query("SELECT * FROM kit WHERE `price` > $price and `type` = 2 ORDER BY price ASC");
        return $obj_kit->getResult();
    }   

    public function get_all_by_id($id){
        $obj_kit =  $this->db->query("SELECT * from kit WHERE kit_id = $id");
        return $obj_kit->getResult();
    }

    

    public function get_all_kit_inactive(){
        $obj_kit =  $this->db->query("SELECT `name`, `kit_id`, `price`, `point` FROM (`kit`) WHERE `kit_id` > 0 and active = 1 ORDER BY `price` ASC");
        return $obj_kit->getResult();
    }   
    

    public function insertar($data){
        $obj_comments = $this->db->table('comments');
        $obj_comments->insert($data);
        return $this->db->insertId();
        }
}