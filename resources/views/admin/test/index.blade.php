@extends('layouts.app')

@section('title', 'Тесты')

@section('content')
@include('inc.message')
<div class="container">
@forelse($course as $courseItem)
@if($courseItem->id == $course_id)
    <h1 class="h2">Список тестов по Истории: {{$courseItem->title}}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.course.show',['course' => $course_id]) }}" type="button" class="btn btn-secondary">Назад</a> &nbsp;
        </div>
    </div>
    <div class="row">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <h4 style="margin-top: 15px; color:red;">FirstTest</h4>
            <a href="{{ route('admin.test_1.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить FirstTest</a>&nbsp;
               <tr>
                   <th>#ID</th>
                   <th>Название</th>
                   <th>Слово</th>
                   <th>Описание Слова</th>
                   <th>Ответы</th>
                   <th>Правильный ответ</th>
                   <th>Опции</th>
               </tr>
            </thead>
            <tbody>
            @forelse($first_tests as $testsItem)
            @if($courseItem->id == $testsItem->course_id)
                <tr id="{{$testsItem->id}}">
                    <td rowspan="5">{{ $testsItem->id }}</td>
                    <td rowspan="5">{{ $testsItem->test_title }}</td>
                    <td rowspan="5">{{ $testsItem->word }}</td>
                    <td rowspan="5">{{ $testsItem->description }}</td>
                    <td>{{$testsItem->answer_1}}</td>
                    <td rowspan="5">{{$testsItem->right_answer}}</td>
                    <td rowspan="5">
                        <p class="btn-group">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.test_1.edit', ['test_1' => $testsItem]) }}">Редактировать</a> &nbsp;
                            <a class="delete btn btn-sm btn-danger" href="{{ route('admin.test_1.destroy', ['test_1' => $testsItem]) }}">Удалить</a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>{{$testsItem->answer_2}}</td>
                </tr>
                <tr>
                    <td>{{$testsItem->answer_3}}</td>
                </tr>
                <tr>
                    <td>{{$testsItem->answer_4}}</td>
                </tr>
                <tr>
                    <td>{{$testsItem->answer_5}}</td>
                </tr>
            @endif
            @empty
                <tr><td colspan="6">Записей нет</td> </tr>
            @endforelse
            </tbody>
        </table>
     <!--   <hr>
<h2>Проверка работы первого теста:</h2>
  <div class="row">

  <dl class="dl-horizontal">
      @forelse($first_tests as $testsItem)
      @if($courseItem->id == $testsItem->course_id)
      <dd><h5>{{$testsItem->test_title}} <span style="color: red;">{{$testsItem->word}}</span></h5></dd>
    <form method="post" action="{{route('admin.test_1.answer',['test_1' => $testsItem])}}">
        @csrf
        @method('get')
        <dd>
            <input type="radio" value="answer_1" id="answer_1" name="right_answer" checked>
            <label class="custom-control-label" for="answer_1">{{$testsItem->answer_1}}</label>
        </dd>
        <dd>
            <input type="radio" value="answer_2" id="answer_2" name="right_answer" >
            <label class="custom-control-label" for="answer_2">{{$testsItem->answer_2}}</label>
        </dd>
        <dd>
            <input type="radio" value="answer_3" id="answer_3" name="right_answer" >
            <label class="custom-control-label" for="answer_3">{{$testsItem->answer_3}}</label>
        </dd>
        <dd>
            <input type="radio" value="answer_4" id="answer_4" name="right_answer" >
            <label class="custom-control-label" for="answer_4">{{$testsItem->answer_4}}</label>
        </dd>
        <dd>
            <input type="radio" value="answer_5" id="answer_5" name="right_answer" >
            <label class="custom-control-label" for="answer_5">{{$testsItem->answer_5}}</label>
        </dd>
        <input class="btn btn btn-secondary" type="submit" value="Выбрать">
    </form>
    </dl>
    @endif
      @empty
      <h1>Тест не работает</h1>
      @endforelse
    </div>

<hr>-->
    <table class="table table-bordered">
        <thead><h4 style="color:red;">SecondTest</h4>
        <a href="{{ route('admin.test_2.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить SecondTest</a>&nbsp;
            <tr>
                <th>#ID</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Вопросы</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
        @forelse($second_tests as $testsItem)
        @if($courseItem->id == $testsItem->course_id)
        <tr id="{{$testsItem->id}}">
        <td>{{ $testsItem->id }}</td>
        <td>{{ $testsItem->test_title }}</td>
        <td>{{ $testsItem->description }}</td>
        <td>{{$testsItem->questions}}</td>
        <td>
                <p class="btn-group">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.test_2.edit', ['test_2' => $testsItem]) }}">Редактировать</a> &nbsp;
                <a class="delete btn btn-sm btn-danger" href="{{ route('admin.test_2.destroy', ['test_2' => $testsItem]) }}">Удалить</a>
            </p>
        </td>
    </tr>
    @endif
            @empty
                <tr><td colspan="6">Записей нет</td> </tr>
            @endforelse
        </tbody>
    </table>

    <table class="table table-bordered">
        <thead><h4 style="color:red;">ThirdTest</h4>
        <a href="{{ route('admin.test_3.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить ThirdTest</a>&nbsp;
            <tr>
                <th>#ID</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Вопросы</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
        @forelse($third_tests as $testsItem)
        @if($courseItem->id == $testsItem->course_id)
        <tr id="{{$testsItem->id}}">
        <td>{{ $testsItem->id }}</td>
        <td>{{ $testsItem->test_title }}</td>
        <td>{{ $testsItem->description }}</td>
        <td>{{$testsItem->questions}}</td>
        <td>
                <p class="btn-group">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.test_3.edit', ['test_3' => $testsItem]) }}">Редактировать</a> &nbsp;
                <a class="delete btn btn-sm btn-danger" href="{{ route('admin.test_3.destroy', ['test_3' => $testsItem]) }}">Удалить</a>
            </p>
        </td>
    </tr>
    @endif
            @empty
                <tr><td colspan="6">Записей нет</td> </tr>
            @endforelse
        </tbody>
    </table>
  </div>
  <hr>
@endif
  @empty
  Записей нет
@endforelse
</div>

@endsection

