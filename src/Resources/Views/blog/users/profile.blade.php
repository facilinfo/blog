@extends('front.template.backend')
@section('content')
    <h1>Modification du profil</h1>
            <div class="panel-body">
                <div class="col-sm-12">


                    {!! Form::model($user, ['route' => ['user.profile_update'], 'method' => 'put', 'class' => 'form-horizontal panel', 'files' => true]) !!}
                    <div class="form-group">
                        <label class="col-md-2 control-label">Pseudo</label>
                        <div class="col-md-6">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-6">
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Avatar</label>
                        <div class="col-md-6">
                            @if($user->avatar)
                            <img class="img-circle" src="{{ url('/').'/img/avatars/'.Auth::user()->id.'.png' }}"/>
                            <br/> <br/>
                            @endif
                        {!! Form::file('avatar',  ['class' => 'btn btn-primary btn-file']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">{!! Form::checkbox('notify_me', '0', $user->notify_me, ['class'=>'pull-right']) !!}</div>
                        <label class="col-md-6">
                       Recevoir les nouvelles du blog par e-mail ?
                            </label>
                    </div>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary pull-right">
                                <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Sauvegarder
                            </button>
                        </div>
                    </div>
    <div class="clearfix"></div>
    <br/>
    <div class="form-group">
        <div class="col-md-2">
            <a href="javascript:history.back()" class="btn btn-primary pull-right">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
            </a>
        </div>
    </div>

                {!! Form::close() !!}





@endsection


