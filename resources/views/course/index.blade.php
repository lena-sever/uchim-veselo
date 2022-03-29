@extends('layouts.app')

@section('title', 'Список курсов')

@section('content')
<div class="container">

  <div class="row">
    @forelse($courses as $coursesItem)
    <div class="col-md-4">
      <h2>{{$coursesItem->title}}</h2>
      <img src="{{$coursesItem->back_img}}" width="150" height="150" alt="" class="cart-img-top">
      <p>{{!! $coursesItem->description !!}}</p>
      <p><a class="btn btn-secondary" href="{{ route('course.show', ['course' => $coursesItem]) }}" role="button">Подробнее</a></p>
    </div>
    @empty
    <h1>Курсов нет</h1>
    @endforelse
  </div>

  <hr>

</div>
@endsection