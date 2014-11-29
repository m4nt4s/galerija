@extends('admin.admin')

@section('photos')

    <h4>Visos kategorijos</h4>
    <div class="table-responsive">
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>#</th>
            <th>Kategorija</th>
            <th>Nuotraukų</th>
            <th>Redaguoti</th>
            <th>Trinti</th>
          </tr>
        </thead>
        <tbody>
        @foreach($categories as $ind => $category)
          <tr>
            <td>{{ $ind+1 }}</td>
            <td><a href="{{ URL::route('admin.category.show', $category->id) }}">{{ $category->name }}</a></td>
            <td>{{ count($category->photos) }}</td>
            <td><a class="btn" href="{{ URL::route('admin.category.show', array('id' => $category->id)) }}">Redaguoti</a></td>
            <td><a class="btn" href="{{ URL::route('admin.category.delete', array('id' => $category->id)) }}">Trinti</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

@stop