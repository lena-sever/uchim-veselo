@extends('layouts.app')

@section('title', 'Редактировать главу')

@section('content')

@include('inc.message')
    <div class="col-md-9 col-lg-10 px-md-4">
        <form method="post" action="{{ route('admin.lesson.update',['lesson' => $lesson]) }}">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="course_id">Комикс</label>
                <select disabled class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"
                        @if($course->id === $lesson->course_id) selected @endif>{{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="title">Наименование главы</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $lesson->title }}">
                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание главы</label>
                <textarea class="form-control" name="description" id="description">{!! $lesson->description !!}</textarea>
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.course.show', ['course' =>  $lesson->course_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>

@endsection

