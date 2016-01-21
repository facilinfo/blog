@extends('blog::blog.app')

@section('title')
	Ajouter un rôle
@endsection

@section('active_tab')
	<?php $tab='blog_roles';?>
@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<h1>Ajouter un rôle</h1>

		@include('blog::blog.roles.form', ['action' => 'store'])
	</div>
@endsection