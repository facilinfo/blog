@extends('blog::blog.app')

@section('title')
	Modifier un utilisateur
@endsection

@section('active_tab')
	<?php $tab='blog_roles';?>
@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<h1>Modifier un utilisateur</h1>

		@include('blog::blog.users.form', ['action' => 'update'])
	</div>
@endsection