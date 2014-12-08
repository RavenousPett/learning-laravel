@extends('layouts/default')
@section('content')

	<h1>
		Todo List
		<small ng-if="remaining()">(<% remaining() %> remaining)</small>
	</h1>

	<input type="text" placeholder="Filter todos" ng-model="search">

	<ul>
		<li ng-repeat="todo in todos | filter:search">
			<input type="checkbox" ng-model="todo.completed">
			<% todo.body %>
		</li>
	</ul>

	<form ng-submit="addTodo()">

		<input type="text" placeholder="New todo text" ng-model="newTodoText"> 
		<button type="submit">Add Todo</button>

	</form>

@stop