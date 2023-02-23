<?php
namespace App\Models;
use CodeIgniter\Model;

class InvoicesModel extends Model{
    
    protected $table      = 'invoices';
    protected $primaryKey = 'invoice_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['invoice_id', 'customer_id', 'kit_id', 'amount', 'financy', 'activation_code', 'upgrade', 'type', 'img', 'date', 'active', 'status_value', 'created_at  ', 'created_by', 'updated_at', 'updated_by'];
    protected $useTimestamps = false;

    public function get_all(){
        $obj_result =  $this->db->query("SELECT `invoices`.`invoice_id`, `invoices`.`date`, `invoices`.`img`, `invoices`.`financy`, `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `kit`.`kit_id`, `kit`.`price`, `kit`.`name`, `invoices`.`active` FROM (`invoices`) JOIN `kit` ON `invoices`.`kit_id` = `kit`.`kit_id` JOIN `customer` ON `invoices`.`customer_id` = `customer`.`customer_id` WHERE `invoices`.`type` = 1 and invoices.status_value = 1 ORDER BY `invoices`.`invoice_id` ASC");
        return $obj_result->getResult();
    }

    public function get_invoices_by_id_kit($id){
        $obj_result =  $this->db->query("SELECT invoices.invoice_id,invoices.date,kit.price,kit.name,invoices.active 
                                         FROM invoices JOIN kit ON invoices.kit_id = kit.kit_id WHERE customer_id = $id and invoices.type = 1 and invoices.status_value = 1 
                                         ORDER BY invoices.invoice_id DESC");
        return $obj_result->getResult();
    }

    public function invoices_by_id($id, $invoice_id){
        $obj_result =  $this->db->query("SELECT invoices.invoice_id,invoices.date,kit.price, kit.description, kit.name,invoices.active 
                                         FROM invoices 
                                         JOIN kit ON invoices.kit_id = kit.kit_id 
                                         WHERE customer_id = $id AND invoices.invoice_id = $invoice_id");
        return $obj_result->getRow();
    }
    

    public function get_data_kit_by_customer($id){
        $obj_result =  $this->db->query("SELECT `invoices`.`invoice_id`, `invoices`.`date`, `invoices`.`img`, `invoices`.`financy`, `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `kit`.`kit_id`, `kit`.`price`, `kit`.`name`, `invoices`.`active` FROM (`invoices`) JOIN `kit` ON `invoices`.`kit_id` = `kit`.`kit_id` JOIN `customer` ON `invoices`.`customer_id` = `customer`.`customer_id` WHERE `invoices`.`type` = 1 and invoices.status_value = 1 ORDER BY `invoices`.`invoice_id` ASC");
        return $obj_result->getResult();
    }    

    public function get_data_customer_kit($id){
        $obj_result =  $this->db->query("SELECT `invoices`.`invoice_id`, `invoices`.`date`, `invoices`.`img`, `invoices`.`financy`, `invoices`.`type`, `customer`.`customer_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `kit`.`price`, `kit`.`kit_id`, `invoices`.`active` 
                                        FROM (`invoices`) 
                                        JOIN `kit` ON `invoices`.`kit_id` = `kit`.`kit_id` 
                                        JOIN `customer` ON `invoices`.`customer_id` = `customer`.`customer_id` 
                                        WHERE `invoices`.`invoice_id` = $id");
        return $obj_result->getResult();
    }    

    public function insertar($data){
        $obj_comments = $this->db->table('invoices');
        $obj_comments->insert($data);
        return $this->db->insertId();
    }
}