@extends('layouts.app')

@section('title', 'Список курсов')

@section('content')

@include('inc.message')
<div class="container">
<h1 class="h2">Панель администратора</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{ route('admin.lesson.create') }}"
               type="button" class="btn btn-sm btn-secondary">Добавить урок
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
                            <a class="btn btn-secondary" href="{{ route('lesson.show', ['lesson' => $lessonItem]) }}" role="button">Подробнее</a>&nbsp;
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.lesson.edit', ['lesson' => $lessonItem]) }}">Редактировать</a> &nbsp;
                            <button class="delete btn btn-sm btn-danger" rel="{{$lessonItem->id}}">Удалить</button>
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
<script>
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
             el.forEach(function (e, k) {
                 e.addEventListener('click', function() {
                const id = e.getAttribute("rel");
                if (confirm("Подтверждаете удаление записи с #ID =" + id + " ?")) {
                        send('/admin/lesson/' + id).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
</script>
@endsection






