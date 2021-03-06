<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Prova Todo List</title>

    <!-- Styles -->
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
    {!! Html::style('//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') !!}
    {!! Html::style('css/loader.css') !!}
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/style.css') !!}
    @stack('styles')
</head>
<body>
<div class="container-loader" style="display: none">
    <div class="loader">Loading...</div>
</div>
<div id="app">
    @include('elements._header')
    <div class="container">
        <div class="row">
            @yield('content')
            @include('elements._left_menu')
        </div>
    </div>
    @include('elements._footer')
</div>

<!-- Scripts -->
{!! Html::script('js/jquery-3.3.1.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" />
{!! Html::script('https://unpkg.com/sweetalert/dist/sweetalert.min.js') !!}
{!! Html::script('js/app.js') !!}
@stack('scripts')
</body>
</html>

