@extends('layouts.app')

@section('title', 'Список пользователей')

@section('content')

@include('inc.message')
<div class="container">
<h1 class="h2">Панель администратора</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="{{ route('admin.index') }}" type="button" class="btn btn-sm btn-secondary">Назад</a>&nbsp;
      <a href="{{ route('admin.painter.create') }}" type="button" class="btn btn-sm btn-secondary">Добавить художника
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
                   <th>Комикс</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
              @forelse($painters as $paintersItem)
                <tr id="{{$paintersItem->id}}">
                    <td>{{ $paintersItem->id }}</td>
                    <td>
                        @if($paintersItem->photo)
                            @if(substr($paintersItem->photo,1,3) == 'svg')
                            {!! $paintersItem->photo !!}
                            @else
                            <img style="width: 100px;" src="{{ $paintersItem->photo }}" alt="{{ $paintersItem->name }}">
                            @endif
                        @else
                        {!! Avatar::create($paintersItem->name)->setBorder(1, '#dc3545', 10)->setDimension(85, 85)->toSvg() !!}
                        @endif
                    </td>
                    <td>{{ $paintersItem->name }}</td>
                    <td>
                        @foreach($paintersItem->courses as $course)
                        <a href="{{ route('admin.course.show',['course'=>$course->id]) }}" type="button" class="btn btn-outline-secondary">{{ $course->title }}
                        </a>
                        @endforeach
                    </td>
                    <td>
                        <a class="btn  btn-primary" href="{{ route('admin.painter.edit', ['painter' => $paintersItem]) }}">Редактировать</a> &nbsp;
                        <a class="delete btn  btn-danger" href="{{route('admin.painter.destroy',['painter' => $paintersItem])}}">Удалить</a>
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


