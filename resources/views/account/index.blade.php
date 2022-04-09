@extends('layouts.app')
@section('title', 'Аккаунт')
@section('content')
<div class="col-md-9 ms-sm-5 col-lg-10 px-md-2">
<h1 style="margin-bottom: 30px;" class="h2">{{Auth::user()->name}}</h1>
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('course.index')}}">Перейти к Историям</a></h3>
                </div>
            </div>
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.mail.index')}}">Почта</a></h3>
                </div>
            </div>
        </div>

        <div class="col-lg-6" style="text-align: right;">
        @if(Auth::user()->avatar)
            <img class="bd-placeholder-img rounded-circle" src="{{ Auth::user()->avatar }}" style="width:200px;hight:200px;">
        @else
            <svg class="bd-placeholder-img rounded-circle" width="200" height="200" role="img" aria-label="Фото пользователя" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Фото</title>
                    <rect width="100%" height="100%" fill="#777"/>
                    <text x="50%" y="50%" fill="#777" dy=".3em">пользователя</text>
                </svg>
        @endif
        </div>
    </div>
</div>
@endsection

