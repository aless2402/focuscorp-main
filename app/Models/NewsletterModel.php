<?php
namespace App\Models;
use CodeIgniter\Model;

class NewsletterModel extends Model{
    
    protected $table      = 'newsletter';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'email', 'status'];
    protected $useTimestamps = false;

    public function get_search_by_id($id){
        $obj_result =  $this->db->query("SELECT * FROM `newsletter` WHERE id = $id");
        return $obj_result->getResult();
    }

    public function get_search_by_username($email){
        $obj_result =  $this->db->query("SELECT * FROM `newsletter` WHERE email = '$email' and status = 1");
        return $obj_result->getResult();
    }

    public function insertar($data){
        $query = $this->db->table('newsletter');
        $query->insert($data);
        return $this->db->insertId();
    }
}