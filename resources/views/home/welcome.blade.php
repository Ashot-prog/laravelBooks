@extends('layouts.layout')
@section('content')
<h1 align="center">
    Home
</h1>
<div  style="display:flex;justify-content:center">
    <button class="btn btn-success">
        <a href="{{ route('book.index') }}">Books</a>
    </button>
    <button class="btn btn-success" style="margin-left:10px">
        <a href="{{ route('author.index') }}">Authors</a>
    </button>
</div>


@endsection
