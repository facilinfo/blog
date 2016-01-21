@extends('blog::blog.app')

@section('title')
	Ajouter une permission
@endsection

@section('active_tab')
	<?php $tab='blog_categories';?>
@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<h1>Ajouter une permission</h1>

		@include('blog::blog.permissions.form', ['action' => 'store'])
	</div>
@endsection