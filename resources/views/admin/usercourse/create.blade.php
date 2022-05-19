@extends('layouts.app')

@section('title', 'Добавить Курс')

@section('content')

@include('inc.message')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.usercourse.store') }}">
        @csrf
            <div class="form-group">
                <label for="user_id">ФИО</label>
                @foreach($users as $user)
                    @if($user->id == $user_id)
                    <input type="text" hidden class="form-control" id="user_id" name="user_id" value="{{ $user->id }}">
                    <input type="text" disabled class="form-control"  value="{{ $user->name }}">
                    @endif
                @endforeach
                @error('user_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="course_id">Комикс</label>
                <select class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"> {{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="price">Стоимость</label>
                <input class="form-control" name="price" id="price" value="{!! old('price') !!}">
                @error('price') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
        </form>
        <a href="{{ route('admin.usercourse',['user' => $user_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection

