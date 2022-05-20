@extends('layouts.app')

@section('title', 'Модерация отзывов')

@section('content')

@include('inc.message')
<div class="container">
<h1 class="h2">Список отзывов</h1>
    <div style="margin-bottom: 15px;" class="p">
     <a href="{{ route('admin.index') }}" type="button" class="btn btn-sm btn-secondary">Назад</a> &nbsp;
    </div>
    <div class="row">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
               <tr>
                   <th>#ID</th>
                   <th>Пользователь</th>
                   <th>Комикс</th>
                   <th>Отзыв</th>
                   <th>Модерация</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
            @forelse($reviews as $reviewItem)
                <tr id="{{$reviewItem->id}}">
                    <td>{{ $reviewItem->id }}</td>
                    <td>
                        @foreach($users as $user)
                            @if($reviewItem->user_id == $user->id)
                                {{ $user->name }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($courses as $course)
                            @if($reviewItem->course_id == $course->id)
                            {{$course->title}}
                            @endif
                        @endforeach
                    </td>
                    <td>{!! $reviewItem->text !!}</td>
                    <td>
                        @if($reviewItem->publish == 0)
                            <a class="btn btn-outline-secondary" href="{{route('admin.courseReview.moderation',['courseReview'=>$reviewItem])}}">Опубликовать</a>&nbsp;
                        @else
                            Опубликованно {{$reviewItem->updated_at}}
                        @endif
                    </td>
                    <td>
                        <p class="btn-group">
                            <a class="delete btn btn-sm btn-danger" href="{{ route('admin.review.destroy', ['courseReview' => $reviewItem]) }}">Удалить</a>
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
  <br>
<hr>
</div>
@endsection
