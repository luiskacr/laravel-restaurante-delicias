@extends('website.template')


@section('content')
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/comida1.jpg') }}" class="d-block w-100" alt="comida" height="600">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/comida2.jpg') }}" class="d-block w-100" alt="comida" height="600">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/comida3.jpg') }}" class="d-block w-100" alt="comida" height="600">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    <div class="container">

    </div>

@endsection
