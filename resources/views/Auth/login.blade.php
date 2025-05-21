@extends('layout')


@section('title')
    Login Form
@endsection


@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert bg-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <input type="email" name="email" id="" placeholder="Enter Your Email" value="{{ old('email') }}">
        <input type="password" name="password" id="" placeholder="Enter Your Password">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
    <a href="{{ url('forget-password') }}">Forget Password</a>
@endsection
