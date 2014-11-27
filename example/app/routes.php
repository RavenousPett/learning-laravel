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

Route::get('/users', 'UsersController@index');

Route::get('/users/{username}', 'UsersController@show');

Route::get('/oop', function(){

	#A basic class
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


	#Getters and setters
	class Person{

		private $name;
		private $age;

		public function __construct($name){

			$this->name = $name;

		}

		public function setAge($age){

			if( $age < 18){

				throw new Exception("Person is too young");

			}else{

				$this->age = $age;

			}

		}

		public function getAge(){

			return ($this->age * 365);

		}

	}

	$rich = new Person('Richard Pett');

	// Manipulating the propterty directly, wont work now as it is private not public. Use the public interface that we offer to you, i.e. getAge and setAge.
	// $rich->age = 12;

	// We should use setters so that we can set rules about how the property should be set
	// $rich->setAge(19);

	// We can also use getters to specify behavior when we get the age. E.g. return the age in number of days	
	// var_dump($rich->getAge());
	// var_dump($rich);


	// Encapsulation, only expose the methods and behaviour that a relevant to the public interface. We want to hide as much information as possible.
	class LightSwitch{

		// public, i.e. available outside of this class. On and Off are all that the public needs to be aware of.
		public function on(){


		}

		public function off(){


		}

		// Other functions that are required to turn the swtich on, but are not publcicly accessible.
		private function connect(){

			echo "connecting";

		}

		// Can also do protect funtion activate()
		private function activate(){


		}

	}

	// $switch = new LightSwitch();
	// Will throw and error because we are calling a private method from outside the class
	// $switch->connect();

	// private = accessed only and exclusively from within the LightSwtich class
	// protected = can be accessed from a class that extends LightSwitch


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