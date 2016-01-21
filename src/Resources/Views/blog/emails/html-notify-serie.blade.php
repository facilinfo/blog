@extends('emails.html-template')

@section('content')
    Bonjour {{ $user->name }},<br/><br/>

    Une nouvelle serie de photos intitulée {{$photoSerie->name}} est en ligne à cette adresse :<br/><br/>

    <a href={{ url('/').'/galerie/'.$photoSerie->slug  }}>{{ url('/').'/galerie/'.$photoSerie->slug  }}</a><br/><br/>

    A bientôt.
@stop