@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1 class="m-0 text-dark">Category</h1>
@stop

@section('content')
  <div class="float-right mb-4">
    <a class="btn btn-success" href="c/create">Create New Category</a>
  </div>
  
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Status</th>
      <th width="280px">Action</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td>{{ $category->name }}</td>
      <td>{{ $category->description }}</td>
      <td>
        @if($category->enabled == 1)
          <p class="text-success">Enabled</p>
        @else
          <p class="text-danger">Disabled</p>
        @endif
      </td>
      <td>
        <form action="c/{{ $category->id }}/delete" method="POST">
          <a class="btn btn-primary" href="c/{{ $category->id }}/edit">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
@stop
