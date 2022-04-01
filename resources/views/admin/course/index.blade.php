@extends('layouts.app')

@section('title', 'Список курсов')

@section('content')

@include('inc.message')
<div class="container">
<h1 class="h2">Панель администратора</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{ route('admin.course.create') }}"
               type="button" class="btn btn-sm btn-secondary">Добавить курс
            </a>
        </div>
    </div>
  <div class="row">
    <div class="table-responsive">
  <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Заголовок</th>
                   <th>Количество уроков</th>
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
                    <td></td>
                    <td><img src="{{$coursesItem->img}}" width="100" height="100" alt="" class="cart-img-top"></td>
                    <!--<td><img src="{{$coursesItem->img}}" width="100" height="100" alt="" class="cart-img-top"></td>
-->  <td>{!! $coursesItem->description !!}</td>
                    <td>
                        <p class="btn-group">
                            <a class="btn btn-secondary" href="{{ route('admin.course.show', ['course' => $coursesItem->id]) }}" role="button">Подробнее</a>&nbsp;
                            <a class="btn  btn-primary" href="{{ route('admin.course.edit', ['course' => $coursesItem]) }}">Редактировать</a> &nbsp;
                            <a class="delete btn  btn-danger" href="{{ route('admin.course.destroy', ['course' => $coursesItem]) }}">Удалить</a>
                        </p>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection


