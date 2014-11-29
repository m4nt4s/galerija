@extends('...layout')

@section('content')

	@if(Session::has('success'))
	    <div class="alert alert-dismissable alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('success') }}
        </div>
	@endif

	@if (Auth::check())
        <div class="col-sm-3 col-md-3">
        <h4><a style='color: #333333; text-decoration: none;' href="{{ URL::route('admin') }}">Admin meniu</a></h4>
            <ul class="nav nav-pills nav-stacked">
                <li {{ preg_match('/[0-9]/', Request::path()) && preg_match('/photos/', Request::path()) && !preg_match('/category/', Request::path()) || Request::path() == 'admin/photos' ? 'class="active"' : '' }}>
                    <a href="{{ URL::route('admin.photos.index')  }}">Nuotraukos</a>
                </li>
                <li {{ Request::path() == 'admin/photos/create' ? 'class="active"' : '' }}>
                    <a href="{{ URL::route('admin.photos.create')  }}">Įkelti nuotrauką</a>
                </li>
                <li {{ preg_match('/[0-9]/', Request::path()) && preg_match('/category/', Request::path()) || Request::path() == 'admin/category' ? 'class="active"' : '' }}>
                    <a href="{{ URL::route('admin.category.index')  }}">Kategorijos</a>
                </li>
                <li {{ Request::path() == 'admin/category/create' ? 'class="active"' : '' }}>
                    <a href="{{ URL::route('admin.category.create')  }}">Sukurti kategoriją</a>
                </li>
            </ul>
        </div>
        <hr>
        <div class="col-sm-9 col-md-9 col-lg-9">
            @if(Request::path() != 'admin')
                @yield('photos')
                <hr>
                <a href="{{ URL::previous() }}" class="btn btn-default" role="button">Atgal</a>
            @else
                <div class="well"><h4>Sveiki atvykę</h4>
                    <p>Čia galite sukurti ar ištrinti kategorijas, o taip pat ir pridėti, trinti, redaguoti nuotraukas</p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">{{ count($categoriesAll)}}</span>
                            Kategorijų
                        </li>
                        <li class="list-group-item">
                            <span class="badge">{{ count($photosAll)}}</span>
                            Nuotraukų
                        </li>
                    </ul>
                </div>
            @endif
        </div>
 	@endif
@stop