<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Task;

class TaskController extends Controller
{
    /**
    * Create a new controller instance
    *
    * @param TaskRepository $tasks
    * @return void
    */
    public function __construct(TaskRepository $tasks) {

    	$this->middleware('auth');

    	$this->tasks = $tasks;

    }

    /**
    * Display all the user's tasks
    *
    * @param Request $request
    * @return Response
    */
    public function index(Request $request) {    	

    	$tasks = $this->tasks->forUser($request->user());

    	return view('tasks.index', compact('tasks'));
    }

    /**
    * Create a new task
    *
    * @param Request $request
    * @return Response
    */
    public function store(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|max:255'
    	]);

    	$request->user()->tasks()->create([
    		'name' => $request->name
    	]);

    	return redirect('/tasks');
    }

    /**
    * Destroy the given task (using implicit model binding)
    *
    * @param Request $request
    * @param Task $task
    * @return Response
    */
    public function destroy(Request $request, Task $task) {

    	$this->authorize('destroy', $task);

    	$task->delete();

    	return redirect('/tasks');

    }
}
