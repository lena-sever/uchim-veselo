@extends('layouts.app')

@section('title', 'Редактировать тест')

@section('content')

@include('inc.message')
    <div class="col-md-9 col-lg-10 px-md-4">
            @if($options == 1)
                @include('inc.edit_test.test1')
            @elseif($options == 2)
                @include('inc.edit_test.test2')
            @elseif($options == 3)
                @include('inc.edit_test.test3')
            @endif
    </div>
@endsection


