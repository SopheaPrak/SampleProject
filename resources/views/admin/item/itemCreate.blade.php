@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1 class="m-0 text-dark">Add New Item</h1>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@stop

@section('content')
<div class="container">
  <form action="/i/store" enctype="multipart/form-data" method="post">
    @csrf

    <div class="row">
      <div class="col-8 offset-2">
        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label">Name</label>

          <input id="name"
            type="text"
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            name="name"
            value="{{ old('name') }}"
            autocomplete="name" autofocus>

          @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group row">
          <label for="description" class="col-md-4 col-form-label">Description</label>

          <input id="description"
            type="text"
            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
            name="description"
            value="{{ old('description') }}"
            autocomplete="description" autofocus>

          @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('description') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group row">
          <label for="category_id" class="col-md-4 col-form-label">Category</label>

          <select id="category_id" name="category_id" class="form-control">
            @foreach($categories as $category_id)
              <option value="{{ $category_id->id }}">{{ $category_id->name }}</option>
            @endforeach
          </select>

          @if ($errors->has('category_id'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('category_id') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group row">
          <label for="sale_price" class="col-md-4 col-form-label">Sale Price</label>

          <input id="sale_price"
            type="text"
            class="form-control{{ $errors->has('sale_price') ? ' is-invalid' : '' }}"
            name="sale_price"
            value="{{ old('sale_price') }}"
            autocomplete="sale_price" autofocus>

          @if ($errors->has('sale_price'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('sale_price') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group row">
          <label for="purchase_price" class="col-md-4 col-form-label">Purchase Price</label>

          <input id="purchase_price"
            type="text"
            class="form-control{{ $errors->has('purchase_price') ? ' is-invalid' : '' }}"
            name="purchase_price"
            value="{{ old('purchase_price') }}"
            autocomplete="purchase_price" autofocus>

          @if ($errors->has('purchase_price'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('purchase_price') }}</strong>
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

        <div class="form-group row justify-content-between">
          <input id="enabled"
            type="hidden"
            name="enabled"
            value="0">
          <input id="enabled"
            type="checkbox"
            name="enabled"
            data-onstyle="success"
            data-offstyle="danger"
            data-toggle="toggle"
            data-on="Enable"
            data-off="Disable"
            value="1">
          </input>

          <button class="btn btn-primary">Add Item</button>
        </div>

      </div>
    </div>
  </form>
</div>
@stop
