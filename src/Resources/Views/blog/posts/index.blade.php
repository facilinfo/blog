@extends('blog.app')

@section('content')
    <br>
    <div class="col-md-offset-1 col-md-10">
		@include('blog.flash')
				<h1>Liste des articles</h1>

		@if(Auth::check())
			<a class="btn btn-primary pull-right" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogPostController@create') }}">  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un article</a>

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
				
					@foreach ($posts as $post)


						<tr>
							<td>
								{!! $post->title !!}
							</td>

							<td>
								{!! $post->slug !!}
							</td>
							<td>

								@if(Auth::check())
									<a class="btn btn-warning" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogPostController@edit', $post->id) }}">  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifier</a>
								@endif

							</td>
							<td>

								@if(Auth::check())
									<a class="btn btn-danger" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogPostController@destroy', $post) }}" data-method="delete" data-confirm="Voulez vous vraiment supprimer cet article ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>
								@endif

							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>

	</div>
@stop

@section('scripts')

@stop