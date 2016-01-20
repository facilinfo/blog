@extends('blog.app')

@section('content')
    <br>
    <div class="col-md-offset-1 col-md-10">
		@include('blog.flash')
				<h1>Liste des categories</h1>

		@if(Auth::check())
			<a class="btn btn-primary pull-right" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogCategoryController@create') }}">  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une catégorie</a>

		@endif
		<br><br><br>

			<table id="FItable" class="display" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Slug</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
				<tr>
					<th>Nom</th>
					<th>Slug</th>
					<th></th>
					<th></th>
				</tr>
				</tfoot>
				<tbody>
				
					@foreach ($categories as $category)


						<tr>
							<td>
								{!! $category->title !!}
							</td>

							<td>
								{!! $category->slug !!}
							</td>
							<td>

								@if($user->hasRole('admin'))
									<a class="btn btn-warning" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogCategoryController@edit', $category->id) }}">  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifier</a>
								@endif


							<td>

								@if($user->hasRole('admin'))
									<a class="btn btn-danger" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogCategoryController@destroy', $category) }}" data-method="delete" data-confirm="Voulez vous vraiment supprimer cette catégorie ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>
								@endif

							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>

	</div>
@stop

