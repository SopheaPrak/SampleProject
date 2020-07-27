@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1 class="m-0 text-dark">Add New Sale Invoice</h1>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@stop

@section('content')
  <div class="container">
    <form action="/iv/store" enctype="multipart/form-data" method="post">
      @csrf

      <div class="row">
        <div class="col-8 offset-2">
          <div class="form-group row">
            <label for="invoice_number" class="col-md-4 col-form-label">Invoice Number</label>

            <input id="invoice_number"
              type="text"
              class="form-control{{ $errors->has('invoice_number') ? ' is-invalid' : '' }}"
              name="invoice_number"
              value="{{ old('invoice_number') }}"
              autocomplete="invoice_number" autofocus>

            @if ($errors->has('invoice_number'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('invoice_number') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group row">
            <label for="amount" class="col-md-4 col-form-label">Amount</label>

            <input id="amount"
              type="text"
              class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
              name="amount"
              value="{{ old('amount') }}"
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
              value="{{ old('currency') }}"
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

            <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
              <option value="AL">Alabama</option>
              <option value="WY">Wyoming</option>
            </select>

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
              value="{{ old('quantity') }}"
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

            <button class="btn btn-primary">Add Invoice</button>
          </div>

        </div>
      </div>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
    });
  </script>
@stop
