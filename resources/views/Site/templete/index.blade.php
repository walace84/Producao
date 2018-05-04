<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>{{$title or 'Clube do descontos'}}</title>
	    <meta name="description" content=" Clube do descontos,uma parceria com pequenas empresas para dar descontos exclusivos aos clientes">
	    <meta name="keywords" content="desconto, clude do desconto, colatina, espirito santo">
	    <meta name="url" content="http://www.clubedodesconto.com.br/" />
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
		<link rel="stylesheet" href="{{url('site/css/style.css')}}">

	</head>
	<body>

		@include('Site.templete.logo')
		@include('Site.templete.menu')

		<div class="container">
			
			@include('Site.templete.slide')  

		</div>

		<div class="container">

			@yield('content')
			  
		</div>
		
		
		@stack('scripts')

		@include('Site.templete.footer')

	</body>
</html>
