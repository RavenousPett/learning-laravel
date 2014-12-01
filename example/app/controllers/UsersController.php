<?php

class UsersController extends BaseController{
	
	public function index(){

		$users = User::all();
		
		return View::make('users/index', ['users' => $users]);
	
	}

	public function show($username){

		$user = User::whereUsername($username)->first();

		return View::make('users/show')->with('user', $user);
	}

	public function create(){

		return View::make('users/create');

	}

	public function store(){

		// if validation fails
		if( ! User::isValid( Input::all() ) ){

			return Redirect::back()->withInput()->withErrors(User::$errors);

		}

		// return 'Store the user in DB';
		// return Input::all();
		// return Input::get('username');
		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));

		$user->save();

		return Redirect::route('users.index');
		// same as
		// return Redirect::to('/users');

	}

}