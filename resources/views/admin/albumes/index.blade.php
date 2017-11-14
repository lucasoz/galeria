@extends('admin.template.main')
@section('title', 'Mis Albumes')

@section('content')
	<a href="{{ route('admin.images.create') }}" class="btn btn-info">Añadir imagen</a>
	<a href="{{ route('admin.albumes.create') }}" class="btn btn-info">Crear Album</a><hr>
	<table class="table table.striped">
		<thead>
			<th>Nombre</th>
			<th>Propietario</th>
			<th>Descripción</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($albumes as $album)
				<tr>
					<td><a href="{{ route('admin.images.show', $album->id)}}">{{ $album->name }}</a></td>
					<!--<td><a href="{{ route('admin.images.index')}}">{{ $album->name }}</a></td>--><!--que me muestre todas las imagenes-->		
					<td>
						
						@if ($album->type == "admin")
						
							<span class="label label-danger">{{ $album->nameuser }}</span>
						
						
						@elseif($album->type == "premium")
							<span class="label label-warning">{{ $album->nameuser }}</span>
						@else
							<span class="label label-primary">{{ $album->nameuser }}</span>
						@endif
					</td>
					<td>{{ $album->description }}</td>
					<td>
					@if(\Auth::user()->id == $album->user_id || \Auth::user()->type == "admin")
						<a href="{{ route('admin.albumes.edit',$album->id)}}" class="btn btn-warning">
						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
						</a>
						<a href="{{ route('admin.albumes.destroy',$album->id)}}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
						<span class="glyphicon glyphicon-remove-circle"  aria-hidden="true"></span>
						</a>
					@endif
					</td>	
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $albumes->render() !!}
@endsection