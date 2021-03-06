@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
  <h1 class="m-0 text-dark">Add Customer</h1>
@stop

@section('content')
  <div class="container">
    <form action="/ct/store" enctype="multipart/form-data" method="post">
      @csrf

      <div class="row">
        <div class="col-8 offset-2">
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Name</label>

            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

            @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label">Email</label>

            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autocomplete="email">

            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>

          <button class="btn btn-primary mb-4">Add Customer</button>
        </div>
      </div>
    </form>
  </div>
@stop
