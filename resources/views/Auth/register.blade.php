@extends('layout')


@section('title')
Registeration
@endsection


@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error )
<div class="alert bg-danger">{{ $error }}</div>
@endforeach

@endif
<form action="{{route("register")}}" method="POST">
    @csrf
    <input type="text" name="name" id="" placeholder="Enter Name" value="{{ old('name')}}">
    <input type="email" name="email" id="" placeholder="Enter Email" value="{{ old('email')}}">
    <input type="password" name="password" id="" placeholder="Enter Password">
    <input type="password" name="password_confirmation" id="" placeholder="Re-Enter Password ">
    <button type="submit" name="register" class="btn btn-primary">Register</button>

</form>
@endsection
