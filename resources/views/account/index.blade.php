@extends('layouts.app')
@section('title', 'Аккаунт')
@section('content')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
<h1 style="margin-bottom: 30px;" class="h2">{{Auth::user()->name}}</h1>
    <div class="row-mb-2 row justify-content-between">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.index')}}">Перейти к Комиксам</a></h3>
                </div>
            </div>
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.messenger.index')}}">Сообщения с сайта</a></h3>
                </div>
            </div>
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.user.index')}}">Пользователи</a></h3>
                </div>
            </div>
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.author.index')}}">Авторы</a></h3>
                </div>
            </div>
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.painter.index')}}">Художники</a></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-6 row " style="justify-content: right;">
        @if(Auth::user()->photo)
        <img class="bd-placeholder-img rounded-circle"  style="width:50%; height:50%;" src="{{ Auth::user()->photo }}"> &nbsp;
        @else
        {!! Avatar::create(Auth::user()->name)->setDimension(200)->setFontSize(82)->toSvg() !!}
        @endif
        </div>
    </div>
</div>
@endsection

