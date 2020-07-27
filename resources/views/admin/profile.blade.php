@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Profile</h1>
@stop

@section('content')
  <div class="container">
    <div class="row">
      <div class="h3 col-2"><strong>Name:</strong></div>
      <div class="h4 col-2 pt-1">{{ $user->name }}</div>
    </div>

    <div class="row">
      <div class="h3 col-2"><strong>Email:</strong></div>
      <div class="h4 col-2 pt-1">{{ $user->email }}</div>
    </div>
  </div>
@stop
