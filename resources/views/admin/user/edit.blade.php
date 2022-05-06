@extends('layouts.app')

@section('title', 'Редактировать профиль')

@section('content')

@include('inc.message')
    <div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
        <form method="post" action="{{ route('admin.user.update',['user' => $user]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
                <label for="name">ФИО</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" name="email" id="email" value="{!!$user->email !!}">
                @error('email') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label style="margin: 15px 15px 15px 0px;">Статус</label>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" value="1" id="1" name="is_admin" @if($user->is_admin == '1') checked @endif>
                    <label class="btn btn-outline-primary" for="1">Администратор</label>
                    <input type="radio" class="btn-check" value="0" id="0" name="is_admin" @if($user->is_admin == '0') checked @endif>
                    <label class="btn btn-outline-primary" for="0">Пользователь</label>
                    @error('is_admin') <strong style="color:red;">{{ $message }}</strong> @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="photo">Изображение</label>
                @if($user->photo)
                @if(substr($user->photo,1,3) == 'svg')
                    &nbsp;{!! $user->photo !!} &nbsp;
                @else
                    <img style="width: 100px;" src="{{ $user->photo }}" alt="Фото">&nbsp;
                @endif
                <button name="_method" value="delete" class="delete btn btn-sm btn-outline-danger">X</button>
                @endif
                <input type="file" class="form-control" id="photo" name="photo" >
            </div>

            <br>
            <button type="submit"  value="Изменить" class="btn btn-success" style="float: right;">Изменить</button>
        </form>
        <a href="{{ route('admin.user.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
        Назад</a>
    </div>

@endsection
