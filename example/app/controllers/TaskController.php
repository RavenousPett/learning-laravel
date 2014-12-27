<?php

use Acme\Services\TaskCreatorService;

class TaskController extends BaseController{

	protected $taskCreator;

	public function __construct(TaskCreatorService $taskCreator){

		$this->taskCreator = $taskCreator;

	}
	
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

//		$input = Input::all();

		try{

			$this->taskCreator->make($input = Input::all());

		}catch (Acme\Validators\ValidationException $e){

			return Redirect::back()->withInput()->withErrors($e->getErrors());

		}

//		Task::create([
//			'title' => $input['title'],
//			'body' => $input['body'],
//			'user_id' => $input['assign']
//		]);

		return Redirect::route('tasks');

	}

}