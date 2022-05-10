@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Проверьте Ваш адрес электронной почты') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('На Ваш адрес электронной почты отправлена новая ссылка для подтверждения.') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, проверьте Вашу электронную почту на наличие ссылки для подтверждения.') }}
                    {{ __('Если Вы не получили письмо') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь, чтобы запросить другое') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
