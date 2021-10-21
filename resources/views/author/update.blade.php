@extends('layouts.layout')
@section('content')
<h1 align="center">Change Author</h1>
<form action="{{ route('author.update',['author' => $author]) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="name" class="form-control" value="{{ $author->name }}">
    @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @endif
    <br>
    <button type="submit" class="btn btn-success">Change</button>
</form>
@if(Session::has('message'))
    <p class="text-success">{{ Session::get('message') }}</p>
@endif
@endsection
