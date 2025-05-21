@extends('layout')

@section('title')
    all category
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="container">
            <div class="row">
                <div class="col-3 alert bg-primary text-center">{{ session()->get('success') }}</div>
            </div>
        </div>
    @endif
    <a href="{{ url('create') }}">Create Category</a> <br>
    @foreach ($categories as $c)
        {{ $loop->iteration }} -
        <a href="{{ url("categories/show/$c->id") }}">{{ $c->name }}</a> <br>
        {{ $c->desc }} <br>
        <img src="{{ asset("storage/$c->image") }}" alt="img">
        <hr>
    @endforeach
    <div class="container">
        <div class="row">
            <div class="col">{{$categories->links()}}</div>
        </div>
    </div>
@endsection
