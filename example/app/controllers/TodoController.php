<?php

class TodoController extends BaseController{

	public function index(){

		return View::make('todo/index');

	}

	public function gettodos(){

		return Todo::all();

	}

}