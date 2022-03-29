@extends('layouts.app')

@section('title', 'Список уроков')

@section('content')
<div class="container">

  <div class="row">
    @forelse($lessons as $lessonItem)
    <div class="col-md-4">
      <h2>{{$lessonItem->title}}</h2>
      <p>{{!! $lessonItem->description !!}}</p>
      <p><a class="btn btn-secondary" href="{{ route('lesson.show', ['lesson' => $lessonItem]) }}" role="button">Подробнее</a></p>
    </div>
    @empty
    <h1>Курсов нет</h1>
    @endforelse
  </div>

  <hr>

</div>
@endsection
