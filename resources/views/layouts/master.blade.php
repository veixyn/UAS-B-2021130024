<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <div class="btn-group">
                        <a href="{{route('items.index')}}">
                            <button type="button" class="btn btn-light">
                                Items
                            </button>
                        </a>
                        <button
                            type="button"
                            class="btn btn-light dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('items.create')}}">Create Item</a>
                        </div>
                    </div>
                    <div class="btn-group">
                        <a href="{{route('orderList')}}">
                            <button type="button" class="btn btn-light">
                                Orders
                            </button>
                        </a>
                        <button
                            type="button"
                            class="btn btn-light dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('createOrder')}}">Create Order</a>
                        </div>
                    </div>

                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="{{route('index')}}">Order System</a>
                </div>
    </div>

    <main class="container mt-5 w3-animate-opacity">
        @yield('content')
    </main>

    <footer class="blog-footer w3-animate-bottom">
        <p>
            Copyright © {{ date('Y') }} <a href="https://github.com/veixyn/uas-b-2021130024" target="_blank">Tangana Vito Fortunata</a>
        </p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
</body>

</html>
