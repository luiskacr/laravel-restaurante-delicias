@extends('admin.template')

@php
    $title = 'Categorias';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Categorías' => route('categories.index'), 'Editar' => false ];
@endphp


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Categorías</h4>
                </div>
            </div>
        </div>
        <div class="card-body">

            <form class="g-3 " action="{{ route('categories.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="{{ $category->name }}" >
                        @error('name')
                        <div class="text-danger">
                            <div data-field="name">* {{$message}}</div>
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="col-6 mt-3">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
