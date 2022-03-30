@extends('layouts.app')

@section('title', 'Редактировать курс')

@section('content')

@include('inc.message')
    <div class="col-md-9 col-lg-10 px-md-4">
        <form method="post" action="{{ route('admin.course.update',['course' => $course]) }}">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="title">Наименование курса</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}">
                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Краткое описание курса</label>
                <textarea class="form-control" name="description" id="description">{!! $course->description !!}</textarea>
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="text">Полное описание курса</label>
                <textarea class="form-control" name="text" id="text">{!! $course->text !!}</textarea>
                @error('text') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <!--пока не работает-->
                <label for="image">Изображение</label>
                <img width="100" height="auto" src="{{ $course->img }}""> &nbsp;
                <button disabled name="_method" value="delete" class="delete btn btn-sm btn-outline-danger">X</button>
                <input type="file" class="form-control" id="image" name="image" >
            </div>
            <br>
            <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.course.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>

@endsection

