@extends('admin.template.main')

@section('title','Login')

@section('content')
	{!! Form::open(['route' => 'auth.login','method'=>'POST']) !!}
		<div class="form-group">
			{!! Form::label('email','Correo Electronico') !!}
			{!! Form::email('email',null,['class' => 'form-control' ,'placeholder'=>'example@gmail.com']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password','Password') !!}
			{!! Form::password('password',['class' => 'form-control' ,'placeholder'=>'******']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Acceder',['class'=>'btn btn-primary']) !!}	
			<a href="{{ route('registrer.index') }}" class="btn btn-info">Registrarse</a>
		</div>
	{!! Form::close() !!}
	


@endsection

