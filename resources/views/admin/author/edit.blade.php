@extends('layouts.app')

@section('title', 'Редактировать профиль')

@section('content')

@include('inc.message')
    <div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.author.update',['author' => $author]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
                <label for="name">ФИО</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}">
                @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="photo">Изображение</label>
                @if($author->photo)
                @if(substr($author->photo,1,3) == 'svg')
                    &nbsp;{!! $author->photo !!} &nbsp;
                @else
                    <img style="width: 100px;" src="{{ $author->photo }}" alt="Фото">&nbsp;
                @endif
                <button name="_method" value="delete" class="delete btn btn-sm btn-outline-danger">X</button>
                @endif
                <input type="file" class="form-control" id="photo" name="photo" >
            </div>
            @if($author->courses == null)
            @else
            <div class="form-group">
                <label for="course_id">Комикс</label>
                <select disabled class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"
                        @if($course->author_id === $author->courses->id) selected @endif>{{ $course->title }}</option>
                    @endforeach
                </select>
                @error('course_id') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            @endif
            <br>
            <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.author.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>

@endsection
