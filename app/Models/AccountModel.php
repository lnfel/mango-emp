<?php namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
	protected $DBGroup = 'default';

	protected $table      = 'account';
  protected $primaryKey = 'ID';

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['Username', 'Password'];

  protected $useTimestamps = false;
  protected $createdField  = 'DateCreated';
  //protected $updatedField  = 'updated_at';
  //protected $deletedField  = 'deleted_at';

  protected $validationRules    = [
  	'username' => 'required|min_length[8]|max_length[20]',
		'password' => 'required|min_length[6]|max_length[255]',
		'password_confirm' => 'matches[password]',
  ];
  protected $validationMessages = [];
  protected $skipValidation     = false;

  function modifyMe() {
  	
  }
}