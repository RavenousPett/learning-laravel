@extends('layouts/tasks')

@section('content')

	<h1>All Tasks</h1>
	<ul class="list-group">
		@foreach($tasks as $task)

			<li class="list-group-item {{ $task->completed ? 'completed' : '' }}">
				<a href="/{{ $task->user->username }}/tasks"><img src="{{ gravatar_url($task->user->email) }}" alt="{{ $task->user->username }}" /></a>
				{{--{{ link_to_route('user.tasks.show', $task->title, [$task->user->username, $task->id]) }}--}}
				{{--{{ link_to( "{$task->user->username}/tasks/{$task->id}", $task->title ) }}--}}
				{{ link_to_task($task) }}

				{{ Form::model($task, ['id' => 'task-update-form', 'method' => 'PATCH', 'route' => ['tasks.update', $task->id]]) }}
					{{ Form::checkbox('completed') }}
					{{ Form::submit('Update') }}
				{{ Form::close() }}

			</li>

		@endforeach
	</ul>

@if(isset($users))
	<hr>
	@include('tasks/partials/_form')
@endif

@stop