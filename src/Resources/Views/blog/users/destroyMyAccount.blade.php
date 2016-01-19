@extends('front.template.backend')
@section('content')
    <h1>Supprimer mon compte</h1>
    <div class="panel-body">
        <div class="col-sm-12">
            {!! Form::open( ['route' => ['user.destroyMyAccount'], 'method' => 'post', 'id' => 'delete-form']) !!}


            <div class="form-group">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-danger" value='Supprimer mon compte'> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer mon compte</input>
                </div>

            {!! Form::close() !!}



        </div>
            <br/> <br/> <br/>
            <div class="form-group">
                <div class="col-md-2">
                    <a href="javascript:history.back()" class="btn btn-primary">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                    </a>
                </div>
            </div>

        </div>
    </div>







@endsection


@section('scripts')
    <script>
        $(document).on('submit', '#delete-form', function(){
            return confirm('Voulez vous vraiment supprimer votre compte ?');
        });
    </script>

   @stop