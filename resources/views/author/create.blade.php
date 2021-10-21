@extends('layouts.layout')
@section('content')
<h1>Add Author</h1>
<form action="{{ url('author') }}" method="post">
    @csrf
    <input type="text" name="name" class="form-control" placeholder="name">
    @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @endif
    <br>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@if(Session::has('message'))
    <p class="text-success">{{ Session::get('message') }}</p>
@endif
@endsection
