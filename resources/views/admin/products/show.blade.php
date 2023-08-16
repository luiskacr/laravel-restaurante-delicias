@extends('admin.template')

@php
    $title = 'Productos';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Productos' => route('products.index'), 'Ver' => false ];
@endphp


@section('content')

    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Productos</h4>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="g-3 " >
                <div class="row">
                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="{{ $product->name }}" disabled>
                    </div>

                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="description">Descripcion</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Descripcion del Producto" value="{{ $product->description }}" disabled >
                    </div>

                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="price">Precio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">₡</span>
                            </div>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" disabled >
                        </div>
                    </div>
                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="description">Categoria</label>
                        <input type="text" class="form-control" id="description" name="description"  value="{{ $product->categories->name }}" disabled >
                    </div>
                    @if($product->image != null)
                        <div class="col-12 col-md-6 form-group mt-3">
                            <label for="description">Imagen</label>
                            <br>
                            <img src="{{ asset($product->image) }}"  class="rounded img-thumbnail" style="height: 400px" alt="{{ $product->name  }}">
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
