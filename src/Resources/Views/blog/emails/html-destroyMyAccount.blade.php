
@extends('emails.html-template')

@section('content')
    Bonjour {{ $user->name }}<br/><br/>

    Votre compte a bien été supprimé.<br/><br/>

    Merci.

@stop