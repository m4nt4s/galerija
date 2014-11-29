@extends('layout')

@section('content')
<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nuotraukų galerija
                <small>Grafinės vartotojo sąsajos projektas</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <!-- Projects Row -->
    <div class="row">
       <nav class="navbar navbar-default" role="navigation">
               <div class="container group">
                   <div class="navbar-brand" href="#">Kategorijos -></div><br><br>
                   <ul class="nav navbar-nav navbar-left" id="controls">
                       @foreach($categories as $category)
                           <li><a href="#{{ $category->name }}">{{ $category->name }}</a></li>
                       @endforeach
                   </ul>
               </div>
       </nav>
    </div>
    <div class="row">
        <section id="main" class="container">
                @foreach($photos as $photo)
                    <div class="box {{ $photo->category->name }}">
                        <a class="fancybox" href="{{ URL::to($photo->img) }}" rel="{{ $photo->category->name }}" title="{{ $photo->title }}">
                            <img class="img-thumbnail" src="{{ URL::to($photo->img) }}" alt="" width="100%">
                        </a>
                    </div>
                @endforeach
        </section>
   </div>
</div>

@stop