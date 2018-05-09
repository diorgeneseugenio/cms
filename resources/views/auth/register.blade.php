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
            <h1>Cadastrar-se</h1>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <form class="form form-login" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <input class="login-form" type="name" name="name" placeholder="Nome" required>
                <input class="login-form" type="email" name="email" placeholder="E-mail" required>
                <input class="login-form" type="password" name="password" placeholder="Senha" required>
                <input class="login-form" type="password" name="password_confirmation" placeholder="Confirmação Senha" required>
                <button type="submit" id="login-button">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
