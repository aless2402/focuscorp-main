<?php
namespace App\Models;
use CodeIgniter\Model;

class PaisesModel extends Model{
    
    protected $table      = 'paises';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'id_idioma', 'id_wsp', 'nombre', 'x', 'y', 'img'];
    protected $useTimestamps = false;

    public function get_data(){
        $obj_result =  $this->db->query("SELECT * FROM paises WHERE id_idioma = 7 ORDER BY nombre ASC");
        return $obj_result->getResult();
    }

    public function insertar($data){
        $query = $this->db->table('paises');
        $query->insert($data);
        return $this->db->insertId();
    }
}