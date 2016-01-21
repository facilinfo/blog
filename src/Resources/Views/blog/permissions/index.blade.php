@extends('blog::blog.app')

@section('title')
	Liste des permissions
@endsection

@section('content')
    <br>
    <div class="col-md-offset-1 col-md-10">
		@include('blog::blog.flash')
				<h1>Liste des permissions</h1>

		@if(Auth::check())
			<a class="btn btn-primary pull-right" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogPermissionController@create') }}">  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une permission</a>

		@endif
		<br><br><br>

			<table id="FItable" class="display" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Slug</th>
						<th>Description</th>
						<th>Modèle</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
				<tr>
					<th>Nom</th>
					<th>Slug</th>
					<th>Description</th>
					<th>Modèle</th>
					<th></th>
					<th></th>
				</tr>
				</tfoot>
				<tbody>
				
					@foreach ($permissions as $permission)


						<tr>
							<td>
								{!! $permission->name !!}
							</td>

							<td>
								{!! $permission->slug !!}
							</td>
							<td>
								{!! $permission->description !!}
							</td>
							<td>
								{!! $permission->model !!}
							</td>
							<td>
									<a class="btn btn-warning" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogPermissionController@edit', $permission->id) }}">  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifier</a>

							<td>
									<a class="btn btn-danger" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogPermissionController@destroy', $permission) }}" data-method="delete" data-confirm="Voulez vous vraiment supprimer cette permission ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>

	</div>
@stop

