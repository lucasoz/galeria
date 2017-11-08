@extends('admin.template.main')

@section('title','Editar usuario '.$user->name)

@section('sub-title', 'Registrar Usuario')
@section('content')
	{!! Form::open(['route' => ['admin.users.update', $user],'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name',$user->name, ['class'=>'form-control', 'placeholder' =>'Nombre completo','required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('nickname', 'Nickname') !!}
			{!! Form::text('nickname', $user->nickname, ['class'=>'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('avatar', 'Avatar') !!}
			{!! Form::text('avatar', $user->avatar, ['class'=>'form-control', 'placeholder' =>'Ingrese una imagen', 'required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Correo Electronico') !!}
			{!! Form::email('email',$user->email, ['class'=>'form-control', 'placeholder' =>'example@gmail.com','required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('type', 'Tipo') !!}
			{!! Form::select('type',[''=>'Seleccione un nivel', 'admin'=>'Administrador', 'premium'=>'Premium','member'=>'Miembro'],$user->type,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection