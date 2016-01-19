@extends('app')

@section('tab')
	<?php $tab="posts";?>
@stop

@section('content')
    <h1>Création d'un article</h1>
			<div class="panel-body"> 
				<div class="col-md-12">
					{!! Form::open(['action' => 'PostController@store', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}


					<div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">
						<label class="col-md-2 control-label">Titre</label>
						<div class="col-md-10">
							{!! Form::text('title', null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group {!! $errors->has('body') ? 'has-error' : '' !!}">
						<label class="col-md-2 control-label">Contenu</label>
						<div class="col-md-10">
							{!! Form::textarea('body', null, ['id' => 'mytextarea', 'class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group {!! $errors->has('category_id') ? 'has-error' : '' !!}">
						<label class="col-md-2 control-label">Catégorie</label>
						<div class="col-md-6">
							{!! Form::select('category_id',$categories,null )!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">En ligne ? </label>
						<div class="col-md-10">
							{!! Form::checkbox('active', '0', 0) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
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

@include('scripts.tinymce')