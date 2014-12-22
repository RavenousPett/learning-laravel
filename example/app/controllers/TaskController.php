<?php

class TaskController extends BaseController{
	
	public function index(){

		// fetch all tasks
		$tasks = Task::with('user')->get();
		$users = User::lists('username', 'id');

		// load a veiw to display them
		return View::make('tasks/index', ['tasks' => $tasks, 'users' => $users]);

	}

	public function show($id){

		// find the single task by id
		$task = Task::findOrFail($id);

		return View::make('tasks/show', compact('task'));

		// compact('task')) is the same as doing ['tasks' => $tasks], or with->('tasks', $tasks)


	}

	public function store(){

		$input = Input::all();

		Task::create([
			'title' => $input['title'],
			'body' => $input['body'],
			'user_id' => $input['assign']
		]);

		return Redirect::route('tasks');

	}

}