@extends('admin.template')

@php
    $title = 'Productos';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Productos' => route('products.index'), 'Crear' => false ];
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

            <form class="g-3 " action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-danger">
                            <div data-field="name">* {{$message}}</div>
                        </div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="description">Descripcion</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Descripcion del Producto" value="{{ old('text') }}" >
                        @error('description')
                        <div class="text-danger">
                            <div data-field="name">* {{$message}}</div>
                        </div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="price">Precio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">₡</span>
                            </div>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" >
                        </div>
                        @error('price')
                        <div class="text-danger">
                            <div data-field="name">* {{$message}}</div>
                        </div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="category">Categoria</label>
                        <select id="category"  name="category" class="form-control">
                            <option value="0" >Favor Seleccione una Categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" >{{ $category->name  }}</option>
                            @endforeach
                        </select>

                        @error('category')
                        <div class="text-danger">
                            <div data-field="name">* {{$message}}</div>
                        </div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 form-group mt-3">
                        <div class="mb-3">
                            <label for="image" class="form-label">Fotografia</label>
                            <input class="form-control" type="file" accept="image/*" id="image" name="image">
                        </div>

                        @error('image')
                        <div class="text-danger">
                            <div data-field="name">* {{$message}}</div>
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 mt-3">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
