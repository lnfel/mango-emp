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

  function login(array $data) {
    $response = [];

    // create an instance of AccountModel()
    $builder = $this;

    // outputs SELECT * FROM `account`
    //$query = $builder->getCompiledSelect();

    // outputs SELECT * FROM `account` WHERE `Username` = '19011601'
  	//$query = $builder->where('Username', $data['username'])->getCompiledSelect();

    // runs the query, this will get entire row details and fields
    $query = $builder->where('Username', $data['username']);

    // count query result, 1 means account exists, if 0 it doesn't
    //$count = $query->countAllResults();
    //$sql = $query;

    $account = $query->get()->getResult('array');
    // count array items, if 1 account exists, if 0 no account with username provided
    if (count($account) == 0) {
      $username_error = 'Username does not exist.';
      $response['error'] = $username_error;
    } else {
      $response['account'] = $account;
      // check password
      $password_check = password_verify($data['password'], $account[0]["Password"]);
      if ($password_check == 0) {
        $password_error = 'Password doesn\'t match.';
        $response['error'] = $password_error;
      } else {
        $password_match = $password_check;
        $response['password_match'] = $password_match;
      }
    }
    //$myPassword = $data['password'];
    //$hash1 = password_hash($myPassword, PASSWORD_DEFAULT);
    //$hash2 = password_hash($myPassword, PASSWORD_DEFAULT);
    //$hash3 = sha1($myPassword);
    
    //$checkPassword2 = password_verify("mmm", $account[0]["Password"]);
    //$checkPassword3 = password_verify($hash3, $account[0]["Password"]);

    //$response = [
    //  'account' => $account,
    //  'username_match' => $username_match,
      //'password1 in single quote' => $hash1,
      //'password2 in double quote' =>  $hash2,
      //'sha1' => $hash3,
    //  'password_match' => $password_check,
      //'password_verify password2 response' => $checkPassword2,
      //'password_verify password3 response' => $checkPassword3,
    //];
    //return $response['account'][0]['Username'];
    //return $account;
    return $response;
  }
}