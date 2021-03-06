<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @if (isset($title))
        <title>{{{ $title }}} - Company Name</title>
    @else
        <title>Company Name</title>
    @endif
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if (is_file(public_path() . '/css/all.css'))
        <link rel="stylesheet" href="/css/all.{{ filemtime(public_path() . '/css/all.css') }}.css">
    @endif

    @if (is_file(public_path() . '/js/head.min.js'))
        <script src="/js/head.min.{{ filemtime(public_path() . '/js/head.min.js') }}.js"></script>
    @endif
</head>
<body>

<ul>
    <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>
    <li><a class="{{ Request::is('about') ? 'active' : '' }}" href="/about">About</a></li>
    <li><a class="{{ Request::is('contact') ? 'active' : '' }}" href="/contact">Contact</a></li>
</ul>

@yield('content')

@if (is_file(public_path() . '/js/all.min.js'))
    <script src="/js/all.min.{{ filemtime(public_path() . '/js/all.min.js') }}.js"></script>
@endif

</body>
</html>