@extends('admin.template.main')

@section('title', 'Album: '.$album->name)

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
							@if(Auth::user()->type == "admin" || Auth::user()->id == $image->id_owner)
							<a href="{{ route('admin.images.edit', $image->id)}}" class="btn btn-warning">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
							</a>
							@endif
							<a href="{{ route('admin.images.ChangeOrderNumber', [$album->id, $image->id])}}" class="btn btn-danger">
							{{$image->orderNumber}}</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection

