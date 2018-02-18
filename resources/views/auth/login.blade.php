@extends('layouts.master')

@section('title', 'Login')

@section('main-content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3 ok">
			{!! Form::open() !!}

				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}

				{{ Form::label('password', "Password:") }}
				{{ Form::password('password', ['class' => 'form-control']) }}
				
				<br>
				{{ Form::checkbox('remember') }}{{ Form::label('remember', "Remember Me") }}
				
				<br>
				{{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}
				
				<p><a href = "{{ url('auth/register') }}">register here</a></p>


			{!! Form::close() !!}
		</div>
	</div>

@endsection