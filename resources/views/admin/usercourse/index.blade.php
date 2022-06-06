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
                <th>Оплаченно</th>
                <th>Like</th>
                <th>Стоимость</th>
                <th>Опции</th>
                </tr>
            @forelse($user_course as $courseItem)
            @if($courseItem->payment == 1)
                <tr id="{{$courseItem->id}}">
                    <td>{{ $courseItem->id }}</td>
                    <td>
                        {{ $courseItem->title }}&nbsp;(ID: {{$courseItem->course_id}})
                    </td>
                    <td>
                        {{ $courseItem->payment }}
                    </td>
                    <td>
                        {{ $courseItem->like }}
                    </td>
                    <td>{!! $courseItem->price !!}</td>
                    <td>
                        <p class="btn-group">
                            <a  class="delete btn btn-sm btn-danger" href="{{route('admin.usercourse.destroy',['userCourse' => $courseItem])}}">Удалить</a>
                        </p>
                    </td>
                </tr>
                @endif
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>
        <hr><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Курс</th>
                <th>НЕ оплаченно</th>
                <th>Like</th>
                <th>Стоимость</th>
                <th>Опции</th>
                </tr>
            @forelse($user_course as $courseItem)
            @if($courseItem->payment == 0)
                <tr id="{{$courseItem->id}}">
                    <td>{{ $courseItem->id }}</td>
                    <td>
                        {{ $courseItem->title }}&nbsp;(ID: {{$courseItem->course_id}})
                    </td>
                    <td>
                        {{ $courseItem->payment }}

                    </td>
                    <td>
                        {{ $courseItem->like }}
                    </td>
                    <td>{!! $courseItem->price !!}</td>
                    <td>
                        <p class="btn-group">
                            <a  class="delete btn btn-sm btn-danger" href="{{route('admin.usercourse.destroy',['userCourse' => $courseItem])}}">Удалить</a>
                        </p>
                    </td>
                </tr>
                @endif
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            </tbody>
        </table>

</div>
  </div>
@endsection

