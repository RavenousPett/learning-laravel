@extends('layouts/default')
@section('content')

	<h1>Create new user</h1>

	{{ Form::open(['route' => 'users.store']) }}
		<div>
			{{ Form::label('username', 'Usersname: ') }}
			{{ Form::text('username') }}
		</div>

		<div>
			{{ Form::label('password', 'Password: ') }}
			{{ Form::password('password') }}
		</div>

		<div>
			{{ Form::submit('create new user') }}
		</div>
	{{ Form::close() }}

@stop