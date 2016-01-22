@extends('blog::emails.html-template')

@section('content')
Bonjour {{ $user->name }},<br/><br/>

Un nouvel article intitulé {{$post->title}} est en ligne à cette adresse :<br/><br/>

<a href={{ action('PostController@show', $post->slug)  }}>{{ action('PostController@show', $post->slug)  }}</a><br/><br/>

Bonne lecture et à bientôt.

@stop