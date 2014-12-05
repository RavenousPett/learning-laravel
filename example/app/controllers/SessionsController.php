<?php

class SessionsController extends BaseController{
	
	public function create(){

		// If user logged in dont want to see login form, so redirect them to admin page
		if( Auth::check() ) return Redirect::to('/admin');

		return View::make('sessions/create');

	}

	public function destroy(){

		Auth::logout();

		return Redirect::route('sessions.create');

	}

	public function store(){

		if( Auth::attempt(Input::only('email', 'password')) ){

			// just to be safe we only pass in the username and password to be authenticated
			// return Auth::user();
			return 'Welcome '.Auth::user()->username;
		}

		return Redirect::back()->withInput();

	}


}