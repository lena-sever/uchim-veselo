@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')

@include('inc.message')
<div class="container">
<h1 class="h2">Список глав по истории: {{$course->title}}</h1>
<a href="{{ route('admin.course.index') }}" type="button" class="btn btn-sm btn-secondary">Назад</a> &nbsp;
  <a href="{{ route('admin.lesson.create') }}" type="button" class="btn btn-sm btn-secondary">Добавить урок</a>
  <div class="row">
    <div class="table-responsive">
  <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Главы</th>
                   <th>Описание</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
            @forelse($lessons as $lessonItem)
                <tr id="{{$lessonItem->id}}">
                    <td>{{ $lessonItem->id }}</td>
                    <td>{{ $lessonItem->title }}</td>
                    <td>{!! $lessonItem->description !!}</td>
                    <td>
                        <p class="btn-group">
                            <a class="btn btn-sm btn-secondary" href="{{ route('admin.lesson.show', ['lesson' => $lessonItem]) }}">ТЕСТЫ</a> &nbsp;
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.lesson.edit', ['lesson' => $lessonItem]) }}">Редактировать</a> &nbsp;
                            <a class="delete btn btn-sm btn-danger" href="{{ route('admin.lesson.destroy', ['lesson' => $lessonItem]) }}">Удалить</a>
                        </p>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>
        <h1 class="h2">Список отзывов </h1>
        <form method="post" action="{{route('admin.courseReview.store')}}">
        @csrf
            <div class="row g-3">
            <div class="col-12">
            <input hidden type="text" name="user_id" id="user_id" value="5"> <!--id пользователя потом из сессии зпрашивать надо: Auth::user()->name-->
              <input hidden type="text" name="course_id" id="course_id" value="{{$course->id}}">
              <label for="text" class="form-label">Напишите нам</label>
              <textarea type="text" class="form-control" name="text" id="text" placeholder="Ваш Отзыв" ></textarea>
              @error('text') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
          <button class="w-25 btn btn-primary btn-sm" type="submit">Отправить</button>
          <hr class="my-4">
        </form>
        <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Пользователь</th>
                   <th>Отзыв</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
            @forelse($reviews as $reviewItem)
                <tr id="{{$reviewItem->id}}">
                    <td>{{ $reviewItem->id }}</td>
                    <td>{{ $reviewItem->user_id }}</td>
                    <td>{!! $reviewItem->text !!}</td>
                    <td>
                        <p class="btn-group">
                            <a class="delete btn btn-sm btn-danger" href="{{ route('admin.review.destroy', ['courseReview' => $reviewItem]) }}">Удалить</a>
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






