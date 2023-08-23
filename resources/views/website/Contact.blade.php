@extends('website.template')

@php
    $DisplayShopping = true;
    $showNavbar = true;
@endphp

@push('page-css')
    <style>
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
        <h1 class="mb-4 fs-1 fw-bold">Formulario de Contacto</h1>
        <form class="m-3 m-md-0" action="{{ route('website.contact.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}" >
                @error('name')
                <div class="text-danger">
                    <div data-field="name">* {{$message}}</div>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" >
                @error('email')
                <div class="text-danger">
                    <div data-field="name">* {{$message}}</div>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Teléfono:</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" >
                @error('telephone')
                <div class="text-danger">
                    <div data-field="name">* {{$message}}</div>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Mensaje:</label>
                <textarea class="form-control" id="message" name="message" rows="4" >{{  old('message') }}</textarea>
                @error('message')
                    <div class="text-danger">
                        <div data-field="name">* {{$message}}</div>
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    @include('website.partials.map')
@endsection
