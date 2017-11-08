@extends('admin.template.main')

@section('title', 'Editar albúm '.$album->name)

@section('content')

	{!! Form::open(['route' => ['admin.albumes.update', $album],'method'=>'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name',$album->name, ['class'=>'form-control', 'placeholder' =>'Nombre del Albúm','required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Descripción') !!}
			{!! Form::textarea('description',$album->description, ['class'=>'form-control',])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary'])!!}
		</div>
	{!! Form::close() !!}
@endsection