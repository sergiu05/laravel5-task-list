<?php

namespace App\Repositories;

use App\User;

class UserRepository {

	/**
	* Count all the users
	*
	* @return int
	*/
	public function count() {
		return User::count();
	}

}