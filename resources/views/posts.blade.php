@extends('layouts.app')

@section('content')

    <h1>Список постов</h1><hr>

    @include('errors')

    <a href="{{ route('posts.create') }}" class="btn btn-success">Создать пост</a><hr>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Теги</th>
            <th>Картинка</th>
            <th>Действия</th>
            <th>Дата создания</th>
        </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post -> id }}</td>
                    <td>{{ $post -> title }}</td>
                    <td>{{ $post -> getTagsTitles() }}</td>
                    <td><img src="{{ $post -> getImage() }}" alt="" width="100"></td>
                    <td>
                        <a href="{{ route('posts.edit', $post -> id) }}" class="btn btn-success">Редактировать</a>
                        {{ Form::open(['route' => ['posts.destroy', $post -> id], 'method' => 'delete']) }}
                        <button type="submit" class="btn btn-danger">Удалить</button>
                        {{ Form::close() }}
                    </td>
                    <td>{{ $post -> created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>

    <a href="{{ route('tags.index') }}" class="btn btn-danger">Список тегов</a>

@endsection