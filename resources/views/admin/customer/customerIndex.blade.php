@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1 class="m-0 text-dark">Customer</h1>
@stop

@section('content')
  <div class="float-right mb-4">
    <a class="btn btn-success" href="ct/create">Add Customer</a>
  </div>
  
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th width="280px">Action</th>
    </tr>
    @foreach ($customers as $customer)
    <tr>
      <td>{{ $customer->id }}</td>
      <td>{{ $customer->name }}</td>
      <td>{{ $customer->email }}</td>
      <td>
        <form action="ct/{{ $customer->id }}/delete" method="POST">
          <a class="btn btn-primary" href="ct/{{ $customer->id }}/edit">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
@stop
