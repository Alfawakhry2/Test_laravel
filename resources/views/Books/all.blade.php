@extends('layout')

@section('title')
    all Books
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="container">
            <div class="row">
                <div class="col-3 alert bg-primary text-center">{{ session()->get('success') }}</div>
            </div>
        </div>
    @endif
    <a href="{{ url('book/create') }}">Create Book</a> <br>
    @foreach ($books as $book)
        {{ $loop->iteration }} -
        <a href="{{ url("books/show/$book->id") }}">{{ $book->name }}</a> <br>
        {{ $book->desc }} <br>
        <img src="{{ asset("storage/$book->image") }}" alt="img">
        <hr>
    @endforeach
    <div class="container">
        <div class="row">
            <div class="col">{{$books->links()}}</div>
        </div>
    </div>
@endsection
