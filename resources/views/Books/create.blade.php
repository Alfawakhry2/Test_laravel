@extends('layout')

@section('title')
    add Book
@endsection

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert bg-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ url('books') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" class="" value="{{ old('name') }}" placeholder="book name"> <br><br><br>
        <textarea name="desc" id="" cols="30" rows="10" placeholder="book desc">{{ old('desc') }}</textarea>
        <input type="text" name="small_desc" class="" value="{{ old('small_desc') }}"
            placeholder="book simple desc"> <br><br><br>
        <input type="number" name="price" class="" value="{{ old('price') }}" placeholder="book price">
        <br><br><br>
        <select name="category_id" id="">
            @foreach ($data as $d)
            <option value="{{$d->id}}">{{$d->name}}</option>
            @endforeach
        </select>
        <br><br><br>
        <input type="file" name="image" id="">

        <button type="submit" class="btn btn-danger">Add new Book</button>
    </form>
@endsection
