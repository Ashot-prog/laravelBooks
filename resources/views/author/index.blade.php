@extends('layouts.layout')
@section('content')
    @if(!empty($authors))
        <table class="table table-bordered">

            <tr>
                <td>id</td>
                <td>title</td>
                <td>remove</td>
                <td>change</td>
            </tr>
            @foreach($authors as $author)
                <tr>
                    <td>
                        {{ $author->id }}
                    </td>
                    <td>
                        <a href="{{ route('author.show',['author' => $author]) }}">{{ $author->name }}</a>
                    </td>
                    <td>
                        <form action="{{ route('author.destroy',['author' =>$author]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">remove</button>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-danger"><a style="color:black"
                                                          href="{{ route('author.edit',['author' =>$author])}}">Edit</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $author->links() }}

    @endif
    <button class="btn btn-success"><a href="{{ route('author.create') }}">Add Author</a></button>

@endsection
