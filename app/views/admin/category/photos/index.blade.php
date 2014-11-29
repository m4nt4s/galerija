@extends('admin.admin')

@section('photos')

    <div class="row">
        <h4>Kategorijos <i>{{ $category->name }}</i> nuotraukos</h4>
        @if($category->photos->count() == 0)
            <p>Šioje kategorijoje nuotraukų šiuo metu nėra</p>
            <a href="{{ URL::route('admin.photos.create') }}">Pridėkite nuotraukų</a>
        @else
            @foreach($category->photos as $photo)
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div style="width: 300px; height: 350px; padding: 2%;">
                             <img src="{{ URL::to($photo->img) }}" style="width:100%; height: auto; overflow:hidden;" class="thumbnail img-responsive">
                             <a href="{{ URL::route('admin.category.photos.edit', [$category->id, $photo->id]) }}" class="btn btn-primary btn-xs" role="button">Redaguoti</a>
                             <a href="{{ URL::route('admin.category.photos.delete', $photo->id) }}" class="btn btn-default btn-xs" role="button">Trinti</a>
                        </div>
                    </div>
            @endforeach
        @endif
    </div>

@stop