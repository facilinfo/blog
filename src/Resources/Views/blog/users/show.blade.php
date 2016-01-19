@extends('app')
@section('tab')
	<?php $tab="users";?>
@stop
@section('content')

    	<h1>Fiche utilisateur</h1>

				<p><strong>Pseudo : </strong>{{ $user->name }}</p>
				<p><strong>Email : </strong>{{ $user->email }}</p>
				<?php if($user->role=='admin'){
				$role='Administrateur';
				}
				elseif ($user->role=='author'){
				$role='Auteur';
				}
				else{
				$role='Abonné';
				}
				?>
				<p><strong>Role : </strong>{{ $role }}</p>

				<p><strong>Confirmé :</strong> {{ $user->confirmed ? "oui" : "non" }}</p>

					@if($user->avatar == true)
					<p><strong>Avatar :</strong></p>
						<p>
							<img class="img-circle" src="{{ url('/').'/img/avatars/'.$user->id.'.png' }}"/>
						</p>

					@endif


		<br/><br/>

		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
@stop