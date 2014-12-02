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

// Resouceful routing for users section for a RESTful style of development. This is because we are accessing or manipulating a resourcre (Users).
// REST allows us to think of our URIs in terms of nouns and collections
// Route::get('/users', 'UsersController@index');
// Route::get('/users/{username}', 'UsersController@show');
Route::resource('users', 'UsersController');
// Tip! - always favour convention over cofiguration

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

	// $rich = new Person('Richard Pett');

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

	// Inheritance, sub (aka child) classes inherit behaviour from the base (aka parent) class.
	// We create a sub class by extending another class. The protected funtions and properties in the base class will be available 
	// in the sub class
	abstract class Shape{
		// This is now an abstract class. I specify comon functionality here but I never want to be directly instanciated. You 
		// cant just have a generic shape object, you must use one of the sub classes i.e. Circle, Square or Traingle.
		// We want to enforce the contract that every shape must have a getArea method. Now that it is an absract class an error
		// will be thrown if we try and create a generic Shape, i.e. new Shape; Same principle for abstract methods, e.g. getArea

		protected $colour;

		public function __construct($colour = 'red'){

			$this->colour = $colour;
		}

		protected function getColour(){

			return $this->colour;

		}

		// any sub class MUST provide the method body, else a fatal error is thrown
		abstract function getArea();

	}

	class Square extends Shape{

		protected $length = 4; 

		// if the behavior of a method is usualy this, but sometimes that, include it in the base class
		public function getArea(){

			// return $this->length * $this->length;
			// squared, is the same as using to the power of 2, below
			return pow($this->length, 2);

		}

	}

	class Triangle extends Shape{

		protected $base = 4;
		protected $height = 7;

		// when we want to overide the behavior of a method include it in the sub class, it will get called instead
		public function getArea(){

			// in the case of a triangl we get the are by multiplying half base by the height
			return .5 * $this->base * $this->height;

		}

	}

	class Circle extends Shape{

		protected $radius = 5;

		public function getArea(){

			// all pretty much the same
			// return 3.14 * pow($this->radius, 2);
			// return pi() * pow($this->radius, 2);
			return M_PI * pow($this->radius, 2);

		}

		public function getCircleColour(){

			return $this->getColour();

		}


	}

	// echo (new Shape)->getArea();
	// echo (new Square)->getArea();
	// echo (new Square)->getArea();
	// echo (new Circle)->getArea();
	// new Shape;
	// new Circle;
	// echo (new Circle('green'))->getColour();
	// echo (new Circle)->getColour();
	// echo (new Circle)->getArea();
	// $circle = new Circle;
	// echo $circle->getCircleColour();

	// Messages, objects interact with one another by sending message. This example also demonstrates the Business class's
	// dependancy of the Staff class.

	class Human{

		protected $name;

		public function __construct($name){

			$this->name = $name;

		}

	}

	class Business{

		protected $staff;

		// You can't create a business without staff, so make it a requirement. And also type hint it as Staff.
		public function __construct(Staff $staff){

			$this->staff = $staff;

		}

		public function getStaff(){

			// Send a get message to the Staff object
			return $this->staff->getMembers();

		}

		public function hire(Human $human){

			// Send a message of add to the Staff object
			$this->staff->add($human);

		}

	}

	class Staff{

		protected $members;

		// Allow the option to pass in members, or default to an array
		public function __construct($members = []){

			$this->members = $members;

		}

		public function getMembers(){

			return $this->members;

		}

		public function add(Human $human){

			$this->members[] = $human;

		}

	}

	$jeff = new Human('Jeffery Way');
	$jane = new Human('Jane Doyle');

	// Add jefferey way to staff
	$staff = new Staff([$jeff]);

	// create the laracasts business object, passing in staff.
	$laracasts = new Business($staff);

	// The business should be able to add humans to thier staff
	$laracasts->hire($jane);

	// create a getter to obtain the staff in the business
	var_dump($laracasts->getStaff());


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