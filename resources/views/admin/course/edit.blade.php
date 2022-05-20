@extends('layouts.app')

@section('title', 'Редактировать комикс')

@section('content')

@include('inc.message')
    <div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.course.update',['course' => $course]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="title">Наименование комикса</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}">
                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="author_id">Автор</label>
                <select class="form-control" id="author_id" name="author_id">
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"
                        @if($author->id === $course->author_id) selected @endif>{{ $author->name }}</option>
                    @endforeach
                </select>
                @error('author_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="painter_id">Художник</label>
                <select class="form-control" id="painter_id" name="painter_id">
                    @foreach($painters as $painter)
                        <option value="{{ $painter->id }}"
                        @if($painter->id === $course->painter_id) selected @endif>{{ $painter->name }}</option>
                    @endforeach
                </select>
                @error('painter_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание комикса</label>
                <textarea class="form-control" name="description" id="description">{!! $course->description !!}</textarea>
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="price">Стоимость</label>
                <input class="form-control" name="price" id="price" value="{!! $course->price !!}">
                @error('price') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <img width="100" height="auto" src="{{ $course->img }}"> &nbsp;
                <button name="_method" value="delete" class="delete btn btn-sm btn-outline-danger">X</button>
                <input type="file" class="form-control" id="image" name="image" >
            </div>
            <br>
            <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.course.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>

@endsection
