<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="wrapper">
        <div class="container">
            <h1>Administração - CMS</h1>
            <form class="form form-login" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <input class="login-form" type="email" name="email" placeholder="E-mail">
                <input class="login-form" type="password" name="password" placeholder="Password">
                <button type="submit" id="login-button">Login</button>
            </form>
            <a class="btn btn-primary" href="{{ route('password.request') }}">
                Esqueci Minha Senha
            </a>
        </div>
    </div>
</div>
</body>
</html>


