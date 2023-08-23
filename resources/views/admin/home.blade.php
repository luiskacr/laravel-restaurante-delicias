@extends('admin.template')

@php
    $title = 'Inicio';
    $breadcrumbs = [ 'Inicio' => false ];
@endphp


@section('content')
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">¡Bienvenido al Panel de Administración del Restaurante!</h1>
            <p class="col-md-8 fs-4">Estás a punto de tener un gran impacto en la experiencia de nuestros clientes. Aquí puedes gestionar y actualizar el menú, supervisar los pedidos, ver las reseñas y mucho más. Tu contribución es fundamental para mantener nuestro restaurante en la cima.</p>
        </div>
    </div>
    <div class="">
        <div class="row mt-5 justify-content-center">
            <div class="col-4 mt-3">
                <div class="card border-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Productos</h5>
                        <p class="card-text">Total: {{ \App\Models\Product::all()->count() }}</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary"><button type="button" class="btn btn-primary">Ir a los Productos</button></a>
                    </div>
                </div>

            </div>
            <div class="col-4 mt-3">
                <div class="card border-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Categorias</h5>
                        <p class="card-text">Total: {{ \App\Models\Category::all()->count() }}</p>
                        <a href="{{ route('categories.index') }}" class="btn btn-primary"><button type="button" class="btn btn-primary">Ir a las Categorias</button></a>
                    </div>
                </div>
            </div>
            <div class="col-4 mt-3">
                <div class="card border-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Ordenes</h5>
                        <p class="card-text">Total: {{ \App\Models\Order::all()->count() }}</p>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary"><button type="button" class="btn btn-primary">Ir a las Ordenes</button></a>
                    </div>
                </div>
            </div>
            <div class="col-4 mt-3">
                <div class="card border-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Encuestas</h5>
                        <p class="card-text">Total: {{ \App\Models\Survey::all()->count() }}</p>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary"><button type="button" class="btn btn-primary">Ir a las Encuestas</button></a>
                    </div>
                </div>
            </div>
            <div class="col-4 mt-3">
                <div class="card border-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Contacto</h5>
                        <p class="card-text">Total: {{ \App\Models\Contact::all()->count() }}</p>
                        <a href="{{ route('contact.index') }}" class="btn btn-primary"><button type="button" class="btn btn-primary">Ir a los Contactos</button></a>
                    </div>
                </div>
            </div>
            <div class="col-4 mt-3">
                <div class="card border-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Subscripciones</h5>
                        <p class="card-text">Total: {{ \App\Models\Subscribe::all()->count() }}</p>
                        <a href="{{ route('subscribe.index') }}" class="btn btn-primary"><button type="button" class="btn btn-primary">Ir a las Subscripciones</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
