@extends('emails.html-template')

@section('content')
    Cliquez sur le lien pour réinitialiser le mot de passe: <a href="{{ url('password/reset/'.$token) }}">{{ url('password/reset/'.$token) }}</a>
@stop
