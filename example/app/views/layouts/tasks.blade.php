<!DOCTYPE html>
<html ng-app="todoApp">
	<!-- ng-app defines to scope of what angular can access -->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

		<title>Title of the document</title>
	</head>

	<body>

		<div class="container col-md-6 col-md-offset-3">
			@yield('content')
		</div>

	</body>

</html>