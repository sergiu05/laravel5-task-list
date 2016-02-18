<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository {

	/**
	* Get all the tasks for a given user
	*
	* @param User $user
	* @return Collection
	*/
	public function forUser(User $user) {

		return Task::where('user_id', $user->id)
					->orderBy('created_at', 'asc')
					->get();

	}

	/**
	* Count all the tasks	
	*
	* @return int
	*/
	public function count() {
		return Task::count();
	}
}