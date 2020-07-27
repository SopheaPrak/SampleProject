@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1 class="m-0 text-dark">Edit Category</h1>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@stop

@section('content')
<div class="container">
  <form action="/c/{{ $category->id }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')

    <div class="row">
      <div class="col-8 offset-2">
        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label">Name</label>

          <input id="name"
            type="text"
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            name="name"
            value="{{ old('name') ?? $category->name }}"
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
            value="{{ old('description') ?? $category->description }}"
            autocomplete="description" autofocus>

          @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('description') }}</strong>
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

          <button class="btn btn-primary">Update</button>
        </div>

      </div>
    </div>
  </form>
</div>
@stop
