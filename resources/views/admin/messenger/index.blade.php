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
              @forelse($messenges as $messengesItem)
                <tr id="{{$messengesItem->id}}">
                    <td>{{ $messengesItem->id }}</td>
                    <td>{{ $messengesItem->user_id }}</td>
                    <td>{{ $messengesItem->email }}</td>
                    <td>{!! $messengesItem->message !!}</td>
                    <td>
                        @if($messengesItem->answer == "Напишите ответ!")
                        <form action="{{ route('admin.messenger.update',['messenger' => $messengesItem]) }}" method="post">
                            {{-- @dd($messengesItem) --}}
                            @csrf
                            @method('put')
                            <input hidden type="text" name="user_id" id="user_id" value="{{ $messengesItem->user_id }}">
                            <input hidden type="text" name="email" id="email" value="{{ $messengesItem->email }}">
                            <input hidden type="text" name="message" id="text" value="{{ $messengesItem->message }}">
                            <input class="w-75" type="text" name="answer" id="answer" value="{!! $messengesItem->answer !!}">
                            <button type="submit" style="margin-left: 15px;" value="Ответить" class="btn btn-success" >Ответить</button>
                        </form>
                        @else
                            {!! $messengesItem->answer !!}
                        @endif
                    </td>
                    <td>
                        <a class="delete btn  btn-danger" href="{{route('admin.messenger.destroy',['messenger' => $messengesItem->id])}}">Удалить</a>
                    </td>
                </tr>
              @empty
                  <tr><td colspan="6">Записей нет</td> </tr>
              @endforelse
            @else

            @forelse($messenges as $messengesItem)
                @if(Auth::user()->id == $messengesItem->user_id)
                <tr id="{{$messengesItem->id}}">
                    <td>{{ $messengesItem->id }}</td>
                    <td>{{ $messengesItem->user_id }}</td>
                    <td>{{ $messengesItem->email }}</td>
                    <td>{!! $messengesItem->message !!}</td>
                    <td>@if($messengesItem->answer == "Напишите ответ!") @else {!! $messengesItem->answer !!} @endif</td>
                    <td>
                        <a class="delete btn  btn-danger" href="{{route('admin.messenger.destroy',['messenger' => $messengesItem->id])}}">Удалить</a>
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


