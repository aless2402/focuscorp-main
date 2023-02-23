<?php
namespace App\Models;
use CodeIgniter\Model;

class SettingModel extends Model{
    
    protected $table      = 'setting';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name', 
        'percent', 
        'status', 
    ];

    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function get_all(){
        $obj_kit =  $this->db->query("SELECT * FROM (`setting`)");
        return $obj_kit->getResult();
    }   

    public function get_all_by_id($id){
        $obj_kit =  $this->db->query("SELECT * FROM (`setting`) WHERE id = $id");
        return $obj_kit->getResult();
    }   

    public function get_all_by_name($name){
        $obj_kit =  $this->db->query("SELECT `bonus_id`, `name`, `percent`, `active`, `status_value` FROM (`bonus`) WHERE `name` = '$name'");
        return $obj_kit->getResult();
    }

    public function get_percent_bonus_pagos_diarios(){
        $obj_kit =  $this->db->query("SELECT `bonus_id`, `percent` FROM (`bonus`) WHERE `name` like '%Pagos Diarios%'");
        return $obj_kit->getResult();
    }

    public function insertar($data){
        $obj_comments = $this->db->table('bonus');
        $obj_comments->insert($data);
        return $this->db->insertId();
    }

    public function eliminar($id){
        return $this->db->query("DELETE FROM bonus WHERE bonus_id = $id");
    }
}