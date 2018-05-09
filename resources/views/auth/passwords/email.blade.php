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
            <h1>Esqueci Minha Senha</h1>
            <form class="form form-login" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <input class="login-form" type="email" name="email" placeholder="E-mail">
                <button type="submit">
                    Resetar Senha
                </button>
            </form>

        </div>
    </div>
</div>
</body>
</html>