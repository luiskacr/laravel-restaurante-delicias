<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="{{ asset('js/color-modes.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Admin | {{ $title }}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebars.css') }}" rel="stylesheet">
    @stack('page-css')
</head>
<body>

@include('admin.partials.theme')
@include('admin.partials.navbar')
<div class="container-fluid">
    <div class="row">
        @include('admin.partials.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="m-5">
                @include('admin.partials.breadcrumbs')
                @yield('content')
            </div>
        </main>
    </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@stack('page-scripts')
</body>
</html>
