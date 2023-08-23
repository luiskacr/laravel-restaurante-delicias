<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('css/normalize.css') }}"/>
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    @stack('page-css')
</head>
<body>

@include('website.partials.navbar')

<div class="fluid">
    @yield('content')
</div>

@include('website.partials.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('page-js')
</body>
</html>
