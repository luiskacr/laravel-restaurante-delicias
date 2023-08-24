@extends('admin.template')

@php
    $title = 'Productos';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Productos' => false];
@endphp


@section('content')
    <style>
        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Productos</h4>
                </div>
                <div class="float-end">
                    <a class="text-white" href="{{ route('products.create') }}">
                        <button class="btn btn-primary" type="button">
                            Crear
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $products->isEmpty() )
                            <tr>
                                <th colspan="6">
                                    <div class="text-center">
                                        Actualmente no posee Productos
                                    </div>
                                </th>
                            </tr>
                        @else
                            @foreach($products as $product)
                                <tr class="align-middle">
                                    <th>{{ $product->id }}</th>
                                    <th> <img src="{{  $product->image != null ? asset($product->image) : asset('img/default.png')  }}" alt="{{  $product->name }}" class="avatar"> </th>
                                    <th>{{ $product->name }}</th>
                                    <th>{{ $product->description }}</th>
                                    <th>₡{{ $product->price }}</th>
                                    <th>
                                        <div class="">
                                            <a href="{{ route('products.show', $product->id) }}"><button type="button" class="btn btn-primary">Ver</button></a>
                                            <a href="{{ route('products.edit', $product->id) }}"><button type="button" class="btn btn-success">Editar</button></a>
                                            <button type="button"  onclick="del('{{ route('products.destroy',$product->id) }}')" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@include('admin.partials.delete')
