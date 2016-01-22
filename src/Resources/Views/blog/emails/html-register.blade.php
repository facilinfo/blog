@extends('blog::blog.emails.html-template')

@section('content')
    Bonjour,<br/><br/>

    Merci {{ $user->name }} pour votre inscription.<br/><br/>

    Veuillez valider votre compte en cliquant sur le lien de confirmation :<br/><br/>

    <a href="{{ url('confirm', [$user->id, $token]) }}">{{ url('confirm', [$user->id, $token]) }}</a><br/><br/>

    Merci.

    PS: N'oubliez pas de compléter votre profil si vous souhaitez recevoir des notifications par e-mail.
@stop