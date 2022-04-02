@extends('layouts.app')

@section('title', 'Тест')

@section('content')
<div class="container">
<h1 class="h2">Список тестов по уроку: {{$lesson->title}}</h1>
<div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{ route('admin.test.create') }}"
               type="button" class="btn btn-secondary">Добавить тест
            </a>
        </div>
    </div>
  <div class="row">
  <div class="table-responsive">
  <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Название</th>
                   <th>Описание</th>
                   <th>Вопросы</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
            @forelse($tests as $testsItem)
                <tr id="{{$testsItem->id}}">
                    <td>{{ $testsItem->id }}</td>
                    <td>{{ $testsItem->title }}</td>
                    <td>{{ $testsItem->questions }}</td>
                    <td>{!! $testsItem->description !!}</td>
                    <td>
                        <p class="btn-group">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.test.edit', ['test' => $testsItem]) }}">Редактировать</a> &nbsp;
                            <a class="delete btn btn-sm btn-danger" href="{{ route('admin.test.destroy', ['test' => $testsItem]) }}">Удалить</a>
                        </p>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>

  </div>
  <hr>
</div>
@endsection
