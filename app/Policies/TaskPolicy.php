<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Task;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
    * Make sure users can delete only their taks
    *
    * @param User $user
    * @param Task $task
    * @return bool
    */
    public function destroy(User $user, Task $task) {

    	return $user->id === $task->user_id;

    }
}
