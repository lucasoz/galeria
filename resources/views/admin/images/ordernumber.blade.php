@extends('admin.template.main')

@section('title', 'Editar Numero de Orden')

@section('content')

	{!! Form::open(['route' => ['admin.images.Number'], 'method' => 'POST']) !!}
		<div class="form-group">
			{!! Form::hidden('ida',$album, ['class'=>'form-control',])!!}
		</div>
		<div class="form-group">
			{!! Form::hidden('idi',$image, ['class'=>'form-control',])!!}
		</div>
		<div class="form-group">
			{!! Form::label('numero_nuevo', 'Numero Nuevo') !!}
			{!! Form::select('numeros_disponibles[]', $numeros, null, ['class' => 'form-control', 'required'])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Modificar orden', ['class' => 'btn btn-primary'])!!}
		</div>
	{!! Form::close() !!}
@endsection