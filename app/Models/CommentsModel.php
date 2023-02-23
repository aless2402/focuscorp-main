<?php
namespace App\Models;
use CodeIgniter\Model;

class CommentsModel extends Model{
    
    protected $table      = 'comments';
    protected $primaryKey = 'comment_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['comment_id', 'phone', 'subject', 'email', 'comment', 'date_comment', 'active', 'status_value', 'updated_at', 'updated_by'];
    protected $useTimestamps = false;

    public function listar(){
            $obj_comments =  $this->db->query("select * from comments");
            return $obj_comments->getResult();
    }

    public function get_all(){
        $obj_comments =  $this->db->query("SELECT `comments`.`comment_id`, `comments`.`name`, `comments`.`comment`, `comments`.`email`, `comments`.`active`, `comments`.`status_value`, `comments`.`date_comment` 
                                        FROM (`comments`) ORDER BY `date_comment` ASC");
        return $obj_comments->getResult();
    }

    public function insertar($data){
        $obj_comments = $this->db->table('comments');
        $obj_comments->insert($data);
        return $this->db->insertId();
        }
}