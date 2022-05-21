@extends('layouts.app')

@section('title', 'СмартКомикс | домашняя страница')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @auth
                @if(Auth::user()->is_admin)
                <div class="card-header">{{ __('СмартКомикс') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Вы вошли в систему!') }}
                    </div>
                </div>
                @else
                <div style="text-align: center;" class="card-body">
                    <h1>У Вас нет доступа</h1>
                </div>

                @endif
            @endauth
        </div>
    </div>
</div>
@endsection

