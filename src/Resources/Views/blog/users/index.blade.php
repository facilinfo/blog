@extends('blog::blog.app')

@section('title')
	Liste des utilisateurs
@endsection

@section('tab')
<?php $tab="users";?>
@stop

@section('content')
	<br>
	<div class="col-md-offset-1 col-md-10">
		@include('blog::blog.flash')

				<h1>Liste des utilisateurs</h1>

			<div class="panel-body">
				<a class="btn btn-primary pull-right" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogUserController@create') }}">  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un utilisateur</a>
				<br/><br/><br/>
			<table id="FItable" class="table display">
				<thead>
					<tr>

						<th>Nom</th>
						<th>Email</th>
						<th>avatar</th>
						<th></th>

					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>

							<td class="text-primary"><strong>{!! $user->name !!}</strong></td>
							<td class="text-primary"><strong>{!! $user->email !!}</strong></td>
							<td class="text-primary">
								@if($user->avatar == true)
									<img class="img-circle" src="{{ url('/').'/img/avatars/'.$user->id.'.png' }}"/>
								@endif
							</td>
							<td class="pull-right">

								<a class="btn btn-success" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogUserController@show', $user) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Voir</a>

								<a class="btn btn-warning" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogUserController@edit', $user) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editer</a>

								<a class="btn btn-danger" href="{{ action('\Facilinfo\Blog\App\Http\Controllers\BlogUserController@destroy', $user) }}" data-method="delete" data-confirm="Voulez vous vraiment supprimer cet utilisateur ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>

							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
				</div>

</div>
@stop