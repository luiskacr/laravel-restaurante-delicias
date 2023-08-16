@extends('admin.template')

@php
    $title = 'Categorias';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Categorias' => false];
@endphp


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Categorias</h4>
                </div>
                <div class="float-end">
                    <a class="text-white" href="{{ route('categories.create') }}">
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if( $categories->isEmpty() )
                        <tr>
                            <th colspan="3">
                                <div class="text-center">
                                    Actualmente no posee Categorias
                                </div>
                            </th>
                        </tr>
                    @else
                        @foreach($categories as $category)
                            <tr class="align-middle">
                                <th>{{ $category->id }}</th>
                                <th>{{ $category->name }}</th>
                                <th>
                                    <div class="">
                                        <a href="{{ route('categories.show', $category->id) }}"><button type="button" class="btn btn-primary">Ver</button></a>
                                        <a href="{{ route('categories.edit', $category->id) }}"><button type="button" class="btn btn-success">Editar</button></a>
                                        <button type="button"  onclick="del('{{ route('categories.destroy',$category->id) }}')" class="btn btn-danger">Eliminar</button>
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
