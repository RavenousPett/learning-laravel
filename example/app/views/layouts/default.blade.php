<!DOCTYPE html>
<html ng-app="todoApp">
	<!-- ng-app defines to scope of what angular can access -->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
		<title>Title of the document</title>
		<style>
			small {font-size: 0.8em; color:grey;}
		</style>
	</head>

	<body ng-controller="TodosController">

		@yield('content')

		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js"></script>
		<script>
			var todoApp = angular.module('todoApp', [], function($interpolateProvider) {
		        $interpolateProvider.startSymbol('<%');
		        $interpolateProvider.endSymbol('%>');
			});
		</script>
		<script src="/js/todolist.js"></script>

	</body>

</html>