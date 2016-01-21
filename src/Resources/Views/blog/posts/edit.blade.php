

@extends('blog::blog.app')

@section('title')
	Modifier un article
@endsection

@section('active_tab')
	<?php $tab='blog_categories';?>
@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<h1>Modifier l'article "{!! $post->title !!}"</h1>

		@include('blog.posts.form', ['action' => 'update'])
	</div>
@endsection