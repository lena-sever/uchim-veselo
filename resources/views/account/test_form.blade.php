@extends('layouts.app')
@section('title', 'Тестирование форм API')
@section('content')

<h2>Регистрация</h2>
<form method="post" action="user">
<!-- <form method="post" action="https://uchim-veselo.ru/api/user"> -->

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
<!-- <form method="post" action="user/login"> -->
<form method="post" action="https://uchim-veselo.ru/api/user/login">


    <label>email</label>
    <input type="text" name="email" value="test@email.com">

    <label>password</label>
    <input type="text" name="password" value="123456789">


    <input type="submit" value="Отправить">
</form><br><br>
<hr>

<h2>Аутентификация</h2>
<!-- <form method="post" action="user/auth"> -->
<form method="post" action="https://uchim-veselo.ru/api/user/auth">

    <label>session_token</label>
    <input type="text" name="session_token" value="bsBPcDivPjrd18zXAliZRA0HLsqEGPEno3j2hEDdPgrYmLZ5bGGOx9gCi5Yn">

    <input type="submit" value="Отправить">
</form><br><br>
<hr>

<h2>Сообщение с сайта</h2>
<form method="post" action="messange">

    <label>user_id</label>
    <input type="text" name="user_id" value="1">

    <label>name</label>
    <input type="text" name="name" value="Имя">

    <label>email</label>
    <input type="text" name="email" value="test@email.com">

    <label>message</label>
    <input type="text" name="message" value="Текст сообщения">


    <input type="submit" value="Отправить">
</form><br><br>
<hr>

<h2>Поиск по комиксам</h2>
<form method="post" action="courses/search">
<!-- <form method="post" action="https://uchim-veselo.ru/api/courses/search"> -->


    <label>Запрос</label>
    <input type="text" name="search_phrase" value="Клим квадрат">

    <input type="submit" value="Отправить">
</form><br><br>
<hr>

<h2>Переключение лайков</h2>
<!-- <form method="post" action="like"> -->
<form method="post" action="https://uchim-veselo.ru/api/like">

    <label>User_id</label>
    <input type="text" name="user_id" value="2">

    <label>Course_id</label>
    <input type="text" name="course_id" value="1">

    <input type="submit" value="Отправить">
</form><br><br>
<hr>


<h2>Оплата комикса</h2>
<!-- <form method="post" action="payment"> -->
<form method="post" action="https://uchim-veselo.ru/api/payment">

    <label>User_id</label>
    <input type="text" name="user_id" value="1">

    <label>Course_id</label>
    <input type="text" name="course_id" value="1">

    <input type="submit" value="Отправить">
</form><br><br>
<hr>


<!--  -->


@endsection
