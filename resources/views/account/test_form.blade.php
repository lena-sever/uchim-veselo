@extends('layouts.app')
@section('title', 'Тестирование форм API')
@section('content')

<h2>Регистрация</h2>
<form method="post" action="user">

    <label>name</label>
    <input type="text" name="name" value="Имя">

    <label>email</label>
    <input type="text" name="email" value="test@email.com">

    <label>password</label>
    <input type="text" name="password" value="123456789">


    <input type="submit" value="Отправить">
</form><br><br>
<hr>

<h2>Логин</h2>
<form method="post" action="user/login">

    <label>email</label>
    <input type="text" name="email" value="test@email.com">

    <label>password</label>
    <input type="text" name="password" value="123456789">


    <input type="submit" value="Отправить">
</form><br><br>
<hr>

<h2>Аутентификация</h2>
<form method="post" action="user/auth">

    <label>session_token</label>
    <input type="text" name="session_token" value="06EhYd6sw4FZYXEdn88ghatZDrtUE0yOQbYlQ2pvjLBbJrY749znVZoXlnfn">

    <input type="submit" value="Отправить">
</form><br><br>
<hr>

@endsection