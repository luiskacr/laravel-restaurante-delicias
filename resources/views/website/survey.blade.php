@extends('website.template')

@php
    $DisplayShopping = true;
    $showNavbar = true;
@endphp

@push('page-css')
    <style>
        .start {
            color: #FFD700;
            font-size: 20px;
        }
        img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@endpush

@section('content')
    <img id="banner" src="{{ asset('img/bar.jpg') }}" class="img-fluid" alt="menu">
    <div class="container mt-5 mb-5">
        @if (session('success_message'))
            <div class="alert alert-primary" role="alert">
                {{ session('success_message') }}
            </div>
        @endif

            @if (session('error_message'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error_message') }}
                </div>
            @endif

        <h1 class="mb-4 fs-1 fw-bold text-primary">Formulario de Encuesta</h1>
            <p >Completa la encuesta y participa en 1 cena para 2 personas</p>
        <form action="{{ route('survey.create') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre y Apellidos:</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}" >
                @error('name')
                <div class="text-danger">
                    <div data-field="name">* {{$message}}</div>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="birthday" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="birthday" name="birthday"  value="{{ old('birthday') }}" >
                @error('birthday')
                <div class="text-danger">
                    <div data-field="name">* {{$message}}</div>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electronico:</label>
                <input type="text" class="form-control" id="email" name="email"  value="{{ old('email') }}" >
                @error('email')
                <div class="text-danger">
                    <div data-field="name">* {{$message}}</div>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <p>Como es la limpieza del Salon </p>
                <div class="d-flex flex-column flex-md-row flex-wrap column-gap-3 row-gap-1">
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input" type="radio" name="place" value="1" {{ old('place') == 1 ? 'checked' : '' }}>
                        <label  for="radio" ><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2  align-items-center ">
                        <input class="form-check-input " type="radio" name="place" value="2" {{ old('place') == 2 ? 'checked' : '' }}>
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2  align-items-center ">
                        <input class="form-check-input " type="radio" name="place" value="3" {{ old('place') == 3 ? 'checked' : '' }}>
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2  align-items-center ">
                        <input class="form-check-input " type="radio" name="place" value="4" {{ old('place') == 4 ? 'checked' : '' }}>
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2  align-items-center ">
                        <input class="form-check-input " type="radio" name="place" value="5" {{ old('place') == 5 ? 'checked' : '' }}>
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                </div>

                @error('place')
                <div class="text-danger">
                    <div data-field="name">* {{$message}}</div>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <p>Como es la limpieza de los Baños </p>
                <div class="d-flex flex-column flex-md-row flex-wrap column-gap-3 row-gap-1">
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input" type="radio" name="clean" value="1" {{ old('clean') == 1 ? 'checked' : '' }} >
                        <label for="radio"><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input" type="radio" name="clean" value="2" {{ old('clean') == 2 ? 'checked' : '' }}>
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input " type="radio" name="clean" value="3" {{ old('clean') == 3 ? 'checked' : '' }}>
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input " type="radio" name="clean" value="4" {{ old('clean') == 4 ? 'checked' : '' }}>
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input " type="radio" name="clean" value="5" {{ old('clean') == 5 ? 'checked' : '' }}>
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                </div>

                @error('clean')
                <div class="text-danger">
                    <div data-field="name">* {{$message}}</div>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <p>Como fue el servicio de nuestros meseros</p>
                <div class="d-flex flex-column flex-md-row flex-wrap column-gap-3 row-gap-1">
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input" type="radio" name="waitress" value="1" {{ old('waitress') == 1 ? 'checked' : '' }} >
                        <label for="radio"><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input " type="radio" name="waitress" value="2" {{ old('waitress') == 2 ? 'checked' : '' }} >
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input " type="radio" name="waitress" value="3" {{ old('waitress') == 3 ? 'checked' : '' }} >
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input " type="radio" name="waitress" value="4" {{ old('waitress') == 4 ? 'checked' : '' }} >
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                    <div class="d-flex gap-2 align-items-center ">
                        <input class="form-check-input " type="radio" name="waitress" value="5" {{ old('waitress') == 5 ? 'checked' : '' }} >
                        <label><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i></label>
                    </div>
                </div>
                @error('waitress')
                <div class="text-danger">
                    <div data-field="name">* {{$message}}</div>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <p>Nos recomendaría con sus amigos</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="recommendation" value="yes" id="recommendation-yes"  {{ old('recommendation') == 'yes' ? 'checked': '' }}>
                    <label class="form-check-label" for="recommendation-yes">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="recommendation" value="no" id="recommendation-no" {{ old('recommendation') == 'no' ? 'checked': '' }}>
                    <label class="form-check-label" for="recommendation-no">
                        No
                    </label>
                </div>
                @error('recommendation')
                <div class="text-danger">
                    <div data-field="place">* {{$message}}</div>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <p>Que Redes Sociales Utilizas</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="socialMedia-Facebook" value="Facebook" id="Facebook" {{ old('socialMedia-Facebook') != null ? 'checked': '' }} >
                    <label class="form-check-label" for="Facebook">
                        Facebook
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="socialMedia-Twitter" value="Twitter" id="Twitter" {{ old('socialMedia-Twitter') != null ? 'checked': '' }}>
                    <label class="form-check-label" for="Twitter">
                        Twitter
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="socialMedia-Instagram" value="Instagram" id="Instagram" {{ old('socialMedia-Instagram') != null ? 'checked': '' }}>
                    <label class="form-check-label" for="Instagram">
                        Instagram
                    </label>
                </div>
                @error('socialMedia')
                <div class="text-danger">
                    <div data-field="place">* {{$message}}</div>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="comments" class="form-label">Comentarios, Preguntas o Sugerencias</label>
                <textarea class="form-control" id="comments" name="comments" rows="4">{{ old('comments') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

    </div>
    @include('website.partials.map')

@endsection
