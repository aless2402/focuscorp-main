<?php
namespace App\Models;
use CodeIgniter\Model;

class Concepto_ticketModel extends Model{
    
    protected $table      = 'concepto_ticket';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'title', 'date', 'status'];
    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function get_all(){
        $obj_result =  $this->db->query("SELECT `id`, `title` FROM (`concepto_ticket`) WHERE `status` = 1");
        return $obj_result->getResult();
    }

    public function get_all_data(){
        $obj_result =  $this->db->query("SELECT * FROM (`concepto_ticket`)");
        return $obj_result->getResult();
    }

    public function get_all_data_by_id($id){
        $obj_result =  $this->db->query("SELECT * FROM (`concepto_ticket`) WHERE id = $id AND `status` = 1");
        return $obj_result->getResult();
    }

    public function insertar($data){
        $query = $this->db->table('concepto_ticket');
        $query->insert($data);
        return $this->db->insertId();
    }
    
}