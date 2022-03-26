@extends('layouts.app')

@section('title', $course->title)

@section('content')
<div class="container">
  @if ($course)

  <img src="{{$course->img}}" width="350" height="350" alt="" class="cart-img-top">
  <h1 class="display-3">{{$course->title}}</h1>
  <p>{{$course->text}}</p>

  <div class="container">
    <h2>Список уроков этого курса;</h2>
    <div class="row">
      @forelse($lessons as $lessonsItem)
      <h5>{{$lessonsItem->title}}
        <a href="#">Подробнее</a>
      </h5>

      @empty
      <h1>Уроков нет</h1>
      @endforelse
    </div>

    <hr>

  </div> <!-- /container -->

  <p><a class="btn btn-primary" href="{{ route('course.index') }}" role="button">Назад</a></p>


  @else
  <h1>Такого курса нет</h1>
  @endif

</div>
<hr>

</div>
@endsection