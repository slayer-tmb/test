@extends('layouts.app')

@section('content')

    <div>
        <a href="{{ route('posts.index') }}" class="btn btn-success">Список постов</a>
        <a href="{{ route('tags.index') }}" class="btn btn-danger">Список тегов</a>
    </div>

@endsection