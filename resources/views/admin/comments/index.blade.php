@extends('admin.template.main')

@section('title', 'Album: '.$album->name)

@section('content')
	<div class="row">
		
			<div class="col-md">
				<div class="panel panel-default">
					<div class="panel-body">
						<img src="/galeria/public/images/{{ $image->route}}" class="img-responsive">
					</div>
					<div class="panel-footer">
						<strong><h4>{{ $image->title }}</h4><hr></strong>
							
							<hr>
							@foreach($comentarios as $comentario)
							<div class="panel panel-default">
							  	<div class="panel-body">
							    	<strong>{{    $comentario->name}}<hr></strong>
									{{   $comentario->comment}}
									<hr>
							  	</div>
							</div>
							
								
							
							@endforeach
							<!--  -->
							{!! Form::open(['route' => 'admin.comments.store', 'method' => 'POST']) !!}
								<div class="form-group">
									{!! Form::label('comentario', 'Comentario') !!}
									{!! Form::textarea('comentario','ingresa tu comentario', ['class'=>'form-control',])!!}
								</div>
								<div class="form-group">
									{!! Form::hidden('image',$image->id, ['class'=>'form-control',])!!}
								</div>
								<div class="form-group">
									{!! Form::hidden('album',$album->id, ['class'=>'form-control',])!!}
								</div>
								<div class="form-group">
									{!! Form::submit('Comentar', ['class' => 'btn btn-primary'])!!}
								</div>

							{!! Form::close() !!}
							
						
					</div>
				</div>
			</div>
		
	</div>
@endsection