<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page.title', config('app.name'))</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .required:after {
            content: '*';
            color: red;
        }
    </style>
    @stack('css')
</head>
<body>
<div class="d-flex flex-column justify-content-between min-vh-100">
    @include('includes.alert')
    @include('includes.header')
    <main class="py-3">
        @yield('content')
    </main>
    @include('includes.footer')
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
@stack('js')
</body>
</html>
