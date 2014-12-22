@extends('layouts/tasks')

@section('content')

	<h1>All Tasks</h1>
	<ul class="list-group">
		@foreach($tasks as $task)

			<li class="list-group-item">
				<a href="/{{ $task->user->username }}/tasks"><img src="{{ gravatar_url($task->user->email) }}" alt="{{ $task->user->email }}" /></a>
				{{--{{ link_to_route('user.tasks.show', $task->title, [$task->user->username, $task->id]) }}--}}
				{{--{{ link_to( "{$task->user->username}/tasks/{$task->id}", $task->title ) }}--}}
				{{ link_to_task($task) }}
			</li>

		@endforeach
	</ul>

@if(isset($users))
	<hr>
	@include('tasks/partials/_form')
@endif

@stop