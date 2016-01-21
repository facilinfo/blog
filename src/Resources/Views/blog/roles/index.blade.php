@extends('blog::blog.app')

@section('title')
	Liste des rôles
@endsection

@section('content')
    <br>
    <div class="col-md-offset-1 col-md-10">
		@include('blog::blog.flash')
				<h1>Liste des rôles</h1>

		@if(Auth::check())
			<a class="btn btn-primary pull-right" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogRoleController@create') }}">  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un rôle</a>

		@endif
		<br><br><br>

			<table id="FItable" class="display" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Slug</th>
						<th>Description</th>
						<th>Level</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
				<tr>
					<th>Nom</th>
					<th>Slug</th>
					<th>Description</th>
					<th>Level</th>
					<th></th>
					<th></th>
				</tr>
				</tfoot>
				<tbody>
				
					@foreach ($roles as $role)


						<tr>
							<td>
								{!! $role->name !!}
							</td>

							<td>
								{!! $role->slug !!}
							</td>
							<td>
								{!! $role->description !!}
							</td>
							<td>
								{!! $role->level !!}
							</td>
							<td>
									<a class="btn btn-warning" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogRoleController@edit', $role->id) }}">  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifier</a>

							<td>
									<a class="btn btn-danger" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogRoleController@destroy', $role) }}" data-method="delete" data-confirm="Voulez vous vraiment supprimer ce rôle ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>

	</div>
@stop

