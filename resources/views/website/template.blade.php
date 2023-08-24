<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurante Delicias</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

    <!--Metas  -->
    <meta name="description" content="Restaurante Delicias, donde la exquisitez se encuentra con la pasión culinaria.">
    <meta name="keywords" content="Palabras clave relacionadas con tu restaurante">
    <meta name="author" content="Restaurante Delicias">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="og:title" property="og:title" content="Restaurante Delicias">
    <meta name="og:description" property="og:description" content="Restaurante Delicias, donde la exquisitez se encuentra con la pasión culinaria.">
    <meta name="og:image" property="og:image" content="{{ asset('img/social-media.jpg') }}">
    <meta name="og:url" property="og:url" content="{{ request()->url() }}">
    <meta name="og:type" property="og:type" content="website">

    <!-- Bootstrap  -->
    <link rel="stylesheet" href=" {{ asset('css/normalize.css') }}"/>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
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
