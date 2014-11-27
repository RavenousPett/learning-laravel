@extends('layouts/default')
@section('content')
	<h1>All Users</h1>

	{{-- This is a comment dd($users->toArray()) --}}

	<ul>
	@if($users->count()) 

		@foreach($users as $user)

			<?php /* <li>{{ $user->username }}</li> */ ?>

			<li>{{ link_to("/users/{$user->username}", $user->username) }}</li>

		@endforeach

	@else

		<p>No users</p>

	@endif
@stop