@extends('admin.template.main')

@section('title', 'Editar Numero de Secuencia ' . $image->title)

@section('content')

	{!! Form::open(['route' => ['admin.images.update', $image], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('description', 'Secuencia') !!}
			{!! Form::text('description',$image->description, ['class'=>'form-control',])!!}
		</div>
		<div class="form-group">
			{!! Form::label('comments', 'Secuencia a cambiar ') !!}
			{!! Form::text('comments',$image->commets, ['class'=>'form-control',])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Terminar Edición', ['class' => 'btn btn-primary'])!!}
		</div>
	{!! Form::close() !!}
@endsection