@extends('website.template')

@php
    $DisplayShopping = true;
    $showNavbar = true;
@endphp

@push('page-css')
    <style>
        input[type="number"]
        {
            -webkit-appearance: textfield !important;
            margin: 0;
            -moz-appearance:textfield !important;
        }

        .avatar {
            height: 250px;
        }

        img{
            object-fit: cover;
            width:100%;
            height:100%;
        }
        .start {
            color: #FFD700;
            font-size: 20px;
        }
        .recommendation{
            height: 200px;
            background-blend-mode: multiply;
        }

    </style>
@endpush

@section('content')
    <div class="container px-4 px-lg-5">
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center ">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{  $product->image != null ? asset($product->image) : asset('img/default.png')  }}" alt="{{ $product->name }}" /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: {{ $product->id }}</div>
                        <h1 class="display-5 fw-bolder text-primary">{{ $product->name }}</h1>
                        <div>
                            <i class="bi bi-star-fill start"></i><i class="bi bi-star-fill start"></i><i
                                class="bi bi-star-fill start"></i><i class="bi bi-star-fill start"></i><i
                                class="bi bi-star-fill start"></i>
                        </div>
                        <div class="fs-3 mb-5">
{{--                            <span class="text-decoration-line-through">$45.00</span>--}}
                            <span>₡{{ $product->price }}</span>
                        </div>
                        <p class="lead">{{ $product->description }}</p>
                        @if(Cart::get($product->id) == null)
                            <div>
                                <form action="{{ route('cart.add') }}" method="post" >
                                    @csrf
                                    <input value="{{ $product->id }}" name="id" hidden>
                                    <div class="d-inline-flex" style="width: 30%; height: 50%; margin-left: 1px">
                                        <button type="button" onclick="subtractProduct()" class="btn btn-primary btn-minus">-</button>
                                        <input  id="quantity" name="quantity" type="number" value="1" min="1" class="form-control text-center disabled" />
                                        <button class="btn btn-primary btn-plus" onclick="addProduct()" type="button">+</button>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary mt-4">
                                        <i class="bi-cart-fill me-1"></i>
                                        Agregar
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="d-flex mt-3">
                                <a href="{{ route('cart.delete', $product->id ) }}">
                                    <button type="button" class="btn btn-outline-primary" >Eliminar el producto del Carrito</button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            @if(!$relates->isEmpty())
                <h2 class="fw-bolder mb-4 text-primary">Productos relacionados</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($relates as $related)
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-3" data-category-id="{{ $related->category }}">
                            <div class="card mx-auto m-md-0" style="width: 18rem;">
                                <div class="card-body">
                                    <div class="card-img-actions">
                                        <a href="{{ route('product.show',$related->id ) }}">
                                            <img
                                                src="{{  $related->image != null ? asset($related->image) : asset('img/default.png')  }}"
                                                alt="{{  $related->name }}" class="avatar">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-4 " style="height: 55px">
                                        <h4 class="font-weight-semibold mb-2">
                                            <a href="{{ route('product.show',$related->id ) }}"
                                               class="text-default mb-2 link-underline link-underline-opacity-0">{{ $related->name }}</a>
                                        </h4>
                                    </div>
                                    <a href="#" class="text-muted link-underline link-underline-opacity-0"
                                       data-abc="true">{{ $related->categories->name }}</a>
                                    <div>
                                        <i class="bi bi-star-fill start"></i><i class="bi bi-star-fill start"></i><i
                                            class="bi bi-star-fill start"></i><i class="bi bi-star-fill start"></i><i
                                            class="bi bi-star-fill start"></i>
                                    </div>
                                    <h3 class="mb-0 font-weight-semibold">₡{{ $related->price }}</h3>
                                    <div class="text-muted mb-3">No incluye impuestos</div>
                                    @if(Cart::get($related->id) == null)
                                        <div class="mt-3">
                                            <form action="{{ route('cart.add') }}" method="post">
                                                @csrf
                                                <input value="{{ $related->id }}" name="id" hidden>
                                                <input value="1" name="quantity" hidden>
                                                <button type="submit" class="btn btn-primary"><i class="bi-cart-fill me-1"></i>Agregar
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="mt-3">
                                            <a href="{{ route('cart.delete', $related->id ) }}">
                                                <button type="button" class="btn btn-outline-primary" >Eliminar del carrito</button>
                                            </a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-12 mb-5">
                    <div class="text-center">
                        <h3 class="fs-2 fw-bold text-primary">No hay productos relacionados</h3>
                    </div>
                </div>
            @endif

        </div>
    </section>
    @include('website.partials.map')
@endsection

@push('page-js')
    <script>
        /**
         * Add product on the input field
         *
         */
        function addProduct(){
            let input = document.getElementById('quantity');

            if(Number(input.value) < 1){
                input.value = 1;
            }else{
                input.value = Number(input.value) + 1;
            }
        }

        /**
         * Subtract product on the input field
         *
         */
        function subtractProduct(){
            let input = document.getElementById('quantity');

            if(Number(input.value) < 1){
                input.value = 1;
            }else if(Number(input.value) -1 < 1){
                input.value = 1;
            }else{
                input.value = Number(input.value) - 1;
            }
        }
    </script>
@endpush
