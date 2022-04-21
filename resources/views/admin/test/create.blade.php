@extends('layouts.app')

@section('title', 'Добавить тест')

@section('content')

@include('inc.message')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
            @if($options == 1)
                @include('inc.creat_test.test1')
            @elseif($options == 2)
                @include('inc.creat_test.test2')
            @elseif($options == 3)
                @include('inc.creat_test.test3')
            @endif
</div>
@endsection

