@extends('admin.admin')

@section('photos')
    <div class="row">
        <div class="col-xs-10 col-sm-8 col-md-5 col-lg-5">
            {{ Form::open(array('route' => 'admin.photos.store', 'files' => true, 'method' => 'post')) }}
                <h4>Įkelti nuotrauką</h4>
                @if(Session::get('errors'))
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5>Įvyko keletas klaidelių:</h5>
                      @foreach($errors->all('<li>:message</li>') as $message)
                        {{ $message }}
                      @endforeach
                    </div>
                @endif
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img data-src="" src="http://www.olympiabruntal.cz/image/201408_53f9dbd5a5ef4_201408-53f736ac.png" alt="Nuotrauka">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 350px;"></div>
                    <div>
                        <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Pasirinkti</span>
                        <span class="fileinput-exists">Pakeisti</span>
                        <input type="file" name="photo"></span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Pašalinti</a>
                    </div>
                </div>
                <h5>Kategorijos</h5>
                    @foreach($categories as $category)
                        <div class="checkbox">
                            <label>
                                {{ Form::radio('category', $category->id) }} {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                    <div class="form-group @if($errors->has('title')) {{ "has-error" }} @endif  ">
                        {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder' => 'Nuotraukos pavadinimas')) }}
                    </div>
                {{ Form::submit('Įkelti nuotrauką', array('class'=>'btn btn-info')) }}
            {{ Form::close() }}
        </div>
    </div>
@stop