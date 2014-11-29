@extends('admin.admin')

@section('photos')

    <div class="row">
        <div class="col-xs-10 col-sm-8 col-md-5 col-lg-5">
            <h4>Sukurti kategoriją</h4>
            @if(Session::get('errors'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5>Įvyko keletas klaidelių:</h5>
                    @foreach($errors->all('<li>:message</li>') as $message)
                        {{ $message }}
                    @endforeach
                </div>
            @endif


            {{ Form::open(['route' => 'admin.category.store', 'method' => 'POST']) }}
                <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12">
                       <div class="form-group @if($errors->has('name')) {{ "has-error" }} @endif  ">
                           {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder' => 'Kategorijos pavadinimas')) }}
                       </div>
                   </div>
                </div>
                {{ Form::submit('Sukurti kategoriją', ['class'=>'btn btn-info']) }}
            {{ Form::close() }}
        </div>
    </div>

@stop