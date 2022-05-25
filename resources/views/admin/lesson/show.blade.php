@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')

@include('inc.message')
<div class="container">
<h1 class="h2">Список слайдеров "{{$lesson->title}}"</h1>
<a href="{{ route('admin.course.show',['course'=>$lesson->course_id]) }}" type="button" class="btn btn-sm btn-secondary">Назад</a> &nbsp;
  <a href="{{route ('admin.slider.create')}}" type="button" class="btn btn-sm btn-secondary">Добавить слайдер</a>
  <div class="row">
    <div class="table-responsive">
  <table class="table table-bordered">
            <thead>
            <tr>
                <th>№</th>
                <th>Текст</th>
                <th>Изображение</th>
                <th>Музыка</th>
                <th>Опции</th>
                </tr>

                @if(count($sliders) < 3)
                <tr><td style="color: #dc3545;text-align: center;font-size: 30px;" colspan="6">
                    Нужно добавить ещё {{3-count($sliders)}} слайдер(а)
                </td> </tr>
                @endif
            @forelse($sliders as $slidersItem)
                <tr id="{{$slidersItem->id}}">
                    <td>{{ $slidersItem->id }}</td>
                    <td>{!! $slidersItem->text !!}</td>
                    <td><img src="{{$slidersItem->img}}" width="100" height="100" alt="" class="cart-img-top"></td>
                    <td><audio controls src="{{ $slidersItem->music }}"></audio></td>
                    <td>
                        <p class="btn-group">
                            <a class="btn btn-sm btn-primary" href="{{route ('admin.slider.edit',['slider'=>$slidersItem])}}">Редактировать</a> &nbsp;
                            <a class="delete btn btn-sm btn-danger" href="{{route ('admin.slider.destroy',['slider'=>$slidersItem])}}">Удалить</a>
                        </p>
                    </td>
                </tr>

              @empty
                  <tr><td colspan="6">
                  Записей нет
                </td> </tr>
              @endforelse
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection






