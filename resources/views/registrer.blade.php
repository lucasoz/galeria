@extends('admin.template.main')

@section('title','Registro')

@section('sub-title', 'Registro')
@section('content')

	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>

	@endif
	<!--'route'=>'admin.users.store' es el lugar donde enviará la información del formulario-->
	{!! Form::open(['route'=>'registrer.store','method'=>'POST']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name',null, ['class'=>'form-control', 'placeholder' =>'Nombre completo','required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('nickname', 'Nickname') !!}
			{!! Form::text('nickname',null, ['class'=>'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Correo Electronico') !!}
			{!! Form::email('email',null, ['class'=>'form-control', 'placeholder' =>'ejemplo@gmail.com','required'])!!}
		</div>
		<div class="form-group">	
			{!! Form::label('password', 'Contraseña') !!}
			{!! Form::password('password', ['class'=>'form-control', 'placeholder' =>'*****','required'])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
		</div>


	{!! Form::close() !!}
@endsection