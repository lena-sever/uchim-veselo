@extends('layouts.app')

@section('title', 'Список пользователей')

@section('content')

@include('inc.message')
<div class="container">
<h1 class="h2">Панель администратора</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="{{ route('admin.index') }}" type="button" class="btn btn-sm btn-secondary">Назад</a>&nbsp;
      <a href="{{ route('admin.user.create') }}" type="button" class="btn btn-sm btn-secondary">Добавить пользователя
      </a>
    </div>
  </div><br>
  <div class="row">
    <div class="table-responsive">
  <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Фото</th>
                   <th>Имя</th>
                   <th>Email</th>
                   <th>Права</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($users as $usersItem)
                <tr id="{{$usersItem->id}}">
                    <td>{{ $usersItem->id }}</td>
                    <td>
                        @if($usersItem->photo)
                            @if(substr($usersItem->photo,1,3) == 'svg')
                            {!! $usersItem->photo !!}
                            @else
                            <img style="width: 100px;" src="{{ $usersItem->photo }}" alt="{{ $usersItem->name }}">
                            @endif
                        @else
                        {!! Avatar::create($usersItem->name)->setBorder(1, '#dc3545', 10)->setDimension(85, 85)->toSvg() !!}
                        @endif
                    </td>
                    <td>{{ $usersItem->name }}</td>
                    <td>{{ $usersItem->email }}</td>
                    <td>
                        @if($usersItem->is_admin)
                            <b>Администратор</b><br>
                            <a class="btn btn-outline-secondary" href="{{route('admin.user.toggleAdmin',['user'=>$usersItem])}}">Снять Админа</a>&nbsp;
                        @else
                            Пользователь<br>
                            <a class="btn btn-outline-secondary" href="{{route('admin.user.toggleAdmin',['user'=>$usersItem])}}" >Назначить Админа</a>&nbsp;
                        @endif
                    </td>
                    <td>
                    <a class="btn  btn-secondary" href="{{ route('admin.usercourse', ['user' => $usersItem]) }}">Курсы</a> &nbsp;
                        <a class="btn  btn-primary" href="{{ route('admin.user.edit', ['user' => $usersItem]) }}">Редактировать</a> &nbsp;
                        <a class="delete btn  btn-danger" href="{{route('admin.user.destroy',['user' => $usersItem])}}">Удалить</a>
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


