<?php
namespace App\Models;
use CodeIgniter\Model;

class User_adminModel extends Model{
    
    protected $table      = 'users';
    protected $primaryKey = 'user_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'password', 
        'first_name', 
        'last_name', 
        'email', 
        'privilage', 
        'active',
        'status_value', 
        'created_at', 
        'created_by', 
        'updated_at', 
        'updated_by'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function get_all(){
        $obj_result =  $this->db->query("SELECT * FROM users");
        return $obj_result->getResult();
    }

    public function get_all_by_id($id){
        $obj_result =  $this->db->query("SELECT * from users WHERE `user_id` = $id");
        return $obj_result->getResult();
    }

    public function insertar($data){
        $obj_result = $this->db->table('users');
        $obj_result->insert($data);
        return $this->db->insertId();
    }

    public function eliminar($id){
        return $this->db->query("DELETE FROM users WHERE `user_id` = $id");
    }

}