<?php $action == "store" ? $method="Post" : $method="Put";?>

{!! BootForm::open()->action(route('blog.users.'.$action, $user)) !!}
{!! BootForm::bind($user) !!}
{!! BootForm::hidden('_method')->value($method) !!}
{!! BootForm::hidden('id', null) !!}

{!! BootForm::text('Pseudo', 'name') !!}
{!! BootForm::email('E-Mail', 'email') !!}

@if($user->confirmed==1)
    {!! BootForm::checkbox("Confirmé", "confirmed")->value("confirmed")->check()!!}
@else
    {!! BootForm::checkbox("Confirmé", "confirmed")->value("confirmed")!!}
@endif

{!! BootForm::select('Role', 'role_id')->options($roles)->select($role) !!}

{!! BootForm::submit('<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Sauvegarder')->addClass('btn-primary') !!}
{!! BootForm::close() !!}