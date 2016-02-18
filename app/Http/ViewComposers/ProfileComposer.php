<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;

class ProfileComposer {

	/**
	* The user repository implementation
	*
	* @var UserRepository
	*/
	protected $users;

	/**
	* The task repository implementation
	*
	* @var TaskRepository
	*/
	protected $tasks;

	/**
	* Create a new profile composer
	*
	* @param UserRepository $users
	* @param TaskRepository $tasks
	* @return void
	*/
	public function __construct(UserRepository $users, TaskRepository $tasks) {
		$this->users = $users;
		$this->tasks = $tasks;
	}

	/**
	* Bind data to the view
	*
	* @param View $view
	* @return void
	*/
	public function compose(View $view) {		
		$view->with('count', ['users' => $this->users->count(), 'tasks' => $this->tasks->count()]);		
	}


}

