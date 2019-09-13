@extends('layouts.app')

@section('content')

    <h1>Добавляем тег</h1><hr>

    {{ Form::open(['route' => 'tags.store']) }}

    @include('errors')

    <div class="box-body">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tag-title">Название</label>
                <input type="text" class="form-control" id="tag-title" placeholder="" name="title">
            </div>
        </div>
    </div>
    <hr>
    <div>
        <a href="{{ route('tags.index') }}" class="btn btn-danger">Назад</a>
        <button class="btn btn-success pull-right">Добавить</button>
    </div>

    {{ Form::close() }}

@endsection