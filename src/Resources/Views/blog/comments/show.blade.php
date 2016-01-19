@extends('app')

@section('tab')
	<?php $tab="comments";?>
@stop

@section('content')
    <h1>Commentaire</h1>
			<div class="panel-body"> 
				<p><strong>Article : </strong> {{ $comment->post->title }}</p>
				<p><strong>Commentaire : </strong> {{ $comment->content }}</p>
				<p><strong>Auteur : </strong> {{ $comment->user->name }}</p>

				<?php
				$created=new Carbon\Carbon($comment->created_at);
				$updated=new Carbon\Carbon($comment->updated_at);
				setlocale(LC_TIME,'fr_FR.utf8');
				?>
				<p><strong>Crée le :  </strong>{{ $created->formatLocalized(' %d %B %Y à %H h %i') }}</p>
				<p><strong>Modifié le: </strong> {{ $updated->formatLocalized(' %d %B %Y à %H h %i') }}</p>


<br/><br/>



		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
		</div>
@stop