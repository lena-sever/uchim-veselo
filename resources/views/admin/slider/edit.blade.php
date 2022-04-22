@extends('layouts.app')

@section('title', 'Редактировать главу')

@section('content')

@include('inc.message')
    <div class="col-md-9 col-lg-10 px-md-4">
        <form method="post" action="{{ route('admin.slider.update',['slider' => $slider]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="lesson_id">Глава</label>
                <input type="text" hidden class="form-control" id="lesson_id" name="lesson_id" value="{{ $slider->lesson_id }}">
                <input type="text" disabled class="form-control" id="lesson_title" name="lesson_title" value="{{ $lesson_title }}">
                @error('lesson_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="text">Текст</label>
                <input type="text" class="form-control" id="text" name="text" value="{{ $slider->text }}">
                @error('text') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="img">Изображение</label>
                <img width="100" height="auto" src="{{ $slider->img }}"> &nbsp;
                <button name="_method" disabled value="delete" class="delete btn btn-sm btn-outline-danger">X</button>
                <input type="file" class="form-control" id="img" name="img" >
            </div>
            <div class="form-group">
                <label for="music">Аудио</label>
                <audio controls src=""><source src="{{ $slider->music }}"></audio>&nbsp;
                <button name="_method" value="delete" disabled class="delete btn btn-sm btn-outline-danger">X</button>
                <input type="file" class="form-control" id="music" name="music" >
            </div>
            <br>
            <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.lesson.show', ['lesson' =>  $slider->lesson_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>

@endsection

