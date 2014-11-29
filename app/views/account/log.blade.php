@extends('layout')

@section('content')

  <div class="row centered-form">
    @if(Session::has('success'))
      <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
          {{ Session::get('success') }}
      </div>
    @endif
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Prašome prisijungti</h3>
        </div>
        <div class="panel-body">
        @if(Session::get('errors'))
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5>Įvyko keletas klaidelių jungiantis:</h5>
            @foreach($errors->all('<li>:message</li>') as $message)
              {{ $message }}
            @endforeach
          </div>
        @endif
          {{ Form::open(array('url' => 'log', 'method' => 'post')) }}
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group @if($errors->has('email')) {{ "has-error" }} @endif  ">
                {{ Form::text('email', Input::old('email'), array('class'=>'form-control input-sm', 'placeholder' => 'El. pašto adresas')) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group @if($errors->has('password')) {{ "has-error" }} @endif">
                  {{ Form::password('password', array('class'=>'form-control input-sm','placeholder'=>'Slaptažodis')) }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="checkbox">
                  <label>
                    {{ Form::checkbox('remember', 'value'); }} Prisiminti mane
                  </label>
                </div>
              </div>
            </div>
            {{ Form::submit('Prašome prisijungti', array('class'=>'btn btn-info btn-block')) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

@stop