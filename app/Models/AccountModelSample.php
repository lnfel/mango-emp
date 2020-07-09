<?php namespace App\Models;

//use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class AccountModel extends Model {

	protected $DBGroup = 'default';
	protected $table = 'account';
	protected $primaryKey = 'ID';
	protected $returnType = 'array';
	protected $allowedFields = ['Username', 'Password'];
	protected $beforeInsert = ['beforeInsert'];
	protected $beforeUpdate = ['beforeUpdate'];

	protected function beforeInsert(array $data) {
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function beforeUpdate(array $data) {
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function passwordHash(array $data) {
		if (isset($data['data']['password']))
			$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		return $data;
	}

  public function showAll()
	{
		$builder = $this->db->table('account');
		$query = $builder->get()->getResult('array');

		
		return $query;
	}
}