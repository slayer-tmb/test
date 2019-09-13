@extends('layouts.app')

@section('content')

    <h1>Редактируем пост</h1><hr>

    {{ Form::open([
        'route' => ['posts.update', $post -> id],
        'files' => true,
        'method' => 'put'
    ]) }}

    <div class="box">

        @include('errors')

        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title-input">Название</label>
                    <input type="text" class="form-control" id="title-input" name="title" value="{{ $post -> title }}">
                </div>

                <div class="form-group">
                    <label>Лицевая картинка</label><br>
                    <img src="{{ $post -> getImage() }}" alt="" class="img-responsive" width="200"><br>
                    <input type="file" id="exampleInputFile" name="image">
                </div>

                <div class="form-group">
                    <label>Теги</label>
                    {{ Form::select('tags[]',
                        $tags,
                        $selectedTags,
                        ['class' => 'select2 form-control', 'multiple' => 'multiple', 'data-placeholder' => 'Выберите теги']) }}
                </div>

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="content-area">Полный текст</label>
                    <textarea name="content" id="content-area" cols="30" rows="10" class="form-control">{{ $post -> content }}</textarea>
                </div>
            </div>
        </div>
        <hr>
        <div class="box-footer">
            <a href="{{ route('posts.index') }}" class="btn btn-danger">Назад</a>
            <button class="btn btn-success pull-right">Изменить</button>
        </div>
    </div>

    {{ Form::close() }}

@endsection