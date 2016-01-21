@extends('app')

@section('title')
	Liste des utilisateurs
@endsection

@section('tab')
<?php $tab="users";?>
@stop

@section('content')


				<h1>Liste des utilisateurs</h1>

			<div class="panel-body">
				<a class="btn btn-primary pull-right" href="{{ action('UserController@create') }}">  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un utilisateur</a>
				<br/><br/><br/>
			<table class="table display" id="myTable">
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

								<a class="btn btn-success" href="{{ action('UserController@show', $user) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Voir</a>

								<a class="btn btn-warning" href="{{ action('UserController@edit', $user) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editer</a>

								<a class="btn btn-danger" href="{{ action('UserController@destroy', $user) }}" data-method="delete" data-confirm="Voulez vous vraiment supprimer cet utilisateur ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>

							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
				</div>


@stop

@include('scripts.tableScript')