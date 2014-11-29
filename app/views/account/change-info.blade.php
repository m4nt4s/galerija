@extends('account.dash')

@section('account')

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-5 col-lg-5">
            <h4>Informacija</h4>
            <div class="table-responsive">
                <table class="table table-striped table-hover ">
                    <tbody>
                        <tr>
                            <td><strong>Vardas</strong></td>
                            <td>{{ Auth::user()->name  }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pavardė</strong></td>
                            <td>{{ Auth::user()->surname  }}</td>
                        </tr>
                        <tr>
                            <td><strong>Slapyvardis</strong></td>
                            <td>{{ Auth::user()->username  }}</td>
                        </tr>
                        <tr>
                            <td><strong>Šalis</strong></td>
                            <td>{{ Auth::user()->country  }}</td>
                        </tr>
                        <tr>
                            <td><strong>Miestas</strong></td>
                            <td>{{ Auth::user()->city  }}</td>
                        </tr>
                        <tr>
                            <td><strong>Adresas</strong></td>
                            <td>{{ Auth::user()->address  }}</td>
                        </tr>
                        <tr>
                            <td><strong>Telefono numeris</strong></td>
                            <td>{{ Auth::user()->phone  }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-10 col-sm-8 col-md-5 col-lg-5">
            <h4>Atnaujinti informaciją</h4>
            @if(Session::get('errors'))
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5>Įvyko keletas klaidelių:</h5>
                  @foreach($errors->all('<li>:message</li>') as $message)
                    {{ $message }}
                  @endforeach
                </div>
            @endif
            {{ Form::open(array('route' => 'change-info', 'method' => 'post')) }}
                <strong>Vardas:</strong>
                    <div class="form-group @if($errors->has('name')) {{ "has-error" }} @endif  ">
                        {{ Form::text('name', Auth::user()->name, array('class'=>'form-control')) }}
                    </div>
                <strong>Pavardė:</strong>
                    <div class="form-group @if($errors->has('surname')) {{ "has-error" }} @endif  ">
                        {{ Form::text('surname', Auth::user()->surname, array('class'=>'form-control')) }}
                    </div>
                <strong>Slapyvardis:</strong>
                    <div class="form-group @if($errors->has('username')) {{ "has-error" }} @endif  ">
                        {{ Form::text('username', Auth::user()->username, array('class'=>'form-control')) }}
                    </div>
                <strong>Šalis:</strong>
                    <div class="form-group @if($errors->has('country')) {{ "has-error" }} @endif  ">
                        {{ Form::text('country', Auth::user()->country, array('class'=>'form-control')) }}
                    </div>
                <strong>Miestas:</strong>
                    <div class="form-group @if($errors->has('city')) {{ "has-error" }} @endif  ">
                        {{ Form::text('city', Auth::user()->city, array('class'=>'form-control')) }}
                    </div>
                <strong>Adresas:</strong>
                    <div class="form-group @if($errors->has('address')) {{ "has-error" }} @endif  ">
                        {{ Form::text('address', Auth::user()->address, array('class'=>'form-control')) }}
                    </div>
                <strong>Telefono numeris:</strong>
                    <div class="form-group @if($errors->has('phone')) {{ "has-error" }} @endif  ">
                        {{ Form::text('phone', Auth::user()->phone, array('class'=>'form-control')) }}
                    </div>
                {{ Form::submit('Atnaujinti informaciją', array('class'=>'btn btn-info')) }}
            {{ Form::close() }}
        </div>
    </div>

@stop