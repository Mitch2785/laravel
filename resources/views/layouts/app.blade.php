<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Laravel 9 - @yield('title')</title>
    <meta name="description" content="@yield('meta-description','Default meta description')" />

    @vite(['resources/css/app.scss','resources/js/app.js'])
</head>
<body>
    @include('partials.nav')

    @if(session('status'))
    <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
        {{ session('status') }}
    </div>
    @endif
    @yield('content')
</body>
</html>