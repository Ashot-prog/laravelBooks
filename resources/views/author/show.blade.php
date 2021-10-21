@extends('layouts.layout')
@section('content')
<h1> Book Title : {{ $author->name }}</h1>
<h3>Authors</h3>
{{my_books($author)}}
</button>
@endsection
