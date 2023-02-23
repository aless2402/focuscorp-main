<?php
namespace App\Models;
use CodeIgniter\Model;

class SellModel extends Model{
    
    protected $table      = 'sell';
    protected $primaryKey = 'sell_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'invoice_id', 
        'date', 
        'active', 
        'status_value', 
        'created_at', 
        'updated_by',
        'updated_at',
        'updated_by'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;


    public function insertar($data){
        $obj_comments = $this->db->table('sell');
        $obj_comments->insert($data);
        return $this->db->insertId();
    }
}