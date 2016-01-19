@extends('app')

@section('tab')
	<?php $tab="users";?>
@stop

@section('content')

			<h1>Création d'un utilisateur</h1>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::open(['url' => 'user', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						<label class="col-md-2 control-label">Pseudo</label>
						<div class="col-md-6">
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
						<label class="col-md-2 control-label">Email</label>
						<div class="col-md-6">
							{!! Form::email('email', null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
						<label class="col-md-2 control-label">Mot de passe</label>
						<div class="col-md-6">
							{!! Form::password('password', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
						<label class="col-md-2 control-label">Confirmer le mot de passe</label>
						<div class="col-md-6">
							{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Role </label>
						<div class="col-md-6">
							{!! Form::select('role', ['admin' => 'Administrateur', 'author' => 'Auteur', 'subscriber' => 'Abonné'], 'subscriber', array('class' => 'form-control') )    !!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Confirmé ? </label>
						<div class="col-md-10">
							{!! Form::checkbox('confirmed', '0', 0) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-8">
							<button type="submit" class="btn btn-primary pull-right">
								<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Sauvegarder
							</button>
						</div>
					</div>
				</div>
				{!! Form::close() !!}
					<div class="form-group">
						<div class="col-md-2">
							<a href="javascript:history.back()" class="btn btn-primary pull-right">
								<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
							</a>
						</div>
					</div>


			</div>

	</div>
@stop