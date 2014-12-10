<?php

class TaskController extends BaseController{
	
	public function index(){

		// fetch all tasks
		$tasks = Task::all();

		// load a veiw to display them
		return View::make('tasks/index', ['tasks' => $tasks]);

	}

	public function show($id){

		// find the single task by id
		$task = Task::findOrFail($id);

		return View::make('tasks/show', compact('task'));

		// compact('task')) is the same as doing ['tasks' => $tasks], or with->('tasks', $tasks)


	}

}