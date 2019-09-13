@extends('layouts.app')

@section('content')

    @include('errors')

    <h1>Список тегов</h1><hr>

    <a href="{{ route('tags.create') }}" class="btn btn-success">Создать тег</a><hr>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag -> id }}</td>
                <td>{{ $tag -> title }}</td>
                <td>
                    {{ Form::open(['route' => ['tags.destroy', $tag -> id], 'method' => 'delete']) }}
                    <button type="submit" class="btn btn-danger">Удалить</button>
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <a href="{{ route('posts.index') }}" class="btn btn-success">Список постов</a>

@endsection