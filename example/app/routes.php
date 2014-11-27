<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/files', 'PagesController@files');

Route::get('/users', 'PagesController@users');

Route::get('/users/{username}', function($username){

	$user = User::whereUsername($username)->first();

	return View::make('users/show')->with('user', $user);

});



// Example of basic crud operations
// Route::get('/', function(){

	// DB Class
	// $users = DB::table('users')->where('username', '!=', 'RichardPett')->get();

	// Eloquent ORM 

	// $users = User::where('username', '!=', 'RichardPett')->get();
	// $users = User::all();
	// return $users;

	// $user = new User;
	// $user->username = 'StevieG';
	// $user->password = Hash::make('SteviePass');
	// $user->save();

	// User::create([
	// 	'username' => 'AnotherUser',
	// 	'password' => Hash::make('password')
	// ]);

	// $user = User::find(1);
	// $user->username = 'UpdatedName';
	// $user->save();

	// $user = User::find(4);
	// $user->delete();

	// return User::all();

	// return User::orderby('username', 'asc')->take(2)->get();

// });