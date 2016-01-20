@extends('app')
@section('tab')
	<?php $tab="categories";?>
@stop
@section('content')

				<h1>Liste des catégories</h1>

			<div class="panel-body">
			@if(Auth::check() and (Auth::user()->role=='admin' or Auth::user()->role=='author'))
					<a class="btn btn-primary pull-right" href="{{ action('CategoryController@create') }}">  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une catégorie</a>

			@endif
			<br/><br/><br/>
			<table class="table" id="myTable">
				<thead>
					<tr>

						<th>Titre</th>
						<th></th>

					</tr>
				</thead>
				<tbody>
				
					@foreach ($categories as $category)
						<tr>

							<td class="text-primary"><strong>{!! $category->title !!}</strong></td>

							<td class="pull-right">
								@if(Auth::check() && (Auth::user()->role=='author' || Auth::user()->role=='admin'))
									<a class="btn btn-warning" href="{{ action('CategoryController@edit', $category) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editer</a>
								@endif



							@if(Auth::check() and Auth::user()->role=='admin')

								<a class="btn btn-danger" href="{{ action('CategoryController@destroy', $category) }}" data-method="delete" data-confirm="Voulez vous vraiment supprimer cette catégorie ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>
							</td>
							@endif
						</tr>
					@endforeach
	  			</tbody>
			</table>

@stop

@include('scripts.tableScript')