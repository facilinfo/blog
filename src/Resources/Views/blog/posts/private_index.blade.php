@extends('app')
@section('tab')
	<?php $tab="posts";?>
@stop
@section('content')
   <h1>Liste des articles</h1>

			<div class="panel-body">
			@if(Auth::check() and (Auth::user()->role=='admin' or Auth::user()->role=='author'))
					<a class="btn btn-primary pull-right" href="{{ action('PostController@create') }}">  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un article</a>

			@endif
			<br/><br/><br/>
			<table class="table" id="myTable">
				<thead>
					<tr>

						<th>Titre</th>
						<th>Auteur</th>
						<th>Catégorie</th>
						<th></th>


					</tr>
				</thead>
				<tbody>
				
					@foreach ($posts as $post)

						<tr>

							<td class="text-primary"><strong>{!! link_to_route('post.show', substr($post->title,0,20) , [$post->slug])!!} <?php if(strlen($post->title)>20) echo " ...";?></strong></td>
							<td class="text-primary"><strong>{!! $post->user->name !!}</strong></td>
							<td class="text-primary"><strong>{!! substr($post->category->title,0,20) !!}  <?php if(strlen($post->category->title)>20) echo " ...";?></strong></td>
							<td class="text-right">
							@if(Auth::check() and ((Auth::user()->role=='author' and $post->user->id==Auth::user()->id) or (Auth::user()->role=='admin')))
									<a class="btn btn-warning" href="{{ action('PostController@edit', $post) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editer</a>
							@endif


							@if(Auth::check() and Auth::user()->role=='admin')
									<a class="btn btn-danger" href="{{ action('PostController@destroy', $post) }}" data-method="delete" data-confirm="Voulez vous vraiment supprimer cet article ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>

								@endif

							
							</td>


						</tr>
					@endforeach
	  			</tbody>
			</table>
			</div>

@stop

@include('scripts.tableScript')