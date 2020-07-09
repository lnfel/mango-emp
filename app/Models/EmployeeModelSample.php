<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use App\Models\EmployeeModel;

class EmployeeModel {
  protected $db;

  public function __construct(ConnectionInterface &$db)
  {
    $this->db =& $db;
  }

  public function showAll()
	{
		// tell mysql connection that you want to work with employee table and return result via SELECT * from employee
		// but of course we don't want to show all rows in one page
		/*$query =  $this->db->table('employee')->get();

		foreach ($query->getResult() as $row) {
			return $row;
		}*/
		$builder = $this->db->table('employee');
		$query = $builder->get()->getResult('array');
		return $query;
	}

	public function where()
	{
		// this is just an example how to use WHERE on query builder
		// of course we don't have the necessary data on database to show result
		// this will show us employeeid 94
		return $this->db->table('employee')
		->where(['EmployeeID >' => 90])
		->where(['EmployeeID <' => 95])
		->where(['EmployeeID !=' => 91])
		->orderBy('EmployeeID', 'DESC')
		->get()
		->getRow(); 
		// getRow will show only one row, getResult will return an array of results with employeeid 94, 93, 92
	}

	public function join($id)
	{
		return $this->db->table('employee')
		->where('EmployeeID', $id)
		->join('employee_type', 'employee.EmployeeTypeID = employee_type.EmployeeTypeID')
		->get()
		->getResult('array');
	}
}