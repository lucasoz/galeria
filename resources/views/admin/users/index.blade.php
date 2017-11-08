@extends('admin.template.main')
@section('title', 'Lista de usuarios')

@section('content')
	<table class="table table.striped">
		<thead>
			<th>Avatar</th>
			<th>ID</th>
			<th>Nombre</th>
			<th>Nickname</th>
			<th>Correo</th>
			<th>Tipo</th>
			<th>Acción</th>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->avatar }}</td>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->nickname }}</td>
					<td>{{ $user->email }}</td>
					<td>
						@if ($user->type == "admin")
							<span class="label label-danger">{{ $user->type }}</span>
						@elseif($user->type == "premium")
							<span class="label label-warning">{{ $user->type }}</span>
						@else
							<span class="label label-primary">{{ $user->type }}</span>
						@endif
					</td>
					@if (Auth::user()->type == "admin")
						<td>
						<a href="{{ route('admin.users.edit',$user->id)}}" class="btn btn-warning">
						<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
						</a>
						<a href="{{ route('admin.users.destroy',$user->id)}}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger">
						<span class="glyphicon glyphicon-remove-circle"  aria-hidden="true"></span>
						</a> 
						</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $users->render() !!}
@endsection




