<?php $action == "store" ? $method="Post" : $method="Put";?>

{!! BootForm::open()->action(route('blog.categories.'.$action, $category)) !!}
{!! BootForm::bind($category) !!}
{!! BootForm::hidden('_method')->value($method) !!}
{!! BootForm::hidden('id', null) !!}

{!! BootForm::text('Nom', 'title') !!}
{!! BootForm::submit('<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Sauvegarder')->addClass('btn-primary') !!}
{!! BootForm::close() !!}