@extends('layouts.layout')
@section('content')
    <h1 align="center"> Add Book</h1>
    <form action="{{ route('book.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="title" class=" title form-control">
        <select name="authors[]" id="authors" class="authors form-control" multiple="multiple">
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-success cons" type="submit">Add Book</button>
    </form>




@endsection
@section('script')
    <script src="{{ asset('js/create-book.js') }}"></script>
@endsection

