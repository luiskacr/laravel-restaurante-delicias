@extends('website.template')

@php
    $DisplayShopping = true
@endphp

@push('page-css')
    <style>
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
    </style>
@endpush

@section('content')
    <div class="container px-4 px-lg-5">
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{  $product->image != null ? asset($product->image) : asset('img/default.png')  }}" alt="{{ $product->name }}" /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: {{ $product->id }}</div>
                        <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                        <div class="fs-5 mb-5">
{{--                            <span class="text-decoration-line-through">$45.00</span>--}}
                            <span>₡{{ $product->price }}</span>
                        </div>
                        <p class="lead">{{ $product->description }}</p>
                        @if(Cart::get($product->id) == null)
                            <div >
                                <form action="{{ route('cart.add') }}" method="post" >
                                    @csrf
                                    <input value="{{ $product->id }}" name="id" hidden>
                                    <div class="d-flex">
                                        <input class="form-control text-center me-3" id="quantity" name="quantity" type="num" value="1" style="max-width: 3rem" />
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi-cart-fill me-1"></i>
                                            Agregar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="d-flex mt-3">
                                <button type="button" class="btn btn-outline-primary" disabled>Ya esta en el carrito</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Productos relacionados</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @if(!$relates->isEmpty())
                    @foreach($relates as $related)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{  $related->image != null ? asset($related->image) : asset('img/default.png')  }}" alt="{{ $related->name }}" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $related->name }}</h5>
                                        <!-- Product price-->
                                        ₡{{ $related->price }}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    @if(Cart::get($related->id) == null)
                                        <div class="d-flex">
                                            <form action="{{ route('cart.add') }}" method="post" >
                                                @csrf
                                                <input value="{{ $related->id }}" name="id" hidden>
                                                <div class="d-flex">
                                                    <input value="1" name="quantity" hidden>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bi-cart-fill me-1"></i>
                                                        Agregar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    @else
                                        <div class="d-flex mt-3">
                                            <button type="button" class="btn btn-outline-primary" disabled>Ya esta en el carrito</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex">
                        <img class="" src="{{  asset('img/default.png')  }}" alt="" />
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
