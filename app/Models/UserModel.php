<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    
    protected $table      = 'users';
    protected $primaryKey = 'customer_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['kit_id', 'range_id', 'username', 'email', 'password', 'first_name', 'last_name', 'dni', 'date_start', 'date_end', 'address', 'usdt', 'ltc', 'country', 'phone', 'financy', 'tope', 'tope_amount', 'temporal', 'pay', 'active', 'status_value', 'created_by', 'updated_by'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    protected $validationRules    = [
            'first_name' => 'required|alpha_numeric_space|min_length[3]',
            'last_name' => 'required|alpha_numeric_space|min_length[3]',
            'email' =>'required|valid_email|is_unique[users.email]'
    ];
    protected $validationMessages = [
            'email' =>[
                    'is_unique'=>'Lo sentimos. Tu correo ya esta siendo usado por otro usuario'
            ]
    ];
    
    protected $skipValidation = true;

    public function get_all(){
        $res =  $this->db->query("SELECT * FROM customer");
        return $res->getResult();
    }

    public function insertar($data){
        $res = $this->db->table('users');
        $res->insert($data);
        return $this->db->insertId();
    }

    public function eliminar($id){
        return $this->db->query("DELETE FROM users WHERE user_id = $id");
    }

    //protected $beforeInsert=['agregaAlgoName'];
    //protected $beforeUpdate=['agregaAlgoName'];
    /*
    protected function agregaAlgoName(array $data){
            $data['data']['name']=$data['data']['name']." algo";
            return $data;
    }*/
}