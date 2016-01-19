@extends('app')

@section('tab')
<?php $tab="comments";?>
@stop

@section('content')
    <h1>Liste des commentaires</h1>

			<div class="panel-body">

			<table class="table display" id="myTable">
				<thead>
					<tr>
						<th>Commentaire</th>
						<th>Article</th>
						<th></th>

					</tr>
				</thead>
				<tbody>
					@foreach ($comments as $comment)
						<tr>


							<td class="text-primary"><strong>{!! substr($comment->content,0,25) !!}</strong></td>
							<td class="text-primary"><strong>{!! substr($comment->post->title,0,25) !!}</strong></td>

							<td class="text-right">
								<a class="btn btn-success" href="{{ action('CommentController@show', $comment) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Voir</a>



								@if(Auth::user()->role=='admin' || Auth::user()->id==$comment->user->id)
									<a class="btn btn-warning" href="{{ action('CommentController@edit', $comment) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editer</a>
								@endif


								@if(Auth::user()->role=='admin')

									<a class="btn btn-danger" href="{{ action('CommentController@destroy', $comment) }}" data-method="delete" data-confirm="Voulez vous vraiment supprimer ce commentaire ?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>

							</td>
								@endif

						</tr>
					@endforeach
	  			</tbody>
			</table>
				</div>


@stop

@include('scripts.tableScript')