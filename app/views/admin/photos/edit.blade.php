@extends('admin.admin')

@section('photos')

    <div class="row">
        <div class="col-xs-10 col-sm-8 col-md-5 col-lg-5">
            <h4>Redaguoti nuotraukos informaciją</h4>
            {{ Form::open(array('route' => ['admin.photos.update', $photo->id], 'files' => true, 'method' => 'PUT')) }}
                @if(Session::get('errors'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5>Įvyko keletas klaidelių:</h5>
                        @foreach($errors->all('<li>:message</li>') as $message)
                            {{ $message }}
                        @endforeach
                    </div>
                @endif
                <img class="img-responsive img-thumbnail" src="{{ URL::to($photo->img) }}" width="250" height="auto" alt="Nuotrauka">
                <h5>Kategorijos</h5>
                @foreach($categories as $category)
                    <div class="checkbox">
                        <label>
                            @if($category->name == $photo->category->name)
                                {{ Form::radio('category', $category->id, true) }}  {{ $category->name }}
                            @else
                                {{ Form::radio('category', $category->id) }}  {{ $category->name }}
                            @endif
                        </label>
                    </div>
                @endforeach
                <h5>Nuotraukos pavadinimas</h5>
                <div class="form-group @if($errors->has('title')) {{ "has-error" }} @endif  ">
                    {{ Form::text('title', $photo->title,    array('class'=>'form-control', 'placeholder' => 'Nuotraukos pavadinimas')) }}
                </div>
                {{ Form::submit('Redaguoti nuotrauką', array('class'=>'btn btn-info')) }}
            {{ Form::close() }}
        </div>
    </div>

@stop