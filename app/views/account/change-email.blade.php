@extends('account.dash')

@section('account')

    <div class="row">
        <div class="col-xs-10 col-sm-8 col-md-5 col-lg-5">
            <h4>Pakeisti el. paštą</h4>
            @if(Session::get('errors'))
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5>Įvyko keletas klaidelių:</h5>
                  @foreach($errors->all('<li>:message</li>') as $message)
                    {{ $message }}
                  @endforeach
                </div>
            @endif
            {{ Form::open(array('route' => 'change-email', 'method' => 'post')) }}
                <div class="form-group @if($errors->has('old_email')) {{ "has-error" }} @endif  ">
                    {{ Form::text('old_email', Input::old('old_email'), array('class'=>'form-control', 'placeholder' => 'Senas el. pašto adresas')) }}
                </div>
                <div class="form-group @if($errors->has('email')) {{ "has-error" }} @endif  ">
                    {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder' => 'Naujo el. pašto adresas')) }}
                </div>
                <div class="form-group @if($errors->has('email_confirm')) {{ "has-error" }} @endif  ">
                    {{ Form::text('email_confirm', Input::old('email_confirm'), array('class'=>'form-control', 'placeholder' => 'Naujo el. pašto adresas dar kartą')) }}
                </div>
                {{ Form::submit('Pakeisti el. pašto adresą', array('class'=>'btn btn-info')) }}
            {{ Form::close() }}
        </div>
    </div>

@stop