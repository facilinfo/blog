

@extends('blog.app')

@section('title')
	Modifier une catégorie
@endsection

@section('active_tab')
	<?php $tab='blog_categories';?>
@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<h1>Modifier une catégorie</h1>

		@include('blog.categories.form', ['action' => 'update'])
	</div>
@endsection