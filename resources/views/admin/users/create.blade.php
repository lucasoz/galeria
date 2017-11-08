@extends('admin.template.main')

@section('title','Crear Usuario')

@section('sub-title', 'Registrar Usuario')
@section('content')

	
	<!--'route'=>'admin.users.store' es el lugar donde enviará la información del formulario-->
	{!! Form::open(['route'=>'admin.users.store','method'=>'POST']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name',null, ['class'=>'form-control', 'placeholder' =>'Nombre completo','required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('nickname', 'Nickname') !!}
			{!! Form::text('nickname',null, ['class'=>'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('avatar', 'Avatar') !!}
			{!! Form::text('avatar',null, ['class'=>'form-control', 'placeholder' =>'Ingrese una imagen', 'required'])!!}
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
			{!! Form::label('type', 'Tipo') !!}
			{!! Form::select('type', [''=>'Seleccione un nivel','member'=>'Miembro', 'admin'=>'Administrador'],null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection