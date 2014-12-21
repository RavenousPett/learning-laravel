<?php

class UserTasksController extends BaseController{

    public function  index($username){

//        $tasks = User::byUsername($username)->tasks;
        $tasks = Task::byUsername($username);

        return View::make('tasks/index', compact('tasks'));

    }

    public function show($username, $taskId){

//      grab the task by id associated with user
        $task = Task::find($taskId, $username);
//        $task = User::byUsername($username)->tasks()->findOrFail($taskId);


        return View::make('tasks/show', compact('task'));

    }

}