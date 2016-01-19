@extends('app')

@section('tab')
	<?php $tab="categories";?>
@stop

@section('content')
    <div class="col-sm-offset-2 col-sm-8">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">{{ $post->title }}</div>
			<div class="panel-body"> 
				<p>{{ $post->body }}</p>
				
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop