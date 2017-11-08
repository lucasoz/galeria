@extends('admin.template.main')

@section('title', 'Editar Imagen ' . $image->title)

@section('content')

	{!! Form::open(['route' => ['admin.images.update', $image], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('description', 'Descripción') !!}
			{!! Form::text('description',$image->description, ['class'=>'form-control',])!!}
		</div>
		<div class="form-group">
			{!! Form::label('title', 'Titulo') !!}
			{!! Form::text('title',$image->title, ['class'=>'form-control','required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('comments', 'Comentarios') !!}
			{!! Form::text('comments',$image->commets, ['class'=>'form-control',])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Terminar Edición', ['class' => 'btn btn-primary'])!!}
		</div>
	{!! Form::close() !!}
@endsection