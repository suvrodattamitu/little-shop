@extends('layouts/master')

@section('title','cart')

@section('main-content')

@if( Session::has('success') )

	<div class="alert alert-success">
		<srong>Success!</strong>{{ Session::get('success') }}
	</div>

@endif

	@if( Session::has('cart') )
		<div class = "row">
			<div class = "col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<ul class = "list-group">
					@foreach($products as $product)
						<li class = "list-group-item">
							<span class = "badge">{{ $product['qty'] }}</span>
							<strong>{{ $product['item']['title'] }}</strong>
							<span class="label label-success">{{ $product['price'] }}</span>
							<div class = "btn-group">
								<button type = "button" class = "btn btn-primary btn-xs dropdown-toggle"
								 data-toggle="dropdown" >Action <span class="caret"></span> </button>

								 <ul class = "dropdown-menu">
								 	<li><a href="{{ route('removefromcart',[ 'id' => $product['item']['id'] ]) }}">Reduce By 1</a></li>
								 	<li><a href="{{ route('removeallcart',[ 'id' => $product['item']['id'] ]) }}">Reduce All</a></li>
								 </ul>
							</div>
						</li>
					@endforeach
				</ul>
			</div>

		</div>

		<div class = "row">
			<div class = "col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<strong>Total: {{ $totalPrice }}</strong>
			</div>
		</div>

		<hr>

		<div class = "row">
			<div class = "col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<a type = "button" class = "btn btn-success" href="{{ route('checkout') }}">Checkout</a>
			</div>
		</div>

	@else

		<div class = "row">
			<div class = "col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<h2>No Items Found!</h2>
			</div>
		</div>

	@endif

@endsection