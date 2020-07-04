<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Site extends Controller
{
	public function index()
	{
		echo view('templates/header');
		echo view('index');
		echo view('templates/footer');
	}

	public function view($page = 'home')
	{
		if (! is_file(APPPATH.'/Views/site/'.$page.'.php')) {
			// Whoops, we don't have a page for that!

			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		echo view('templates/header', $data);
		echo view('site/'.$page, $data);
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------
}