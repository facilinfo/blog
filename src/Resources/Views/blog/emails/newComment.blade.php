Un commentaire a été posté ou modifié sur l'article {{ $post->title }} par {{ $user->name }}.<br/><br/>

En voici le contenu :<br/><br/>

{{ $content }}<br/><br/>

Voir l'article:<br/><br/>

<a href={{ action('PostController@show', $post->slug)  }}>{{ action('PostController@show', $post->slug)  }}</a>
