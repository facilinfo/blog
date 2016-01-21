@extends('blog::blog.app')

@section('title')
	Ajouter une catégorie
@endsection

@section('active_tab')
	<?php $tab='blog_categories';?>
@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<h1>Ajouter une catégorie</h1>

		@include('blog::blog.categories.form', ['action' => 'store'])
	</div>
@endsection