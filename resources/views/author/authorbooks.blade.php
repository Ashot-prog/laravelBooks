@extends('layouts.layout')
@section('content')
    <table class="table table-bordered">
        <tr>
            <td>id</td>
            <td>title</td>
        </tr>
        @foreach($books as $key => $value)
            <tr>
                <td>
                    {{ $value }}
                </td>
                <td>
                    {{ $key }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
