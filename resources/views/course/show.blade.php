@extends('layouts.app')

@section('title', $course->title)

@section('content')
<div class="container">
  @if ($course)

  <img src="{{$course->back_img}}" width="350" height="350" alt="" class="cart-img-top">
  <h1 class="display-3">{{$course->title}}</h1>
  <p>{{$course->text}}</p>

  <div class="container">
    <h2>Список уроков этого курса:</h2>
    <div class="row">
      @forelse($lessons as $lessonsItem)
      <h5>{{$lessonsItem->title}}
      <p><a class="btn btn-primary" href="{{route('lesson.show', ['lesson' => $lessonsItem])}}">Подробнее</a></p>
      </h5>

      @empty
      <h1>Уроков нет</h1>
      @endforelse
    </div>
        <p><a class="btn btn-primary" href="{{ route('course.index') }}" role="button">Назад ко всем Курсам</a></p>
    <hr>
  </div> <!-- /container -->
  @else
  <h1>Такого курса нет</h1>
  @endif
</div>
<div class="container">
    <h1>Отзывы</h1>
    <div class="row">
    @forelse($reviews as $reviewsItem)
        <h3>Пользователь: {{$reviewsItem->user_id}}</h3>
        <p>{{$reviewsItem->text}}</p>

        @empty
      <h1>Отзывов нет</h1>
      @endforelse
    </div>
</div>

</div>
@endsection

