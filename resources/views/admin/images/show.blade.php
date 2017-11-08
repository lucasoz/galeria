<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
	<title>Album: {{ $album->name }}</title>
	<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.slim.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset ('plugins/chosen/chosen.jquery.js') }}"></script>        
	<!-- añadir jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
	<!-- añadir jQuery-UI -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<!-- estilos para la lista -->
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/propio.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
</head>

<body>
	<div id="menunavegacion">
		@include('admin.template.partials.nav')
	</div>

	<!-- Crear una lista con id="milista" -->
	<div id="contenedor">

		<div class="panel panel-default">
			<div class="panel-heading">{{ $album->name }}</div>
			<div class="panel-body">
				@include('flash::message')
				@include('admin.template.partials.errors')


				<div class="row">
					<ol id="milista">
						@foreach($images as $image)
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-body">
									<img src="/galeria/public/images/{{ $image->route}}" class="img-responsive">
								</div>
								<div class="panel-footer">
									<h4>{{ $image->title }}</h4>
									<div class="text-right">
										@if(Auth::user()->type == "admin" || Auth::user()->id == $image->id_owner)
										<a href="{{ route('admin.images.edit', $image->id)}}" class="btn btn-warning">
											<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
										</a>
										@endif

									</div>
								</div>
							</div>
						</div>
						@endforeach
					</ol>
				</div>

			</div>
		</div>
	</div>


	<script>
		$(document).ready(function(){
                //Aplicar la función sortable a la lista con id milista
                $( "#milista" ).sortable({});
            });
        </script>


	<!--<div id="configfooter">-->
	<footer class="navbar">
		<div class="well">
			Blog 2017
		</div>
	</footer> 
	<!--</div>-->

	@yield('js')
</body>
</html>

