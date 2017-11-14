<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Default') | Panel de Administracion</title>
	<!-- yield crea secciones dentro de nuestra plantilla-->
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/propio.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
</head>
<body>
	<div id="menunavegacion">
		@include('admin.template.partials.nav')
	</div>
	<div id="contenedor">
		<div class="panel panel-default">
	  		<div class="panel-heading">@yield('title','Default')</div>
	  		<div class="panel-body">
	    		@include('flash::message')
	    		@include('admin.template.partials.errors')
	    		<section>
				@yield('content')
				</section>
	  		</div>
		</div>
	</div>

	<!--<div id="configfooter">-->
		<footer class="navbar">
		  <div class="well">
		      Blog 2017
		  </div>
		</footer> 
	<!--</div>-->

	<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.slim.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset ('plugins/chosen/chosen.jquery.js') }}"></script>
	@yield('js')
	
</body>
</html>