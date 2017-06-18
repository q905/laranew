<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Albums</title>

		<link rel="shortcut icon" href="{{ asset('favicon__.ico') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 

		<!-- Bootstrap -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<style>
			.navbar {
				margin-bottom: 0;
				border-radius: 0;
			}
			
			.row.content {height: auto}
			
			.sidenav {
				padding-top: 15px;
				background-color: #fff;
				height: auto;
				//border: 1px solid red
			}
			
			footer {
				background-color: #555;
				color: white;
				padding: 15px;
			}
			
			@media screen and (max-width: 767px) {
				.sidenav {
					height: 100%;
					padding: 15px;
				}
				.row.content {height:auto;} 
			}
			
			html{
				height: 100%;
				font-family: 'Ubuntu', Arial;
				
			}
			body{
				//margin-bottom: 50px;
				font-family: 'Ubuntu', Arial;
			}
			
			.jumbotron{
				font-family: 'Comfortaa', Arial;
				text-align: center;
			
			}
			footer{
				position: absolute;
				width: 100%;
				left: 0px;
				bottom: 0px;
				/*
				
				
				background: #eee;
				line-height: 50px;
				*/
			}
			tr{
				height:30px
			}
			th, td{
				width: 300px;
			}
			.tbl{
				height: 550px;
			}
			table{
				
				margin: 0 0 0 0;
			}
			/*.pag{
				width: 200px;
				position: absolute;
				left: 50%;
				bottom: 0px;
				margin: -100px 0 0 -100px;
			}*/
			
		</style>

    </head>
    <body>
		
		<nav class = "navbar navbar-inverse">
		<div class="container-fluid">
			<div class = "navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class = "navbar-brand" href = "{{ url('/') }}">Albums</a>
			</div>
			
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Записи</a></li>
					<li><a href="{{ url('/dev') }}">О сайте</a></li>
					<li><a href="{{ url('/dev') }}">Projects</a></li>
					<li><a href="{{ url('/dev') }}">Обо мне</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::check())
						<li><a href = "{{ url('/home') }}"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a></li>
						<li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Выход </a></li>
					@else
						<li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Вход</a></li>
						<li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-pencil"></span> Регистрация</a></li>
					@endif
					
				</ul>
			</div>
			
			
		</div>
		</nav>
		
		<!----><div style = "height: 100px; line-height: 100px; background: #eee; font-size: 30pt; text-align: center"><p><span class="glyphicon glyphicon-cd"></span></p></div>
		<div class="container-fluid text-center" style = "height: 100%">    
			<div class="row content">
				<div class="col-sm-2 sidenav">
					
					<p><a href = "{{ url('/') }}">Все записи</a></p>
					@if(Auth::check())
    
					<p><a href = "{{ url('/user') .'/'. Auth::user()->id }}">Мои записи</a></p>
					<p><a href="{{ url('/create') }}">+Добавить</a></p>
					<p><a href="javascript: alert('test deploy')">Test deploy</a></p>
    
					@endif
				</div>
				
				<div class="col-sm-8 text-left"> 
					
					@yield('content')
				</div>
				<div class="col-sm-2 sidenav" style="background: #fff">
					<div class="well">
						<p>&nabla;ADS</p>
					</div>
					
				</div>
			</div>
			<footer class="container-fluid text-center text-muted">
				<span class="glyphicon glyphicon-cd"></span> my demo 2017
			</footer>
		</div>


		
		
    </body>
</html>
