@extends('layouts.app')

@section('title', $course->title)

@section('content')
<div class="container">
  @if ($course)

  <img src="{{$course->img}}" width="350" height="350" alt="" class="cart-img-top">
  <h1 class="display-3">{{$course->title}}</h1>
  <p>{{$course->text}}</p>

  <div class="container">
    <h2>Список глав этого истории:</h2>
    <div class="row">
      @forelse($lessons as $lessonsItem)
      <h5>{{$lessonsItem->title}} <a href="{{route('lesson.show', ['lesson' => $lessonsItem])}}">Подробнее</a>
      </h5>

      @empty
      <h1>Глав нет</h1>
      @endforelse
    </div>
    <hr>
        <p><a class="btn btn-primary" href="{{ route('course.index') }}" role="button">Назад ко всем Историям</a></p>

  </div>
  @else
  <h1>Такой истории нет</h1>
  @endif
</div>
<div class="container">
    <h1>Отзывы</h1>
    <form method="post" action="{{route('admin.courseReview.store')}}">
        @csrf
            <div class="row g-3">
            <div class="col-12">
            <input hidden type="text" name="user_id" id="user_id" value="5"> <!--id пользователя потом из сессии зпрашивать надо: Auth::user()->name-->
              <input hidden type="text" name="course_id" id="course_id" value="{{$course->id}}">
              <label for="text" class="form-label">Напишите нам</label>
              <textarea type="text" class="form-control" name="text" id="text" placeholder="Ваш Отзыв" ></textarea>
              @error('text') <strong style="color:red;">{{ $message }}</strong> @enderror
            </div>
          <button class="w-25 btn btn-primary btn-sm" type="submit">Отправить</button>
          <hr class="my-4">
        </form>
    <div class="row">
    @forelse($reviews as $reviewsItem)
        <h3>Пользователь: {{$reviewsItem->user->name}}</h3>
        <p>{{$reviewsItem->text}}</p>

        @empty
      <h1>Отзывов нет</h1>
      @endforelse
    </div>
</div>

</div>
@endsection

