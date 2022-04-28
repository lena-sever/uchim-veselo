@extends('layouts.app')

@section('title', 'Список комикс')

@section('content')

@include('inc.message')
<div class="container">
  <h1 class="h2">Панель администратора</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="{{ route('admin.course.create') }}" type="button" class="btn btn-sm btn-secondary">Добавить комикса
      </a>
    </div> 
  </div><br>
  <div class="row">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Заголовок</th>
            <th>Изображение</th>
            <th>Описание</th>
            <th>Опции</th>
          </tr>
        </thead>
        <tbody>
          @forelse($courses as $coursesItem)
          <tr id="{{$coursesItem->id}}">
            <td>{{ $coursesItem->id }}</td>
            <td>{{ $coursesItem->title }}</td>
            <td><img src="{{$coursesItem->img}}" width="100" height="100" alt="" class="cart-img-top"></td>
            <td>{!! $coursesItem->description !!}</td>
            <td>
              <p class="btn-group">
                <a class="btn btn-secondary" href="{{ route('admin.course.show', ['course' => $coursesItem->id]) }}" role="button">Подробнее</a>&nbsp;
                <a class="btn  btn-primary" href="{{ route('admin.course.edit', ['course' => $coursesItem]) }}">Редактировать</a> &nbsp;
                <a class="delete btn  btn-danger" href="{{ route('admin.course.destroy', ['course' => $coursesItem]) }}">Удалить</a>
              </p>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6">Записей нет</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <hr class="my-4">
  <div class="px-3">
    <form method="post" action="{{route('admin.messenger.store')}}">
      @csrf
      <div class="row g-3">
        <div class="col-sm-6">
          <input hidden @if(Auth::user()) value="{{Auth::user()->id}}" @else value="" @endif name="user_id" id="user_id" type="text">
          <input hidden value="Напишите ответ!" name="answer" id="answer" type="text">
          <label for="name" class="form-label">Имя</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Ваше Имя" @if(Auth::user()) value="{{Auth::user()->name}}" @else value="" @endif>
          @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror
        </div>

        <div class="col-sm-6">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Ваша Почта" @if(Auth::user()) value="{{Auth::user()->email}}" @else value="" @endif>
          @error('email') <strong style="color:red;">{{ $message }}</strong> @enderror
        </div>

        <div class="col-12">
          <label for="message" class="form-label">Ваше Сообщение</label>
          <textarea type="text" class="form-control" name="message" id="message" placeholder="Введите сообщение"></textarea>
          @error('message') <strong style="color:red;">{{ $message }}</strong> @enderror
        </div>

        <button class="w-25 btn btn-primary btn-lg" type="submit">Отправить</button>
    </form>


  </div>
</div>
@endsection