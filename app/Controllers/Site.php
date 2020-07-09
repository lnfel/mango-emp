<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AccountModel;

class Site extends Controller
{
	public function index($page = 'login')
	{
		$data = [];
		$data['title'] = ucfirst($page);
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			// validation
			$rules = [

			];
		}

		echo view('templates/header-assets', $data);
		echo view('index');
		echo view('templates/footer-assets');
	}

	public function signup()
	{
		$data = [];
		//$data['title'] = ucfirst($page);
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			// validation
			$rules = [
				'username' => 'required|min_length[8]|max_length[20]',
				'password' => 'required|min_length[6]|max_length[255]',
				'password_confirm' => 'matches[password]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
			];

			//|is_unique[table.column]

			if (! $this->validate($rules)) {
				// if form submitted contains invalid values
				$data['validation'] = $this->validator;
			} else {
				// store data in the database
				$account = new AccountModel();

				$newAccount = [
					'username' => $this->request->getVar('username'),
					'password' => $this->request->getVar('password'),
				];

				// may error sa save
				//$account->save($newAccount);
				$session = session();
				$session->setFlashdata('success', 'Signup successful');
				return redirect()->to('/');
			}
		}

		echo view('templates/header-assets', $data);
		echo view('signup');
		echo view('templates/footer-assets');
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