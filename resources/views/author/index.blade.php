@extends('layouts.layout')
@section('content')
    @if(!empty($author))
        <table class="table table-bordered">

            <tr>
                <td>id</td>
                <td>title</td>
                <td>remove</td>
                <td>change</td>
            </tr>
            @foreach($author as $authors)
                <tr>
                    <td>
                        {{ $authors->id }}
                    </td>
                    <td>
                        <a href="{{ route('author.show',['author' => $authors]) }}">{{ $authors->name }}</a>
                    </td>
                    <td>
                        <form action="{{ route('author.destroy',['author' =>$authors]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">remove</button>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-danger" ><a style="color:black" href="{{ route('author.edit',['author' =>$authors])}}">Edit</a></button>
                    </td>
                </tr>
            @endforeach
        </table>
    {{ $author->links() }}

    @endif
    <button class="btn btn-success"><a href="{{ route('author.create') }}">Add Author</a></button>

    @if(Session::has('message'))
        <p class="text-success">{{ Session::get('message') }}</p>
    @endif
@endsection
