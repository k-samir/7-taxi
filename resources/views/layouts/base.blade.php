<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>
    @yield('head-content')

    <styles>
        @yield('styles')
    </styles>
</head>

<body>@yield('body-content')</body>
</html>


<?php
