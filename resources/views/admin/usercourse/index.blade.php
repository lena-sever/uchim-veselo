@extends('layouts.app')

@section('title', 'Данные пользователя')

@section('content')

@include('inc.message')
<div class="container">
<h1 class="h2">Список комиксов пользователя: {{$user->name}}</h1>
<div style="margin-bottom: 15px;" class="p">
<a href="{{ route('admin.user.index') }}" type="button" class="btn btn-sm btn-secondary">Назад</a> &nbsp;
<a href="{{ route('admin.usercourse.create') }}" type="button" class="btn btn-sm btn-secondary">Добавить Курс (оплаченный)</a>
</div>
  <div class="row">
    <div class="table-responsive">
  <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Курс</th>
                <th>Стоимость</th>
                <th>Опции</th>
                </tr>
            @forelse($user_course as $courseItem)
                <tr id="{{$courseItem->id}}">
                    <td>{{ $courseItem->id }}</td>
                    <td>
                        {{ $courseItem->course_id }}
                    </td>
                    <td>{!! $courseItem->price !!}</td>
                    <td>
                        <p class="btn-group">
                            <a  disable class="delete btn btn-sm btn-danger" href="{{route('admin.usercourse.destroy',['userCourse' => $courseItem])}}">Удалить</a>
                        </p>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>
<hr>
</div>
  </div>
@endsection

