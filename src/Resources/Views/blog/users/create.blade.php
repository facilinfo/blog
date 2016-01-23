@extends('blog::blog.app')

@section('title')
	Ajouter un utilisateur
@endsection

@section('active_tab')
	<?php $tab='blog_roles';?>
@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<h1>Ajouter un utilisateur</h1>

		@include('blog::blog.users.form', ['action' => 'store'])
	</div>
@endsection