@extends('layouts.app')

@section('title', 'Редактировать тест')

@section('content')

@include('inc.message')
    <div class="col-md-9 col-lg-10 px-md-4">
        <form method="post" action="{{ route('admin.test.update',['test' => $test]) }}">
        @csrf
        @method('put')
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
                <label for="test_type_id">Тип</label>
                <select class="form-control" id="test_type_id" name="test_type_id">
                @foreach ($options as $key => $value)
                    <option value="{{ $key }}"
                    @if ($key == $value)
                        selected="selected"
                    @endif
                    >{{ $value }}</option>
                @endforeach
                </select>
                @error('test_type_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="title">Наименование теста</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $test->test_title }}">
                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="word">Слово</label>
                <input type="text" class="form-control" id="word" name="word" value="{{ $test->word}}">
                @error('word') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание Слова</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $test->description}}">
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_1">Вопрос №1</label>
                <textarea class="form-control" name="answer_1" id="answer_1">{!! $test->answer_1 !!}</textarea>
                @error('answer_1') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_2">Вопрос №2</label>
                <textarea class="form-control" name="answer_2" id="answer_2">{!! $test->answer_2 !!}</textarea>
                @error('answer_2') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_3">Вопрос №3</label>
                <textarea class="form-control" name="answer_3" id="answer_3">{!! $test->answer_3 !!}</textarea>
                @error('answer_3') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_4">Вопрос №4</label>
                <textarea class="form-control" name="answer_4" id="answer_4">{!! $test->answer_4 !!}</textarea>
                @error('answer_4') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="answer_5">Вопрос №5</label>
                <textarea class="form-control" name="answer_5" id="answer_5">{!! $test->answer_5 !!}</textarea>
                @error('answer_5') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="right_answer">Правильный ответ</label>
                <textarea class="form-control" name="right_answer" id="right_answer">{!! $test->right_answer !!}</textarea>
                @error('right_answer') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.lesson.show', ['lesson' => $test->lesson_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>

@endsection


