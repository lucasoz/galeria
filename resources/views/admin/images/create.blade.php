@extends('admin.template.main')

@section('title', 'Agregar Imagen')

@section('content')

	{!! Form::open(['route' => 'admin.images.store', 'method' => 'POST', 'files' => 'true']) !!}
		<div class="form-group">
			{!! Form::label('title', 'Titulo') !!}
			{!! Form::text('title',null, ['class'=>'form-control','required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Descripción') !!}
			{!! Form::text('description',null, ['class'=>'form-control',])!!}
		</div>
		<div class="form-group">
			{!! Form::label('image', 'Imagen') !!}
			{!! Form::file('image')!!}
		</div>
		<div class="form-group">
			{!! Form::label('comments', 'Comentarios') !!}
			{!! Form::text('comments',null, ['class'=>'form-control',])!!}
		</div>
		<div class="form-group">
			{!! Form::label('albumes_id', 'Albumes') !!}
			{!! Form::select('albumes_id[]', $albumes, null, ['class' => 'form-control select-album', 'multiple', 'required'])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Guardar Imagen', ['class' => 'btn btn-primary'])!!}
		</div>
	{!! Form::close() !!}
@endsection

@section('js')
	<script>
		$('.select-album').chosen({
			placeholder_text_multiple: 'Seleccione los albumes que quiere que contengan la foto',
			max_selected_option: 5
		});
	</script>
@endsection