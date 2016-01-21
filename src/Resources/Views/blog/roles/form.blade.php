<?php $action == "store" ? $method="Post" : $method="Put";?>

{!! BootForm::open()->action(route('blog.roles.'.$action, $role)) !!}
{!! BootForm::bind($role) !!}
{!! BootForm::hidden('_method')->value($method) !!}
{!! BootForm::hidden('id', null) !!}

<div class="col-md-6">
    {!! BootForm::text('Nom', 'name') !!}
    {!! BootForm::text('Slug', 'slug') !!}
    {!! BootForm::text('Description', 'description') !!}
    {!! BootForm::text('Level', 'level') !!}
</div>
<div class="col col-md-offset-2 col-md-4">
    <h3>Permissions</h3>
    @foreach($permissions as $permission)

        @if(in_array($permission->id, $permitted))
            {!! BootForm::checkbox("$permission->name", "$permission->id")->value('permitted')->check()!!}
        @else
            {!! BootForm::checkbox("$permission->name", "$permission->id")->value('permitted')!!}
            @endpermission

            @endforeach
</div>

{!! BootForm::submit('<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Sauvegarder')->addClass('btn-primary') !!}
{!! BootForm::close() !!}