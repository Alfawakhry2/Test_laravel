@extends('layout')

@section('title')
    add category
@endsection

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
           <div class="alert bg-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ url('categories') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" class="" value="{{ old("name") }}"> <br><br><br>
        {{-- @error('name')
            {{ $message }}
        @enderror --}}
        <textarea name="desc" id="" cols="30" rows="10">{{old('desc')}}</textarea>
        {{-- @error('desc')
           <div class="alert"> {{ $message }}</div> 
        @enderror --}}
        <input type="file" name="image" id="">
        <button type="submit" class="btn btn-danger">Add</button>
    </form>
@endsection
