<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>Vokasi UNS | @yield('title')</title>
    <link rel="icon" href="{!! asset('assets/img/logo.png') !!}"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('back.layouts.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('back.partials.topnavigation')
        </nav>
            
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
            @include('back.partials.sidebar.sidebar')
        </aside>
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('back.partials.footer')
    </div>
    @include('back.layouts.script')
</body>