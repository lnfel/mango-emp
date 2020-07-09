<?php namespace App\Validation;

use App\Models\AccountModel;

class AccountRules {
	public function validateAccount($str, string $fields, array $data) {
		$model = new AccountModel();
		$user = $model->where('Username', $data['username'])
			->first();

		if (!$user)
			// if no user is found
			return false;
		// if there is a user, verify if password matches in database
		// returns true or false
		return password_verify($data['password'], $user['Password']);
	}
}