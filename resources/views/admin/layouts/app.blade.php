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
        <div class="page-wrapper toggled">
            @include('admin.layouts.sidebar')
            <main class="page-content">
                <div class="container-fluid">
                    @yield('content')
                    <!--
                        <div class="row">
                            <h1>Pro sidebar template</h1>
                            <p>A responsive sidebar template with dropdown menu based on bootstrap framework.</p>
                            <hr>
                            <div class="alert alert-info">Find latest version built with bootstrap 4 in github</div>
                            <a href="https://github.com/azouaoui-med/pro-sidebar-template" class="btn btn-default" target="_blank"><i class="fa fa-github"></i> View source on github</a>
                            <a href="https://github.com/azouaoui-med/pro-sidebar-template/archive/gh-pages.zip" class="btn btn-default" target="_blank"><i class="fa fa-download"></i> Download latest version</a>
                        </div>
                    -->
                </div>
            </main>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
