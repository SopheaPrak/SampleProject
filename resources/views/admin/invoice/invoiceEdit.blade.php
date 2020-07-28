@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1 class="m-0 text-dark">Add New Sale Invoice</h1>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
@stop

@section('content')
  <div class="container">
    <form action="/iv/{{ $invoice->id }}" enctype="multipart/form-data" method="post">
      @csrf
      @method('PATCH')

      <div class="row">
        <div class="col-8 offset-2">
          <div class="form-group row">
            <label for="amount" class="col-md-4 col-form-label">Amount</label>

            <input id="amount"
              type="text"
              class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
              name="amount"
              value="{{ old('amount') ?? $invoice->amount }}"
              autocomplete="amount" autofocus>

            @if ($errors->has('amount'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('amount') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group row">
            <label for="currency" class="col-md-4 col-form-label">Currency</label>

            <input id="currency"
              type="text"
              class="form-control{{ $errors->has('currency') ? ' is-invalid' : '' }}"
              name="currency"
              value="{{ old('currency') ?? $invoice->currency }}"
              autocomplete="currency" autofocus>

            @if ($errors->has('currency'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('currency') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group row">
            <label for="customer_id" class="col-md-4 col-form-label">Customer</label>

            <select id="customer_id" name="customer_id" class="form-control">
              @foreach($customers as $customer_id)
                <option value="{{ $customer_id->id }}">{{ $customer_id->name }}</option>
              @endforeach
            </select>

            @if ($errors->has('customer_id'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('customer_id') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group row">
            <label for="item_id" class="col-md-4 col-form-label">Items</label>

            <select id="item_id" name="item_id[]" class="form-control js-example-basic-multiple" multiple="multiple">
              @foreach($items as $item_id)
                <option value="{{ $item_id->id }}">{{ $item_id->name }}</option>
              @endforeach
            </select>

            <script>
              $(document).ready(function() {
                  $('.js-example-basic-multiple').select2();
              });
            </script>

            @if ($errors->has('item_id'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('item_id') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group row">
            <label for="quantity" class="col-md-4 col-form-label">Quantity</label>

            <input id="quantity"
              type="text"
              class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}"
              name="quantity"
              value="{{ old('quantity') ?? $invoice->quantity }}"
              autocomplete="quantity" autofocus>

            @if ($errors->has('quantity'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('quantity') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label">Price</label>

            <input id="price"
              type="text"
              class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
              name="price"
              value="{{ old('price') }}"
              autocomplete="price" autofocus>

            @if ($errors->has('price'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('price') }}</strong>
              </span>
            @endif
          </div>

            <button class="btn btn-primary mb-4">Update</button>
          </div>

        </div>
      </div>
    </form>
  </div>
@stop
