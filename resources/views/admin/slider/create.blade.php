@extends('layouts.app')

@section('title', 'Добавить слайд')

@section('content')

@include('inc.message')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="lesson_id">Глава</label>
                <select class="form-control" id="lesson_id" name="lesson_id">
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}"  @if($lesson->id == $lesson_id) selected @endif> {{ $lesson->title }}</option>
                    @endforeach
                </select>
                @error('lesson_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="text">Текст</label>
                <input type="text" class="form-control" id="text" name="text" value="{{ old('text') }}">
                @error('text') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="img">Изображение</label>
                <img width="100" height="auto" src="{{old('img') }}"> &nbsp;
                <input type="file" class="form-control" id="img" name="img" >
            </div>
            <div class="form-group">
                <label for="music">Аудио</label>
                <input type="file" class="form-control" id="music" name="music" >
            </div>
            <br>
            <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
        </form>
        <a href="{{ route('admin.lesson.show', ['lesson' => $lesson_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection


<?php
//dd($lessons,$lesson->id,$lesson_id)
?>
