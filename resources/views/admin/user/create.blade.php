@extends('layouts.app')

@section('title', 'Добавить пользователя')

@section('content')

@include('inc.message')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">ФИО</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" name="email" id="email" value="{!!old('email') !!}">
                @error('email') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label style="margin: 15px 15px 15px 0px;">Статус</label>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" value="1" id="1" name="is_admin" checked>
                    <label class="btn btn-outline-primary" for="1">Администратор</label>
                    <input type="radio" class="btn-check" value="0" id="0" name="is_admin" >
                    <label class="btn btn-outline-primary" for="0">Пользователь</label>
                    @error('is_admin') <strong style="color:red;">{{ $message }}</strong> @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="photo">Изображение</label>
                <img width="100" height="auto" src="{{old('photo') }}"> &nbsp;
                <input type="file" class="form-control" id="photo" name="photo" >
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input class="form-control" name="password" id="password" value="{!! old('password') !!}">
                @error('password') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <button type="submit"  value="Добавить" class="btn btn-success" style="float: right;">Добавить</button>
        </form>
        <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>
@endsection

