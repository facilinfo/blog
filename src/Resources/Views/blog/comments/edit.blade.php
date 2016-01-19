@extends('app')

@section('tab')
	<?php $tab="comments";?>
@stop

@section('content')
   <h1>Modification d'un commentaire</h1>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($comment, ['route' => ['comment.update', $comment->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group">
						<label class="col-md-2 control-label">Commentaire</label>
						<div class="col-md-6">
							{!! Form::textarea('content', null, ['class' => 'form-control']) !!}
						</div>
					</div>

					<input type="hidden" name="on_post" value="{!! $comment->post->id !!}">
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


@stop