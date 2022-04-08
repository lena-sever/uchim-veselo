@extends('layouts.app')
@section('title', 'Список курсов')
@section('content')
<div class="container">
  <div class="row">
    @forelse($courses as $coursesItem)
    <div class="col-md-4">
      <h2>{{$coursesItem->title}}</h2>
      <img src="{{$coursesItem->img}}" width="150" height="150" alt="" class="cart-img-top">
      <p>{!! $coursesItem->description !!}</p>
      <p><a class="btn btn-secondary" href="{{ route('course.show', ['course' => $coursesItem]) }}" role="button">Подробнее</a></p>
    </div>
    @empty
    <h1>Курсов нет</h1>
    @endforelse
  </div>
  <hr class="my-4">
<div class="px-3">
<form method="post" action="#">
        @csrf
            <div class="row g-3">
            <div class="col-sm-6">
              <label for="name" class="form-label">Имя</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="" value="" >
              @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <div class="col-sm-6">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="" value="" >
              @error('email') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

            <div class="col-12">
              <label for="message" class="form-label">Ваше Сообщение</label>
              <textarea type="text" class="form-control" name="message" id="message" placeholder="" ></textarea>
              @error('message') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>

          <button class="w-25 btn btn-primary btn-lg" type="submit">Отправить</button>
        </form>


</div>
</div>
@endsection



<?php
?>
