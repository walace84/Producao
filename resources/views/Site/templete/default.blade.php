<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>{{$title or 'Clube do descontos'}}</title>
		<meta charset="utf-8">
		<link rel="icon" href="{{url('site/img/favicon.png')}}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- DENTRO DO PASTA PUBLIC -->
		<script src=""></script>
		<link rel="stylesheet" href="{{url('site/css/style.css')}}">
		<link rel="stylesheet" href="{{url('site/css/slide.css')}}">
	</head>
	<body>

		@include('Site.templete.logo')
		@include('Site.templete.menu')


		<div class="container">

			@yield('content')
			  
		</div>
		
		
		@stack('scripts')

		

	</body>
</html>
