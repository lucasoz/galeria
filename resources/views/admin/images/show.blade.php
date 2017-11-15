@extends('admin.template.main')

@section('title', 'Album: '.$album->name)

@section('content')
<a href="{{ route('admin.images.create') }}" class="btn btn-info">Añadir imagen</a><hr>
	<div class="row">
		@foreach($images as $image)
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<img src="/galeria/public/images/{{ $image->route}}" class="img-responsive">
					</div>
					<div class="panel-footer">
						<h4>{{ $image->title }}</h4>
						<div class="text-right">
							<!--  -->
							<a href="{{ route('admin.comments.comentarios', [$image->id, $album->id])}}" class="btn btn-info">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
							</a>
							@if(Auth::user()->type == "admin" || Auth::user()->id == $image->id_owner)
							<a href="{{ route('admin.images.edit', $image->id)}}" class="btn btn-warning">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
							</a>
							@endif
							<a href="{{ route('admin.images.ChangeOrderNumber', [$album->id, $image->id])}}" class="btn btn-danger">
							{{$image->orderNumber}}</a><hr>
							
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection

