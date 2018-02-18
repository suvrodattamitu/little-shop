<!DOCTYPE html>
<html>
<head>
	
	@include('layouts/head')
	

</head>

<body>

	@include('partials/header')

	<div class = "container">
		@section('main-content')
		@show
	</div>
	

	@include('partials/footer')

	@yield('scripts')


</body>
</html>