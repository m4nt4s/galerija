@extends('admin.admin')

@section('photos')

<h4>Visos nuotraukos</h4>
<div class="row">
    @foreach($photos as $ind => $photo)
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div style="width: 300px; height: 350px; padding: 2%;">
                 <img src="{{ URL::to($photo->img) }}" style="width:100%; height: auto; overflow:hidden;" class="thumbnail img-responsive">
                 <a href="{{ URL::route('admin.photos.edit', array('id' => $photo->id)) }}" class="btn btn-primary btn-xs" role="button">Redaguoti</a>
                 <a href="{{ URL::route('admin.photos.delete', array('id' => $photo->id)) }}" class="btn btn-default btn-xs" role="button">Trinti</a>
            </div>
        </div>
    @endforeach
</div>

@stop