<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Using a Blade layout</title>
        <!-- Bootstrap CSS served from a CDN -->
    <link href="//netdna.bootstrapcdn.com/bootswatch/3.1.0/readable/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    {{HTML::style('css/jquery.fancybox.css')}}
    {{HTML::style('css/style.css')}}



</head>
<body>
<div class="container">
    <div class="row">
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::route('home')}}">Galerija</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li {{Request::path() == '/' ? 'class="active"' : '';}}>
                        <a href="{{ URL::route('home')}}">Namai</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        @if(Auth::user()->admin)
                            <li {{Request::path() == 'admin' ? 'class="active"' : '';}}>
                                <a href="{{ URL::route('admin')}}">Administruoti</a>
                            </li>
                        @endif
                        <li {{Request::path() == 'user/account' ? 'class="active"' : '';}}>
                            <a href="{{ URL::route('account')}}">{{ Auth::user()->username }}</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('logout')}}">Atsijungti</a>
                        </li>
                    @else
                        <li {{Request::path() == 'log' ? 'class="active"' : '';}}>
                            <a href="{{ URL::to('log')}}">Prisijungti</a>
                        </li>
                        <li {{Request::path() == 'reg' ? 'class="active"' : '';}}>
                            <a href="{{ URL::to('reg')}}">Registruotis</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- Content -->
        {{--
                <hr>
        {{"Request path: ". Request::path()}}
        <hr> --}}
            @yield('content')
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

{{HTML::script('js/jquery.fancybox.js')}}
{{HTML::script('js/isotope.pkgd.min.js')}}
{{HTML::script('js/script.js')}}
</body>
</html>