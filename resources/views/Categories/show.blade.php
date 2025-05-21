@extends('layout')



@section('title')
show category
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

{{ $category->name }} <br>
{{ $category->desc }} <br>


@if ($category->books->count() > 0)
<ul>
    @foreach ($category->books as $book )
   <li> <a href="{{ url("books/show/$book->id") }}">{{$book->name}}</a>
        <ul>
            <li>{{$book->user->name}}</li>
        </ul>
    </li>
    @endforeach
    </ul>
@else
<h6 class="text-danger">This Category Not has any books Yet</h6>
@endif





<img src="{{ asset("storage/$category->image") }}" alt="">

<br>
<a href="{{ url("edit/$category->id") }}" class="btn btn-primary">Update</a>
<br> <br>
<form action="{{ url("categories/delete/$category->id") }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
@endsection


