@extends('layout')

@section('content')

	@if(Session::has('success'))
	    <div class="alert alert-dismissable alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('success') }}
        </div>
	@endif

	@if (Auth::check())
        <div class="col-sm-3 col-md-3 col-lg-3">
            <h4><a style='color: #333333; text-decoration: none;' href="{{ URL::route('account') }}">{{ Auth::user()->username; }} menu</a></h4>
            <ul class="nav nav-pills nav-stacked">
                <li {{ Request::path() == 'user/account' ? 'class="active"' : '' }}            ><a href="{{ URL::route('account')  }}">Informacija</a></li>
                <li {{ Request::path() == 'user/change-password' ? 'class="active"' : '' }}    ><a href="{{ URL::route('change-pass')  }}">Pakeisti slaptažodį</a></li>
                <li {{ Request::path() == 'user/change-email' ? 'class="active"' : '' }}       ><a href="{{ URL::route('change-email')  }}">Pakeisti el. paštą</a></li>
                <li {{ Request::path() == 'user/change-information' ? 'class="active"' : '' }} ><a href="{{ URL::route('change-info')  }}">Pasikeisti informaciją</a></li>
            </ul>
        </div>
        <hr>
        <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12">
            @if(Request::path() != 'user/account')
                @yield('account')
                <hr>
                <a href="{{ URL::previous() }}" class="btn btn-default" role="button">Atgal</a>
            @else
                <div class="table-responsive">
                   <table class="table table-striped table-hover">
                    <tbody>
                       <tr class="sucess">
                         <td><strong>Vardas</strong></td>
                         <td>{{ Auth::user()->name  }}</td>
                       </tr>
                        <tr>
                         <td><strong>Pavardė</strong></td>
                         <td>{{ Auth::user()->surname  }}</td>
                       </tr>
                        <tr class="sucess">
                         <td><strong>Slapyvardis</strong></td>
                         <td>{{ Auth::user()->username  }}</td>
                       </tr>
                        <tr>
                         <td><strong>El. paštas</strong></td>
                         <td>{{ Auth::user()->email  }}</td>
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
                        <tr class="sucess">
                         <td><strong>Užsiregistravo</strong></td>
                         <td>{{ substr(Auth::user()->created_at, 0, 10)  }}</td>
                       </tr>
                     </tbody>
                   </table>
               </div>
            @endif
        </div>
 	@endif
@stop