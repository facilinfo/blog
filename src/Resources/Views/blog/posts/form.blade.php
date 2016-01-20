<?php $action == "store" ? $method="Post" : $method="Put";?>

{!! BootForm::open()->action(route('blog.posts.'.$action, $post)) !!}
{!! BootForm::bind($post) !!}
{!! BootForm::hidden('_method')->value($method) !!}
{!! BootForm::hidden('id', null) !!}

{!! BootForm::text('Nom', 'title') !!}
{!! BootForm::textarea('Contenu', 'body') !!}
{!! BootForm::select('Catégorie', 'category_id')->options($categories) !!}
{!! BootForm::submit('<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Sauvegarder')->addClass('btn-primary') !!}
{!! BootForm::close() !!}