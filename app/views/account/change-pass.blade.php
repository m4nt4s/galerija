@extends('account.dash')

@section('account')

    <div class="row">
        <div class="col-xs-10 col-sm-8 col-md-5 col-lg-5">
            <h4>Pakeisti slaptažodį</h4>
            @if(Session::get('errors'))
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5>Įvyko keletas klaidelių:</h5>
                  @foreach($errors->all('<li>:message</li>') as $message)
                    {{ $message }}
                  @endforeach
                </div>
            @endif
            {{ Form::open(array('route' => 'change-pass', 'method' => 'post')) }}
                <div class="form-group @if($errors->has('old_password')) {{ "has-error" }} @endif">
                    {{ Form::password('old_password', array('class'=>'form-control','placeholder'=>'Senas slaptažodis')) }}
                </div>
                <div class="form-group @if($errors->has('password')) {{ "has-error" }} @endif">
                    {{ Form::password('password', array('class'=>'form-control','placeholder'=>'Naujas slaptažodis')) }}
                </div>
                <div class="form-group @if($errors->has('password_confirm')) {{ "has-error" }} @endif">
                    {{ Form::password('password_confirm', array('class'=>'form-control','placeholder'=>'Naujas slaptažodis dar kartą')) }}
                </div>
                {{ Form::submit('Pakeisti slaptažodį', array('class'=>'btn btn-info')) }}
            {{ Form::close() }}
        </div>
    </div>

@stop