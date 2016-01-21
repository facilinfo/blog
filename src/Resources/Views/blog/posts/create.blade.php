@extends('blog::blog.app')

@section('title')
	Ajouter un article
@endsection

@section('active_tab')
	<?php $tab='blog_posts';?>
@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<h1>Ajouter un article</h1>

		@include('blog.posts.form', ['action' => 'store'])
	</div>
@endsection