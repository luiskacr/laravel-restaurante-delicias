@extends('admin.template')

@php
    $title = 'Categorias';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Categorias' => route('categories.index'), 'Ver' => false ];
@endphp


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Categorias</h4>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="g-3 " >
                <div class="row">
                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" value="{{ $category->name }}" disabled>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
