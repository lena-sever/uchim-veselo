@extends('layouts.app')

@section('title', 'Добавить курс')

@section('content')

@include('inc.message')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.course.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="title">Наименование курса</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="description">Краткое описание курса</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="text">Полное описание курса</label>
                <textarea class="form-control" name="text" id="text">{!! old('text') !!}</textarea>
                @error('text') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <img width="100" height="auto" src="{{old('img') }}"> &nbsp;
                <input type="file" class="form-control" id="image" name="image" >
            </div>
            <br>
            <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
        </form>
        <a href="{{ route('admin.course.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection

