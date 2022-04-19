@extends('layouts.app')

@section('title', 'Добавить тест')

@section('content')

@include('inc.message')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.test.store') }}">
        @csrf
            <div class="form-group">
                <label for="course_id">История</label>
                <select disabled class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" @if($course->id == $course_id) selected @endif> {{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="lesson_id">Глава</label>
                <select disabled class="form-control" id="lesson_id" name="lesson_id">
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}" @if($lesson->id == $lesson_id) selected @endif> {{ $lesson->title }}</option>
                    @endforeach
                </select>
                @error('lesson_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="test_type_id">Тип</label>
                <select class="form-control" id="test_type_id" name="test_type_id">
                @foreach ($options as $value)
                    <option value="{{ $value }}" @if($value == 1) selected @endif>{{ $value }}</option>
                @endforeach
                </select>
                @error('test_type_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="test_title">Наименование теста</label>
                <input type="text" class="form-control" id="test_title" name="test_title" value="{{ old('test_title') }}">
                @error('test_title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="word">Слово</label>
                <input type="text" class="form-control" id="word" name="word" value="{{ old('word') }}">
                @error('word') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание Слова</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_1">Вопрос №1</label>
                <textarea class="form-control" name="answer_1" id="answer_1">{!! old('answer_1') !!}</textarea>
                @error('answer_1') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_2">Вопрос №2</label>
                <textarea class="form-control" name="answer_2" id="answer_2">{!! old('answer_2') !!}</textarea>
                @error('answer_2') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_3">Вопрос №3</label>
                <textarea class="form-control" name="answer_3" id="answer_3">{!! old('answer_3') !!}</textarea>
                @error('answer_3') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_4">Вопрос №4</label>
                <textarea class="form-control" name="answer_4" id="answer_4">{!! old('answer_4') !!}</textarea>
                @error('answer_4') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_5">Вопрос №5</label>
                <textarea class="form-control" name="answer_5" id="answer_5">{!! old('answer_5') !!}</textarea>
                @error('answer_5') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="right_answer">Правильный ответ</label>
                <textarea class="form-control" name="right_answer" id="right_answer">{!! old('right_answer') !!}</textarea>
                @error('right_answer') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <br>
            <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
        </form>
        <a href="{{ route('admin.test.index', ['lesson' => $lesson_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection

