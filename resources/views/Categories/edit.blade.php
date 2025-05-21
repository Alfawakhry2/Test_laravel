@extends('layout')

@section('title')
edit page
@endsection




@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
           <div class="alert bg-danger">{{ $error }}</div>
        @endforeach
    @endif

    <form action="{{url("categories/update/$category->id") }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" class="" value="{{ $category->name }}"> <br><br><br>
        {{-- @error('name')
            {{ $message }}
        @enderror --}}
        <textarea name="desc" id="" cols="30" rows="10">{{ $category->desc }}</textarea>
        {{-- @error('desc')
           <div class="alert"> {{ $message }}</div>
        @enderror --}}
        <img src="{{asset("storage/$category->image")}}" alt="">
        <input type="file" name="image" id="" value="">
        <button type="submit" class="btn btn-danger">Update</button>
    </form>

@endsection

