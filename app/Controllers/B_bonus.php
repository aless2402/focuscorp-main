<?php
namespace App\Controllers;
use App\Models\BonusModel;

class B_bonus extends BaseController
{   
    public function list()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
        $request= \Config\Services::request();
        $page = $request->getPostGet('page');
        $table = $db->table('bonus');
        $table->select('*');
        $table->orderBy('bonus.bonus_id', 'DESC');
        $table->limit(5, $page);
        $query = $table->get();
        $result = $query->getResult();

        if(count($result) > 0)
        {
            $data = array(
                'status' => true,
                'data' => $result
            );
            return json_encode($data);
        }
        else
        {
            $data['status'] = false;
            return $data;
        }
    }
    public function register()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
        $bonusModel=new BonusModel($db);
		$request= \Config\Services::request();
		$data=array(
			'name'=>$request->getPostGet('name'),
			'level'=>$request->getPostGet('level'),
            'percent'=>$request->getPostGet('percent'),
			'active'=>$request->getPostGet('active'),
			'status_value'=>$request->getPostGet('first_name'),
            'created_by'=>$request->getPostGet('created_by'),
            'updated_by'=>$request->getPostGet('updated_by'),
		);
        
		if($bonusModel->save($data)===false){
            $data['status'] = false;
            return $data;
		}else{
            $data['status'] = true;
            return $data;
        }
    }
    public function update()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
        $bonusModel=new BonusModel($db);
		$request= \Config\Services::request();
        $bonus_id = $request->getPostGet('bonus_id');
		$data=array(
			'name'=>$request->getPostGet('name'),
			'level'=>$request->getPostGet('level'),
            'percent'=>$request->getPostGet('percent'),
			'active'=>$request->getPostGet('active'),
			'status_value'=>$request->getPostGet('first_name'),
            'created_by'=>$request->getPostGet('created_by'),
            'updated_by'=>$request->getPostGet('updated_by'),
		);
        $response = $bonusModel->update($bonus_id, $data);
        if($response){
            $data['status'] = true;
            return $data;
		}else{
            $data['status'] = false;
            return $data;
        }
    }
    public function delete()
    {
        $session = session();
        $db = \Config\Database::connect();
        $id = $session->get('id');
        $bonusModel=new BonusModel($db);
		$request= \Config\Services::request();
        $bonus_id = $request->getPostGet('bonus_id');
        $response = $bonusModel->delete($bonus_id);
        if($response){
            $data['status'] = true;
            return $data;
		}else{
            $data['status'] = false;
            return $data;
        }
    }
}
