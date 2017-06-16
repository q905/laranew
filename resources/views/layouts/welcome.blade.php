<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Albums</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 

		<!-- Bootstrap -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<style>
			html, body{
				min-height: 100%;
				
			}
			
			.jumbotron{
				font-family: 'Comfortaa', Arial;
				text-align: center;
			}
			.footer{
				text-align: center;
				height: 50px;
			}
		</style>

    </head>
    <body>
		
		<nav class = "navbar navbar-inverse">
		<div class="container">
			<div class = "navbar-header">
				<a class = "navbar-brand" href = "{{ url('/') }}"</a>Albums</a>
			</div>
			
			<ul class = "nav navbar-nav">
				@if (Auth::check())
				<li><a href = "{{ url('/home') }}"> {{ Auth::user()->name }}</a></li>
				<li><a href="{{ url('/logout') }}">Выход </a></li>
				@else
				<li><a href="{{ url('/login') }}">Вход </a></li>
				<li><a href="{{ url('/register') }}">Регистрация</a></li>
				@endif
			</ul>
		</div>
		</nav>
		<div class = "jumbotron"><h1>Albums</h1></div>
		<div class='container'>
			@yield('content')
		</div>
		<div class = "footer">
			<div class = "container text-muted">&copy; my demo 2017</div>
		</div>
    </body>
</html>
