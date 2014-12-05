<?php

class PagesController extends BaseController{
	
	public function home(){
		
		// handy function to add a user to DB
		// User::create([
		//  	'username' => 'StevieG',
		//  	'email' => 'cheeseontoast@gmail.com',
		//  	'password' => Hash::make('changeme')
		// ]);

		$name = 'Ricahrd';
		return View::make('hello')->with('name', $name);
	
	}

	public function about(){
	
		return View::make('about');
	
	}

	public function files(){

		$assets = Asset::all();
		
		return View::make('files')->with('assets', $assets);
	
	}

}
