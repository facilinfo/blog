@extends('blog::blog.app')

@section('title')
	Modifier un rôle
@endsection

@section('active_tab')
	<?php $tab='blog_roles';?>
@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<h1>Modifier un rôle</h1>

		@include('blog::blog.roles.form', ['action' => 'update'])
	</div>
@endsection