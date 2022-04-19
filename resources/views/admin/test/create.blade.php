@extends('layouts.app')

@section('title', 'Добавить тест')

@section('content')

@include('inc.message')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.lesson.store') }}">
        @csrf
            <div class="form-group">
                <label for="course_id">История</label>
                <select class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"  > {{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="lesson_id">Глава</label>
                <select class="form-control" id="lesson_id" name="lesson_id">
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}" @if($lesson->id == $lesson_id) selected @endif> {{ $lesson->title }}</option>
                    @endforeach
                </select>
                @error('lesson_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="test_step_id">Шаг</label>
                <select class="form-control" id="test_step_id" name="test_step_id">
                    @foreach($test_steps as $steps)
                        <option value="{{ $steps->id }}"  > {{ $steps->test_steps_title }}</option>
                    @endforeach
                </select>
                @error('test_step_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="test_type_id">Тип</label>
                <select class="form-control" id="test_type_id" name="test_type_id">
                    @foreach($test_type as $type)
                        <option value="{{ $type->id }}"  > {{ $type->test_type_title }}</option>
                    @endforeach
                </select>
                @error('test_type_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="title">Наименование теста</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('test_title') }}">
                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание теста</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="questions">Задания теста</label>
                <textarea class="form-control" name="questions" id="questions">{!! old('questions') !!}</textarea>
                @error('questions') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
        </form>
        <a href="{{ route('admin.lesson.show', ['lesson' => $lesson_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection


<?php
//dd($courses,$course->id,$course_id)
?>
