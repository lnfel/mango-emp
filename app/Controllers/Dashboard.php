<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
	public function index($page = 'dashboard')
	{
		$data['title'] = ucfirst($page);

		echo view('templates/header-assets', $data);
		echo view('templates/header');
		echo view('dashboard');
		echo view('templates/footer');
		echo view('templates/footer-assets');
	}
}