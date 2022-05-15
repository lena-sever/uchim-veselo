@extends('layouts.app')

@section('title', 'Редактировать профиль')

@section('content')

@include('inc.message')
    <div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.painter.update',['painter' => $painter]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
                <label for="name">ФИО</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $painter->name }}">
                @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="photo">Изображение</label>
                @if($painter->photo)
                @if(substr($painter->photo,1,3) == 'svg')
                    &nbsp;{!! $painter->photo !!} &nbsp;
                @else
                    <img style="width: 100px;" src="{{ $painter->photo }}" alt="Фото">&nbsp;
                @endif
                <button name="_method" value="delete" class="delete btn btn-sm btn-outline-danger">X</button>
                @endif
                <input type="file" class="form-control" id="photo" name="photo" >
            </div>
            @if($painter->courses == null)
            @else
            <div class="form-group">
                <label for="course_id">Комикс</label>
                <select disabled class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"
                        @if($course->painter_id === $painter->courses->id) selected @endif>{{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            @endif
            <br>
            <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.painter.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>

@endsection
