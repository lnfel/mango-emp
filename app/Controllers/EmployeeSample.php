<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EmployeeModel;

class Employee extends Controller {
	
	public function index($page = 'Employee') {
		$db = db_connect();
		$employee = new EmployeeModel($db);
		$result = $employee->showAll();
		/*echo "<pre>";
		print_r($result);
		echo "</pre>";*/
		
		// return as object
		/*$data = [
			'id' => $data->EmployeeID,
			'number' => $data->EmployeeNo,
			'typeID' => $data->EmployeeID,
			'firstName' => $data->FirstName,
			'lastName' => $data->LastName,
		];*/

		// return as array
		/*$data = [
			'id' => $result[0]['EmployeeID'],
			'number' => $result[0]['EmployeeNo'],
			'typeID' => $result[0]['EmployeeID'],
			'firstName' => $result[0]['FirstName'],
			'lastName' => $result[0]['LastName'],
		];*/
		$data['title'] = $page;
		$data['employee'] = $result;
		
		echo view('templates/header-assets', $data);
		echo view('templates/header');
		echo view('employee/index', $data);
		echo view('templates/footer');
		echo view('templates/footer-assets');
	}

	public function show($id) {
		$db = db_connect();
		$employee = new EmployeeModel($db);
		$result = $employee->join($id);
		/*echo "<pre>";
		print_r($result);
		echo "</pre>";*/
		$data = [
			'id' => $result[0]['EmployeeID'],
			'number' => $result[0]['EmployeeNo'],
			'type' => $result[0]['EmployeeType'],
			'firstName' => $result[0]['FirstName'],
			'lastName' => $result[0]['LastName'],
		];
		
		echo view('templates/header-assets', $data);
		echo view('templates/header');
		echo view('employee/index');
		echo view('templates/footer');
		echo view('templates/footer-assets');
	}

	public function where() {
		// sample usage of WHERE query, this will not work
		// see example at app/Models/EmployeeModel.php
		$db = db_connect();
		$employee = new EmployeeModel($db);
		$result = $employee->where();
		echo "<pre>";
		print_r($result);
		echo "</pre>";
	}

	public function join() {
		// sample usage of JOIN query, hopefully it is working
		// this will show employeeid 18 row with EmployeeType => REGULAR
		// see example at app/Models/EmployeeModel.php
		$db = db_connect();
		$employee = new EmployeeModel($db);
		$result = $employee->join();
		/*echo "<pre>";
		print_r($result);
		echo "</pre>";*/
		$data = [
			'id' => $result[0]['EmployeeID'],
			'number' => $result[0]['EmployeeNo'],
			'type' => $result[0]['EmployeeType'],
			'firstName' => $result[0]['FirstName'],
			'lastName' => $result[0]['LastName'],
		];
		
		echo view('templates/header');
		echo view('index', $data);
		echo view('templates/footer');
	}

	public function insert() {

	}

	public function edit() {

	}

	public function delete() {

	}
}