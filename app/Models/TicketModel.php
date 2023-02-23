<?php
namespace App\Models;
use CodeIgniter\Model;

class TicketModel extends Model{
    
    protected $table      = 'ticket';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'customer_id', 'concepto_tiket_id', 'respose', 'status', 'date', 'content', 'img'];
    protected $useTimestamps = false;

    public function get_ticket_all_customer($id){
        $obj_result =  $this->db->query("SELECT `ticket`.`id`, `ticket`.`concepto_tiket_id`, `concepto_ticket`.`title`, `ticket`.`respose`, `ticket`.`date`, `ticket`.`content`, `ticket`.`status` 
                                        FROM (`ticket`) 
                                        JOIN `concepto_ticket` ON `ticket`.`concepto_tiket_id` = `concepto_ticket`.`id` 
                                        WHERE `customer_id` = $id ORDER BY `ticket`.`id` DESC");
        return $obj_result->getResult();
    }

    public function get_data(){
        $obj_result =  $this->db->query("SELECT `ticket`.`id`, `ticket`.`concepto_tiket_id`, `concepto_ticket`.`title`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`username`, `ticket`.`img`, `ticket`.`respose`, `ticket`.`date`, `ticket`.`content`, `ticket`.`status` 
                                        FROM (`ticket`) 
                                        JOIN `concepto_ticket` ON `ticket`.`concepto_tiket_id` = `concepto_ticket`.`id` 
                                        JOIN `customer` ON `ticket`.`customer_id` = `customer`.`customer_id` 
                                        ORDER BY `ticket`.`id` DESC");
        return $obj_result->getResult();
    }
    
    public function get_data_by_id($id){
        $obj_result =  $this->db->query("SELECT `ticket`.`id`, `ticket`.`concepto_tiket_id`, `concepto_ticket`.`title`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`username`, `ticket`.`img`, `ticket`.`respose`, `ticket`.`date`, `ticket`.`content`, `ticket`.`status` 
                                        FROM (`ticket`) 
                                        JOIN `concepto_ticket` ON `ticket`.`concepto_tiket_id` = `concepto_ticket`.`id` 
                                        JOIN `customer` ON `ticket`.`customer_id` = `customer`.`customer_id` 
                                        WHERE `ticket`.`id` = $id");
        return $obj_result->getResult();
    }

    public function insertar($data){
        $obj_ticket = $this->db->table('ticket');
        $obj_ticket->insert($data);
        return $this->db->insertId();
    }

    public function eliminar($id){
        return $this->db->query("DELETE FROM ticket WHERE id = $id");
    }
}