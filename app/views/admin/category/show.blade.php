@extends('admin.admin')

@section('photos')
    <h4>Redaguoti nuotraukos informaciją</h4>
    @foreach($category->photos as $photo)
        <div class="row">
             <img class="img-responsive img-thumbnail" src="{{ URL::to($photo->img) }}" width="250" height="auto" alt="Nuotrauka">
        </div>
    @endforeach
@stop