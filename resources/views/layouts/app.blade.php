<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="" type="image/x-icon" />

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />

    <meta property="og:type" content="@yield('type', 'website')" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('image')" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="{{ url()->current() }}" />
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:description" content="@yield('description')" />
    <meta name="twitter:image" content="@yield('image')" />

    <link rel="canonical" href="{{ url()->current() }}" />

    <link rel="stylesheet" href="{{ url('assets/css/index.css') }}" />
    @yield('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.3/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js"></script>
</head>

<body>
    <x-aside />
    <div id="app">
        <x-header />
        <main>
            @yield('content')
        </main>
    </div>
    <x-footer />
    @yield('js')
    <script src="{{ url('assets/js/index.js') }}"></script>
</body>

</html>
