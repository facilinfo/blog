@extends('app')

@section('content')
    <br>
    <div class="col-sm-offset-2 col-sm-8">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des articles</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Titre</th>
						<th>Auteur</th
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				
					@foreach ($posts as $post)
						<tr>
							<td>{!! $post->id !!} </td>
							<td class="text-primary"><strong>{!! link_to_route('post.show', $post->title, [$post->id])!!}</strong></td>
							<td class="text-primary"><strong>{!! $post->user->name !!}</strong></td>
							<td>
							@if(Auth::check() and ((Auth::user()->role=='author' and $post->user->id==Auth::user()->id) or (Auth::user()->role=='admin')))
									{!! link_to_route('post.edit', 'Modifier', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}
							@endif 

							
							</td>
							<td>
							@if(Auth::check() and Auth::user()->role=='admin')
									{!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}

									{!! Form::close() !!}
								@endif

							
							</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>

							
		@if(Auth::check() and (Auth::user()->role=='admin' or Auth::user()->role=='author'))
		{!! link_to_route('post.create', 'Ajouter un article', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
		@endif
	</div>
@stop