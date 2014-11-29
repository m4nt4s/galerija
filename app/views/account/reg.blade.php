@extends('layout')

@section('content')

<div class="row centered-form">
  <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Prašome užsiregistruoti <small>Užtruksite nedaug</small></h3>
      </div>
      <div class="panel-body">

      
      @if(Session::get('errors'))
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5>Įvyko keletas klaidelių registruojantis:</h5>
          @foreach($errors->all('<li>:message</li>') as $message)
            {{$message}}
          @endforeach
        </div>
      @endif


        {{ Form::open() }}
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {{ Form::text('name', null, array('class'=>'form-control input-sm','placeholder'=>'Vardas')) }}
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {{ Form::text('surname', null, array('class'=>'form-control input-sm','placeholder'=>'Pavardė')) }}
              </div>
            </div>
          </div>
          <div class="form-group">
            {{ Form::text('username', null, array('class'=>'form-control input-sm','placeholder'=>'Slapyvardis')) }}
          </div>

          <div class="form-group">
            {{ Form::email('email', null, array('class'=>'form-control input-sm','placeholder'=>'El. pašto adresas')) }}
          </div>

          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {{ Form::password('password', array('class'=>'form-control input-sm','placeholder'=>'Slaptažodis')) }}
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {{ Form::password('password_confirmation', array('class'=>'form-control input-sm','placeholder'=>'Slaptažodis 2 kartą')) }}
              </div>
            </div>
          </div>

          {{ Form::submit('Registruotis', array('class'=>'btn btn-info btn-block')) }}

        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

@stop