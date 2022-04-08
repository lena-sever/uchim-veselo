@extends('layouts.app')

@section('title', 'Список сообщений от пользователей')

@section('content')

@include('inc.message')
<div class="container">
<h1 class="h2">Панель администратора</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{ route('account') }}"
               type="button" class="btn btn-sm btn-secondary">Назад
            </a>
        </div>
    </div>
  <div class="row">
    <div class="table-responsive">
  <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Имя</th>
                   <th>Email</th>
                   <th>Сообщение</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($messages as $messagesItem)
                <tr id="{{$messagesItem->id}}">
                    <td>{{ $messagesItem->id }}</td>
                    <td>{{ $messagesItem->name }}</td>
                    <td>{{ $messagesItem->email }}</td>
                    <td>{!! $messagesItem->message !!}</td>
                    <td>
                        <p class="btn-group">
                            <a class="btn  btn-primary" href="#">Ответить</a> &nbsp;
                            <a class="delete btn  btn-danger" href="#">Удалить</a>
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


