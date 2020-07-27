@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1 class="m-0 text-dark">Item</h1>
@stop

@section('content')
  <div class="float-right mb-4">
    <a class="btn btn-success" href="i/create">Create New Item</a>
  </div>
  
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Category ID</th>
      <th>Sale Price</th>
      <th>Purchase Price</th>
      <th>Quantity</th>
      <th>Status</th>
      <th width="280px">Action</th>
    </tr>
    @foreach ($items as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->description }}</td>
      <td>{{ $item->category_id }}</td>
      <td>{{ $item->sale_price }}$</td>
      <td>{{ $item->purchase_price }}$</td>
      <td>{{ $item->quantity }}</td>
      <td>
        @if($item->enabled == 1)
          <p class="text-success">Enabled</p>
        @else
          <p class="text-danger">Disabled</p>
        @endif
      </td>
      <td>
        <form action="i/{{ $item->id }}/delete" method="POST">
          <a class="btn btn-primary" href="i/{{ $item->id }}/edit">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
@stop
