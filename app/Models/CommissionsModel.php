<?php
namespace App\Models;
use CodeIgniter\Model;

class CommissionsModel extends Model{
    
    protected $table      = 'commissions';
    protected $primaryKey = 'commissions_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['commissions_id', 'sell_id', 'customer_id', 'bonus_id', 'amount', 'discount_system', 'date', 'active', 'status_value', 'created_at', 'created_by', 'updated_at', 'updated_by'];
    protected $useTimestamps = false;

    public function get_all(){
            $obj_data =  $this->db->query("select * from commissions where status_value = 1 ORDER BY price ASC");
            return $obj_data->getResult();
    }

    public function get_commissions_by_id($id){
        $obj_data =  $this->db->query("select * from commissions where customer_id = $id and commissions.status_value = 1 LIMIT 100");
        return $obj_data->getResult();
    }

    public function get_commissions_by_id_bonus($id){
        $obj_data =  $this->db->query("SELECT commissions.commissions_id,commissions.amount, commissions.date, commissions.active, commissions.status_value, bonus.name as bonus 
                                    FROM commissions 
                                    JOIN bonus ON commissions.bonus_id = bonus.bonus_id 
                                    WHERE customer_id = $id and commissions.status_value = 1 
                                    ORDER BY commissions.commissions_id DESC
                                    LIMIT 100");
        return $obj_data->getResult();
    }
    
    public function get_commissions_by_ranges_date($id, $from, $to){
        $obj_data =  $this->db->query("SELECT commissions.commissions_id,commissions.amount, commissions.date, commissions.active, commissions.status_value, bonus.name as bonus 
                                    FROM commissions 
                                    JOIN bonus ON commissions.bonus_id = bonus.bonus_id 
                                    WHERE commissions.date >= '$from' and commissions.date <= '$to' and customer_id = $id and commissions.status_value = 1 
                                    ORDER BY commissions.commissions_id DESC");
        return $obj_data->getResult();
    }

    public function get_commissions_by_id_bonus_envios($bonus_id, $customer_id){
        $obj_data =  $this->db->query("SELECT commissions.commissions_id,commissions.amount, commissions.date, commissions.active, commissions.arrive_id, commissions.status_value, bonus.name as bonus, customer.first_name,  customer.last_name, customer.username
                                    FROM commissions
                                    JOIN bonus ON commissions.bonus_id = bonus.bonus_id
                                    LEFT JOIN customer ON commissions.arrive_id = customer.customer_id
                                    WHERE commissions.bonus_id = $bonus_id and commissions.customer_id = $customer_id and commissions.status_value = 1 
                                    ORDER BY commissions.commissions_id DESC
                                    LIMIT 100");
        return $obj_data->getResult();
    }


    public function global_info($id){
        $obj_data =  $this->db->query("SELECT sum(amount) as total, 
                                      (SELECT sum(amount) FROM commissions WHERE customer_id = $id and bonus_id = 1 and active = 1) as total_patrocinio, 
                                      (SELECT sum(amount) FROM commissions WHERE customer_id = $id and bonus_id = 2 and active = 1) as total_indirecto, 
                                      (SELECT sum(amount) FROM commissions WHERE customer_id = $id and bonus_id = 3 and active = 1) as total_liderazgo , 
                                      (SELECT sum(amount) FROM commissions WHERE customer_id = $id and bonus_id = 4 and active = 1) as total_pagos_diarios, 
                                      (SELECT sum(amount) FROM commissions WHERE customer_id = $id and bonus_id = 6 and active = 1) as total_rangos, 
                                      (SELECT sum(amount) FROM commissions WHERE customer_id = $id and bonus_id = 8 and active = 1) as total_binario, 
                                      (SELECT sum(amount) FROM commissions WHERE customer_id = $id and bonus_id = 10 and active = 1) as total_vitalicio
                                      FROM commissions WHERE customer_id = $id and status_value = 1 AND active = 1 and bonus_id <> 9 and bonus_id <> 3");
        return $obj_data->getResult();
    }

    public function commission_by_year($id, $where_total_left, $where_total_right){
        $obj_data =  $this->db->query("SELECT sum(amount) as total_comissions, 
                                      (select sum(amount) FROM commissions WHERE customer_id = $id AND active = 1 and bonus_id = 4) as total_pagos_diarios,
                                      (SELECT count(id) FROM (`binary`) WHERE $where_total_left) as total_partner_left,
                                      (SELECT count(id) FROM (`binary`) WHERE $where_total_right) as total_partner_right,
                                      (select sum(amount) FROM commissions WHERE customer_id = $id AND status_value = 1 and bonus_id <> 3) as total_disponible FROM (`commissions`) 
                                      WHERE `customer_id` = $id and active = 1 and bonus_id <> 9 and bonus_id <> 3");
        return $obj_data->getResult(); 
    }

    public function get_total_commission($id){
        $obj_data =  $this->db->query("SELECT sum(amount) as total_comissions, 
                                      (select sum(amount) FROM commissions WHERE customer_id = $id AND status_value = 1 and bonus_id <> 3) as total_disponible FROM (`commissions`) 
                                      WHERE `customer_id` = $id and active = 1 and bonus_id <> 9 and bonus_id <> 3");
        return $obj_data->getResult(); 
    }

    public function get_max_comissions(){
        $obj_data =  $this->db->query("SELECT `customer`.`customer_id`, sum(amount) as total_max, `customer`.`first_name`, `customer`.`last_name`, `paises`.`img` 
                                        FROM (`commissions`) 
                                        JOIN `customer` ON `customer`.`customer_id` = `commissions`.`customer_id` 
                                        JOIN `paises` ON `customer`.`country` = `paises`.`id` 
                                        WHERE `commissions`.`active` = 1 and customer.active = 1 and paises.id_idioma = 7 and commissions.customer_id <> 1 and commissions.bonus_id <> 9  GROUP BY `customer`.`customer_id` ORDER BY `total_max` DESC LIMIT 10");
        return $obj_data->getResult();
    }

    public function get_last_partner(){
        $obj_data =  $this->db->query("SELECT `customer`.`customer_id`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`username`, `paises`.`img` 
                                        FROM (`customer`) 
                                        JOIN `paises` ON `customer`.`country` = `paises`.`id`
                                        WHERE paises.id_idioma = 7
                                        ORDER BY `customer`.`customer_id` DESC 
                                        LIMIT 10");
        return $obj_data->getResult();
    }

    public function get_all_by_date($date_start, $date_end){
        $obj_data =  $this->db->query("SELECT `commissions`.`commissions_id`, `customer`.`username`, `customer`.`first_name`, `customer`.`last_name`, `bonus`.`name` as bonus, `commissions`.`amount`, `commissions`.`active`, `commissions`.`date` FROM (`commissions`) JOIN `customer` ON `customer`.`customer_id` = `commissions`.`customer_id` JOIN `bonus` ON `bonus`.`bonus_id` = `commissions`.`bonus_id` 
                                      WHERE `commissions`.`date` >= '$date_start' and commissions.date <= '$date_end' ORDER BY `commissions`.`commissions_id` DESC");
        return $obj_data->getResult();
    }
    
    public function get_comssions_by_customer($id){
        $obj_data =  $this->db->query("SELECT `commissions`.`commissions_id`, `commissions`.`customer_id`, `commissions`.`date`, `commissions`.`amount`, `commissions`.`bonus_id`, `commissions`.`active`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`username` 
                                       FROM (`commissions`) 
                                       JOIN `customer` ON `commissions`.`customer_id` = `customer`.`customer_id` 
                                       WHERE `commissions_id` = $id");
        return $obj_data->getResult();
    }

    public function get_total_commission_by_customer($id){
        $obj_data =  $this->db->query("SELECT sum(amount) as total_comissions 
                                     FROM (`commissions`) WHERE `customer_id` = $id and active = 1 and bonus_id <> 9 and bonus_id <> 3");
        return $obj_data->getResult();
    }

    public function get_total_commission_by_customer_ranges($first_month_day, $last_month_day){
        $obj_data =  $this->db->query("SELECT `binary`.`binary_active`,`commissions`.`bonus_id`, `commissions`.`customer_id`, `commissions`.`commissions_id`, `customer`.`range_id` 
                                      FROM (`commissions`) 
                                      JOIN `customer` ON `customer`.`customer_id` = `commissions`.`customer_id` 
                                      JOIN `binary` ON `customer`.`customer_id` = `binary`.`customer_id` 
                                      WHERE `binary`.`binary_active` = 1 AND `commissions`.`date` >= '$first_month_day' AND `commissions`.`date` < '$last_month_day' AND `commissions`.`active` = 1 AND `commissions`.`bonus_id` <> 4 AND `commissions`.`bonus_id` <> 9 
                                      GROUP BY `commissions`.`customer_id`");
        return $obj_data->getResult();
    }

    public function get_customer_bonus_liderazgo(){
        $obj_data =  $this->db->query("SELECT commissions.commissions_id, customer.customer_id, customer.username, customer.first_name, customer.last_name, bonus.name, commissions.amount, commissions.date, commissions.active FROM commissions 
                                        JOIN customer ON commissions.customer_id = customer.customer_id
                                        JOIN bonus ON commissions.bonus_id = bonus.bonus_id
                                        WHERE commissions.bonus_id = 3
                                        ORDER BY commissions.date DESC");
        return $obj_data->getResult();
    }
    
    public function get_commission_data($id){
        $obj_data =  $this->db->query("SELECT `commissions`.`commissions_id`, `commissions`.`amount`, `commissions`.`date`, `commissions`.`active`,`commissions`.`status_value`, `bonus`.`name` as bonus 
                                        FROM (`commissions`) 
                                        JOIN `bonus` 
                                        ON `commissions`.`bonus_id` = `bonus`.`bonus_id` 
                                        WHERE `commissions`.`customer_id` = $id and commissions.status_value = 1 ORDER BY `commissions`.`commissions_id` DESC LIMIT 10");
        return $obj_data->getResult();
    }

    public function insertar($data){
        $obj_data = $this->db->table('commissions');
        $obj_data->insert($data);
        return $this->db->insertId();
    }

    public function eliminar($id){
        return $this->db->query("DELETE FROM commissions WHERE commissions_id = $id");
    }
}