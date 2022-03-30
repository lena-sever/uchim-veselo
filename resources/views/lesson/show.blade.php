@extends('layouts.app')

@section('title', $lesson->title)

@section('content')
<div class="container">
  @if ($lesson)


  <h1 class="display-3">{{$lesson->title}}</h1>
  <p>{!!$lesson->text!!}</p>


  <p><a href="{{route('course.show',['course' => $lesson->course_id])}}" class="btn btn-primary">Список всех уроков курса "{{ $lesson->course->title }}"" </a></p>
  @else

  <h1>Такого урока нет</h1>
  @endif

</div>

<hr>

</div>
@endsection
