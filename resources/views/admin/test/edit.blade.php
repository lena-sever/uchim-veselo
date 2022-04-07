@extends('layouts.app')

@section('title', 'Редактировать тест')

@section('content')

@include('inc.message')
    <div class="col-md-9 col-lg-10 px-md-4">
        <form method="post" action="{{ route('admin.test.update',['test' => $test]) }}">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="course_id">История</label>
                <select disabled class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"
                        @if($course->id === $test->course_id) selected @endif>{{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="lesson_id">Глава</label>
                <select disabled class="form-control" id="lesson_id" name="lesson_id">
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}"
                        @if($lesson->id === $test->lesson_id) selected @endif>{{ $lesson->title }}</option>
                    @endforeach
                </select>
                @error('lesson_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="title">Наименование теста</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $test->title }}">
                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание теста</label>
                <textarea class="form-control" name="description" id="description">{!! $test->description !!}</textarea>
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="text">Задания теста</label>
                <textarea class="form-control" name="text" id="text">{!! $test->text !!}</textarea>
                @error('text') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.lesson.show', ['lesson' => $test->lesson_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>

@endsection

