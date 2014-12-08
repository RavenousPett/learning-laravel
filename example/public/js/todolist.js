function TodosController($scope, $http){

	// $scope.todos = [
	// 	{ body: 'Go to store', completed: true },
	// 	{ body: 'Finish video', completed: false },
	// 	{ body: 'Learn Angular', completed: false }

	// ];

	$http.get('/todo/gettodos').success(function(todos){

		$scope.todos = todos;

	});

	$scope.remaining = function(){

		var count = 0;

		angular.forEach($scope.todos, function(todo){

			count += todo.completed ? 0 : 1;

		});

		return count;

	}

	$scope.addTodo = function(){

		// $scope.todos.push({
		// 	body: $scope.newTodoText,
		// 	completed: false
		// });

		var todo = ({
			body: $scope.newTodoText,
		 	completed: false
		});

		$http.post('todo/gettodos', todo);

		$scope.todos.push(todo);

	}

}