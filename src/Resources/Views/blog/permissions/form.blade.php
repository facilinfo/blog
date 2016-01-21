<?php $action == "store" ? $method="Post" : $method="Put";?>

{!! BootForm::open()->action(route('blog.permissions.'.$action, $permission)) !!}
{!! BootForm::bind($permission) !!}
{!! BootForm::hidden('_method')->value($method) !!}
{!! BootForm::hidden('id', null) !!}

{!! BootForm::text('Nom', 'name') !!}
{!! BootForm::text('Description', 'description') !!}
{!! BootForm::text('Model', 'model') !!}
{!! BootForm::submit('<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Sauvegarder')->addClass('btn-primary') !!}
{!! BootForm::close() !!}