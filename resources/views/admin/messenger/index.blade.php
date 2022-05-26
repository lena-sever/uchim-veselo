@extends('layouts.app')

@section('title', 'Список сообщений от пользователей')

@section('content')

@include('inc.message')
<div class="container">
    @if(Auth::user()->is_admin)
        <h1 class="h2">Панель администратора</h1>
    @else
        <h1 class="h2">Ваши Сообщения</h1>
    @endif
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{ route('admin.index') }}"
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
                   <th>user_id</th>
                   <th>Имя</th>
                   <th>Email</th>
                   <th>Сообщение</th>
                   <th>Ответ</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
            @if(Auth::user()->is_admin)
              @forelse($messengers as $messengersItem)
                <tr id="{{$messengersItem->id}}">
                    <td>{{ $messengersItem->id }}</td>
                    <td>{{ $messengersItem->user_id }}</td>
                    <td>{{ $messengersItem->name }}</td>
                    <td>{{ $messengersItem->email }}</td>
                    <td>{!! $messengersItem->message !!}</td>
                    <td>
                        @if($messengersItem->answer == "Напишите ответ!")
                        <form action="{{route('admin.messenger.update',['messenger' => $messengersItem->id])}}" method="post">
                            @csrf
                            @method('put')
                            <input hidden type="text" name="user_id" id="user_id" value="{{ $messengersItem->user_id }}">
                            <input hidden type="text" name="name" id="name" value="{{ $messengersItem->name }}">
                            <input hidden type="text" name="email" id="email" value="{{ $messengersItem->email }}">
                            <input hidden type="text" name="message" id="message" value="{{ $messengersItem->message }}">
                            <input class="w-75" type="text" name="answer" id="answer" value="{!! $messengersItem->answer !!}">
                            <button type="submit" style="margin-left: 15px;" value="Ответить" class="btn btn-success" >Ответить</button>
                        </form>
                        @else
                            {!! $messengersItem->answer !!}
                        @endif
                    </td>
                    <td>
                        <a class="delete btn  btn-danger" href="{{route('admin.messenger.destroy',['messenger' => $messengersItem])}}">Удалить</a>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            @else

            @forelse($messengers as $messengersItem)
                @if(Auth::user()->id == $messengersItem->user_id)
                <tr id="{{$messengersItem->id}}">
                    <td>{{ $messengersItem->id }}</td>
                    <td>{{ $messengersItem->user_id }}</td>
                    <td>{{ $messengersItem->email }}</td>
                    <td>{!! $messengersItem->message !!}</td>
                    <td>@if($messengersItem->answer == "Напишите ответ!") @else {!! $messengersItem->answer !!} @endif</td>
                    <td>
                        <a class="delete btn  btn-danger" href="{{route('admin.messenger.destroy',['messenger' => $messengersItem])}}">Удалить</a>
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


