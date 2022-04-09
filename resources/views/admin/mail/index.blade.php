@extends('layouts.app')

@section('title', 'Список сообщений от пользователей')

@section('content')

@include('inc.message')
<div class="container">
    @if(Auth::user()->is_admin)
        <h1 class="h2">Панель администратора</h1>
    @else
        <h1 class="h2">Ваша Почта</h1>
    @endif
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
                   <th>Ответ</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
            @if(Auth::user()->is_admin)
              @forelse($mail as $mailItem)
                <tr id="{{$mailItem->id}}">
                    <td>{{ $mailItem->id }}</td>
                    <td>{{ $mailItem->user_id }}</td>
                    <td>{{ $mailItem->email }}</td>
                    <td>{!! $mailItem->message !!}</td>
                    <td>
                        @if($mailItem->answer == "Напишите ответ!")
                        <form action="{{route('admin.mail.update',['mail' => $mailItem->id])}}" method="post">
                            @csrf
                            @method('put')
                            <input hidden type="text" name="user_id" id="user_id" value="{{ $mailItem->user_id }}">
                            <input hidden type="text" name="email" id="email" value="{{ $mailItem->email }}">
                            <input hidden type="text" name="message" id="text" value="{{ $mailItem->message }}">
                            <input class="w-75" type="text" name="answer" id="answer" value="{!! $mailItem->answer !!}">
                            <button type="submit" style="margin-left: 15px;" value="Ответить" class="btn btn-success" >Ответить</button>
                        </form>
                        @else
                            {!! $mailItem->answer !!}
                        @endif
                    </td>
                    <td>
                        <a class="delete btn  btn-danger" href="{{route('admin.mail.destroy',['mail' => $mailItem->id])}}">Удалить</a>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            @else

            @forelse($mail as $mailItem)
                @if(Auth::user()->id == $mailItem->user_id)
                <tr id="{{$mailItem->id}}">
                    <td>{{ $mailItem->id }}</td>
                    <td>{{ $mailItem->user_id }}</td>
                    <td>{{ $mailItem->email }}</td>
                    <td>{!! $mailItem->message !!}</td>
                    <td>@if($mailItem->answer == "Напишите ответ!") @else {!! $mailItem->answer !!} @endif</td>
                    <td>
                        <a class="delete btn  btn-danger" href="{{route('admin.mail.destroy',['mail' => $mailItem->id])}}">Удалить</a>
                    </td>
                </tr>
                @endif
            @empty
                <tr><td colspan="6">Записей нет</td> </tr>
            @endforelse

            @endif
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection


