@extends('layouts.layout')
@section('content')
    <h1 align="center"> change Book</h1>
    <form action="{{ route('book.update',['book' => $book]) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" placeholder="name" value="{{ $book->name }}" class=" title form-control">
        <select name="authors[]" id="authors" class="authors form-control" multiple="multiple">
            @foreach($authors as $author)
                <option value="{{ $author->id }}"
                        @if(array_key_exists($author->name, $belongs))
                        selected="selected"
                    @endif
                >{{ $author->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-success cons" type="submit">Change Book</button>
    </form>
    <script>
        $('#authors').select2({});
    </script>
@endsection
