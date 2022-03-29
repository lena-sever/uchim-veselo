@extends('layouts.app')

@section('title', 'АДМИНКА')

@section('content')
<h1 class="h2">Панель администратора</h1>
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.course.index')}}">КУРСЫ</a></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="{{route('admin.lesson.index')}}">УРОКИ</a></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <h3 style="text-align: center;" class="mb-0"><a style="text-decoration: none;" href="#">ПРОФИЛЬ</a></h3>
                </div>
            </div>
        </div>
@endsection