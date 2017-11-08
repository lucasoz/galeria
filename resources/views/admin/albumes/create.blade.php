@extends('admin.template.main')

@section('title', 'Agregar albúm')

@section('content')

	{!! Form::open(['route' => 'admin.albumes.store', 'method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name',null, ['class'=>'form-control', 'placeholder' =>'Nombre del Albúm','required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Descripción') !!}
			{!! Form::textarea('description',null, ['class'=>'form-control',])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Crear', ['class' => 'btn btn-primary'])!!}
		</div>
	{!! Form::close() !!}
@endsection