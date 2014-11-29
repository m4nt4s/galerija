@extends('...layout')

@section('content')
	@if (Auth::check())
        <div class="container-fluid">
            admin
        </div>
 	@endif
@stop