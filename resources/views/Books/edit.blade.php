@extends('layout')

@section('title')
edit Book details
@endsection




@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert bg-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{url("books/update/$book->id") }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name" class="" value="{{$book->name}}" placeholder="book name"> <br><br><br>
        <textarea name="desc" id="" cols="30" rows="10" placeholder="book desc">{{$book->desc}}</textarea>
        <input type="text" name="small_desc" class="" value="{{$book->small_desc}}"
            placeholder="book simple desc"> <br><br><br>
        <input type="number" name="price" class="" value="{{$book->price}}" placeholder="book price">
        <br><br><br>
        <select name="category_id" id="">
            @foreach ($data as $d)
            <option value="{{$d->id}}">{{$d->name}}</option>
            @endforeach
        </select>
        <br><br><br>
        <img src="{{asset("storage/$book->image")}}" alt="book image" >
        <input type="file" name="image" id="">

        <button type="submit" class="btn btn-danger">Update Book</button>
    </form>
@endsection
