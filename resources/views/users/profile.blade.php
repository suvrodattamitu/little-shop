@extends('layouts.master')

@section('title', 'Profile')

@section('main-content')

@if( Session::has('success') )

	<div class="alert alert-success">
		<srong>Success!</strong>{{ Session::get('success') }}
	</div>

@endif
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>User Profile</h1>
		</div>
	</div>

@endsection