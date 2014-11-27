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

Route::get('/oop', function(){

	class Task{

		public $title;
		public $description;
		public $completed = false;

		public function __construct($title, $description){

			$this->title = $title;
			$this->description = $description;

		}

		public function complete(){

			$this->completed = true;

		}

	}

	// $task = new Task('Learn OOP', 'Sign up to laracasts and follow along with the videos');
	// $task->complete();
	// var_dump($task->completed);
	// return $task->title . " - " . $task->description . " Completed = " . $task->completed;

	class Person{

		public $name;
		public $age;

		public function __construct($name){

			$this->name = $name;

		}

		public function setAge($age){

			if( $age < 18){

				echo "Person is too young";

			}else{

				$this->age = $age;

			}

		}

		public function getAge(){

			return ($this->age * 365);

		}

	}

	$rich = new Person('Richard Pett');

	// Manipulating the propterty directly
	// $rich->age = 12;

	// We should use setters so that we can set rules about how the property should be set
	$rich->setAge(19);

	// We can also use getters to specify behavior when we get the age. E.g. return the age in number of days	
	var_dump($rich->getAge());


	// var_dump($rich);


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