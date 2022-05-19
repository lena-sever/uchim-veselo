@extends('layouts.app')

@section('title', 'Добавить Курс')

@section('content')

@include('inc.message')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.usercourse.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="user_id">ФИО</label>

                <input type="text" disabled class="form-control" id="name" name="name" value="{{ $user->name }}">

                @error('user_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="course_id">Комикс</label>
                <select class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"  @if($course->id == $painter_id) selected @endif> {{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
            <label style="margin-right: 15px;">Правильный ответ</label>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" value="answer_1" id="1" name="right_answer" checked>
                    <label class="btn btn-outline-primary" for="1">1</label>
                    <input type="radio" class="btn-check" value="answer_2" id="2" name="right_answer" >
                    <label class="btn btn-outline-primary" for="2">2</label>
                    <input type="radio" class="btn-check" value="answer_3" id="3" name="right_answer" >
                    <label class="btn btn-outline-primary" for="3">3</label>
                    <input type="radio" class="btn-check" value="answer_4" id="4" name="right_answer">
                    <label class="btn btn-outline-primary" for="4">4</label>
                    <input type="radio" class="btn-check" value="answer_5" id="5" name="right_answer">
                    <label class="btn btn-outline-primary" for="5">5</label>
                    @error('right_answer') <strong style="color:red;">{{ $message }}</strong> @enderror
                </div>
            </div>
            <br>
            <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
        </form>
        <a href="{{ route('admin.painter.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection

