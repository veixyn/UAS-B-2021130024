<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="link-secondary" href="">About Us</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="">Blogging</a>
                </div>
    </div>

    <main class="container">
        @yield('content')
    </main>

    <footer class="blog-footer">
        <p>
            Copyright © {{ date('Y') }} <a href="/">Blogging</a> - <a href="">Subscribe</a>
        </p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
</body>

</html>
