@extends('layouts.app')

@section('title', 'Добавить пользователя')

@section('content')

@include('inc.message')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.painter.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">ФИО</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="photo">Изображение</label>
                <img width="100" height="auto" src="{{old('photo') }}"> &nbsp;
                <input type="file" class="form-control" id="photo" name="photo" >
            </div>
            <div class="form-group">
                <label for="course_id">Комикс</label>
                <select disabled class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"
                        @if($course->id === $painter->course_id) selected @endif>{{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
        </form>
        <a href="{{ route('admin.painter.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection

