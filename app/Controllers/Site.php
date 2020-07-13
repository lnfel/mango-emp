<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Site extends BaseController {

	public function index($page = 'login') {

		$data = [];
		$data['title'] = ucfirst($page);

		// if request method is post (if user submitted the form)
		if ($this->request->getMethod() == 'post') {
			// call validation service
			$validation =  \Config\Services::validation();
			// call custom $login validation
			$this->validate('login');

			if ($validation->hasError('username') || $validation->hasError('password')) {
				$errors = $validation->listErrors();
				$data['validation'] = $this->validator;
			} else {
				$data['username'] = $this->request->getVar('username');
	      $data['password'] = $this->request->getVar('password');

	      // call an instance of AccountModel for access
				
				//
				$data['result'] = $account_model->login($data);
				if (array_key_exists('error', $data['result'])) {
					// do nothing, on index page we have if(isset($result)) it will show error
					$data['arrgh'] = 'oof';
				} else {
					// allow user to dashboard
					$data['arrgh'] = 'rawr';
					$data['account'] = $data['result']['account'][0];
					// set session data
					$session = session();
					$session->set($data['account']);
					return redirect()->to('/dashboard');
				}
			}
		}

		//$model = new AccountModel();
		//$data['dump'] = ['username' => '19011601', 'password' => 'mmm'];
		//$data['username'] = $data['dump']['username'];
		//$data['result'] = $model->login($data['dump']);
		//$data['account'] = $data['result']['account'];

		echo view('templates/header-assets', $data);
		echo view('index');
		echo view('templates/footer-assets');
	}

	public function logout() {
		$session = session();
		$session->destroy();
		return redirect()->to('/');
	}
}