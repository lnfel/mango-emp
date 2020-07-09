<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AccountModel;

class Site extends BaseController {

	public function index($page = 'login') {

		$data = [];
		$data['title'] = ucfirst($page);

		if ($this->request->getMethod() == 'post') {
			// validation
			$rules = [
				'username' => 'required',
				'password' => 'required|validateAccount[username,passsword]',
			];
			//validation error
			$errors = [
				'password' => [
					'validateAccount' => 'Username or Password don\'t match'
				]
			];

			if ( $this->validate($rules, $errors)) {
				// if form submitted contains invalid values
				$data['validation'] = $this->validator;
			} else {
				// look for account in database
				$model = new AccountModel();
				$user = $model->where('Username', $this->request->getVar('username'))->first();

				// set session data
				$session = session();
				$session->set($user);
				return redirect()->to('/dashboard');
			}
		}

		echo view('templates/header-assets', $data);
		echo view('index');
		echo view('templates/footer-assets');
	}
}