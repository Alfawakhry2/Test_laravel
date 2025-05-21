@extends('layout')



@section('title')
show Book details
@endsection



@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            @if (session()->has('success'))
            <div class="alert bg-primary">{{session()->get('success')}}</div>
            @endif
        </div>
    </div>
</div>
<a href="{{ url("categories/show/ ").$book->category->id}}"> <h4>Category name : {{$book->category->name}}</h1></a>
<h5>Book Name : {{ $book->name }} </h5>
<h6>Book Name : {{ $book->desc }} </h6>



{{-- @if ($category->books->count() > 0)
<ul>
    @foreach ($category->books as $book )
    <li>{{$book->name}}
        <ul>
            <li>{{($book->user)->name}}</li>
        </ul>
    </li>
    @endforeach
    </ul>
@else
<h6 class="text-danger">This Category Not has any books Yet</h6>
@endif --}}





<img src="{{ asset("storage/$book->image") }}" alt="">

<br>
<a href="{{ url("book/edit/$book->id") }}" class="btn btn-primary">edit Book</a>
<br> <br>
<form action="{{url("books/delete/$book->id") }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Delete Book</button>
</form>
@endsection


