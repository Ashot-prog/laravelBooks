@extends('layouts.layout')
@section('content')
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>remove</td>
            <td>change</td>
        </tr>
        @if(!empty($books))
        @foreach($books as $book)
            <tr>
                <td>
                    {{ $book->id }}
                </td>
                <td>
                    {{ $book->name }}
                </td>
                <td>
                    <form action="{{ route('book.destroy',['book' =>$book]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">remove</button>
                    </form>
                </td>
                <td>
                    <button class="btn btn-danger"><a style="color:black" href="{{ route('book.edit',['book' =>$book])}}">Edit</a></button>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $books->links() }}
@endif
    <button class="btn btn-success"><a href="{{ route('book.create') }}">Add Book</a></button>

