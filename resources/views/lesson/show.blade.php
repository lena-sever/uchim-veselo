@extends('layouts.app')

@section('title', $lesson->title)

@section('content')


<div class="container">
  @if ($lesson)


  <h1 class="display-3">{{$lesson->title}}</h1>
  <p>{!!$lesson->text!!}</p>
  <hr>
  <div class="table-responsive">
  <h2>Слайдер</h2>
        <dl class="dl-horizontal">
        @forelse($sliders as $slidersItem)
        <dd><h4>{{$slidersItem->text}} </h4></dd>
        <dd><img src="{{$slidersItem->img}}" alt="" width="300px" height="auto"></dd>
        <dd><audio controls><source src="{{$slidersItem->music}}" type="audio/mpeg"></audio></dd>
        </dl>
        @empty
        <h1>Глав нет</h1>
        @endforelse
{{$sliders->links()}}
    </div>
<hr>

  <h2>Пройти первый тест:</h2>
  <div class="row">
  @include('inc.message')
  <dl class="dl-horizontal">
      @forelse($first_tests as $testsItem)
      <dd><h5>{{$testsItem->test_title}} <span style="color: red;">{{$testsItem->word}}</span></h5></dd>
    <form method="post" action="{{route('admin.test.answer',['test' => $testsItem])}}">
        @csrf
        @method('get')
        <dd>
            <input type="radio" value="{{$testsItem->answer_1}}" id="answer_1" name="right_answer" checked>
            <label class="custom-control-label" for="answer_1">{{$testsItem->answer_1}}</label>
        </dd>
        <dd>
            <input type="radio" value="{{$testsItem->answer_2}}" id="answer_2" name="right_answer" >
            <label class="custom-control-label" for="answer_2">{{$testsItem->answer_2}}</label>
        </dd>
        <dd>
            <input type="radio" value="{{$testsItem->answer_3}}" id="answer_3" name="right_answer" >
            <label class="custom-control-label" for="answer_3">{{$testsItem->answer_3}}</label>
        </dd>
        <dd>
            <input type="radio" value="{{$testsItem->answer_4}}" id="answer_4" name="right_answer" >
            <label class="custom-control-label" for="answer_4">{{$testsItem->answer_4}}</label>
        </dd>
        <dd>
            <input type="radio" value="{{$testsItem->answer_5}}" id="answer_5" name="right_answer" >
            <label class="custom-control-label" for="answer_5">{{$testsItem->answer_5}}</label>
        </dd>
        <input class="btn btn btn-secondary" type="submit" value="Выбрать">
    </form>
    </dl>
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
