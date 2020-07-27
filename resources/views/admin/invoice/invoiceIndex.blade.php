@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1 class="m-0 text-dark">Sale Invoice</h1>
@stop

@section('content')
<div class="float-right mb-4">
    <a class="btn btn-success" href="iv/create">Create New Invoice</a>
  </div>
  
  <table class="table table-bordered">
    <tr>
      <th>Invoice Number</th>
      <th>Invoiced at</th>
      <th>Amount</th>
      <th>Currency</th>
      <th>Customer</th>
    </tr>
    @foreach ($invoices as $invoice)
    <tr>
      <td>{{ $invoice->invoice_number }}</td>
      <td>{{ $invoice->invoiced_at }}</td>
      <td>{{ $invoice->amount }}</td>
      <td>{{ $invoice->currency }}</td>
      <td>{{ $invoice->customer_id }}</td>
      <td>
        <form action="iv/{{ $invoice->id }}/delete" method="POST">
          <a class="btn btn-primary" href="">View</a>
          <a class="btn btn-primary" href="iv/{{ $invoice->id }}/edit">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
@stop
