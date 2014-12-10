<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<title>Title of the document</title>
</head>

<body>

	<h1>All Tasks</h1>
	@foreach($tasks as $task)

		<li>{{ link_to( "tasks/$task->id", $task->title ) }}</li>

	@endforeach

</body>

</html>