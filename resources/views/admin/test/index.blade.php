@extends('layouts.app')

@section('title', 'Тест')

@section('content')
<div class="container">
    @forelse($lessons as $lessonsItem)
    @if($lessonsItem->id == $lesson_id)
<h1 class="h2">Список тестов по главе: {{$lessonsItem->title}}</h1>
<div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{ route('admin.course.show',['course' => $course_id]) }}" type="button" class="btn btn-secondary">Назад</a> &nbsp;
        <a href="{{ route('admin.test.create') }}"
               type="button" class="btn btn-secondary">Добавить тест
            </a>
        </div>
    </div>
  <div class="row">
  <div class="table-responsive">
  <table class="table table-bordered">
            <thead>
                <h4 style="margin-top: 15px;">FirstTest</h4>
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
            @if($lessonsItem->id == $testsItem->lesson_id)
            <tr id="{{$testsItem->id}}">
			<td rowspan="5">{{ $testsItem->id }}</td>
			<td rowspan="5">{{ $testsItem->test_title }}</td>
			<td rowspan="5">{{ $testsItem->word }}</td>
            <td rowspan="5">{{ $testsItem->description }}</td>
			<td>{{$testsItem->answer_1}}</td>
			<td rowspan="5">{{$testsItem->right_answer}}</td>
			<td rowspan="5">
                 <p class="btn-group">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.test.edit', ['test' => $testsItem]) }}">Редактировать</a> &nbsp;
                    <a class="delete btn btn-sm btn-danger" href="{{ route('admin.test.destroy', ['test' => $testsItem]) }}">Удалить</a>
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

    <table class="table table-bordered">
        <thead><h4>SecondTest</h4>
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
        @if($lessonsItem->id == $testsItem->lesson_id)
        <tr id="{{$testsItem->id}}">
        <td>{{ $testsItem->id }}</td>
        <td>{{ $testsItem->test_title }}</td>
        <td>{{ $testsItem->description }}</td>
        <td>{{$testsItem->questions}}</td>
        <td>
                <p class="btn-group">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.test.edit', ['test' => $testsItem]) }}">Редактировать</a> &nbsp;
                <a class="delete btn btn-sm btn-danger" href="{{ route('admin.test.destroy', ['test' => $testsItem]) }}">Удалить</a>
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
        <thead><h4>ThirdTest</h4>
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
        @if($lessonsItem->id == $testsItem->lesson_id)
        <tr id="{{$testsItem->id}}">
        <td>{{ $testsItem->id }}</td>
        <td>{{ $testsItem->test_title }}</td>
        <td>{{ $testsItem->description }}</td>
        <td>{{$testsItem->questions}}</td>
        <td>
                <p class="btn-group">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.test.edit', ['test' => $testsItem]) }}">Редактировать</a> &nbsp;
                <a class="delete btn btn-sm btn-danger" href="{{ route('admin.test.destroy', ['test' => $testsItem]) }}">Удалить</a>
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

