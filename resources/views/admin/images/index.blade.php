@extends('admin.template.main')

@section('title', 'Mis Imagenes')

@section('content')
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
							<a href="{{ route('admin.images.edit', $image->id)}}" class="btn btn-warning">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
							</a>
							<a href="#" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
							<span class="glyphicon glyphicon-remove-circle"  aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection