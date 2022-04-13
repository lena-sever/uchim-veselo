@extends('layouts.app')

@section('title', $lesson->title)

@section('content')
<div class="container">
  @if ($lesson)


  <h1 class="display-3">{{$lesson->title}}</h1>
  <p>{!!$lesson->text!!}</p>
  <hr>
  <div class="row">
      <ul>
         <h2>Слайдер</h2>
        @forelse($sliders as $slidersItem)
        <li><h4>{{$slidersItem->text}} </h4></li>
        <li><img src="{{$slidersItem->img}}" alt="" width="100px" height="auto"></li>
        <li><audio controls><source src="{{$slidersItem->music}}" type="audio/mpeg"></audio></li>
        @empty
        <h1>Глав нет</h1>
        @endforelse
      </ul>

    </div>
<hr>

  <h2>Пройти тесты:</h2>
  <div class="row">
      @forelse($tests as $testsItem)
      <h5>{{ $loop->iteration }}. {{$testsItem->test_title}} <a href="#">Подробнее</a>
      </h5>

      @empty
      <h1>Глав нет</h1>
      @endforelse
    </div>

    <hr>
  <p><a href="{{route('course.show',['course' => $lesson->course_id])}}" class="btn btn-primary">Список всех глав истории "{{ $lesson->course->title }}"" </a></p>
  @else

  <h1>Глав нет</h1>
  @endif

</div>


</div>
@endsection
