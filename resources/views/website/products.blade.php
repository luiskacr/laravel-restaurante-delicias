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

    <div class="container">
        <div class="mt-3">

        </div>
        <div class="row mb-4" id="products">
            @foreach($products as $product)
                <div class="col-12 col-md-6 col-lg-4  col-xl-3 mt-3" data-product-id="{{ $product->id }}" >
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <div class="card-img-actions">
                                <a href="{{ route('product.show',$product->id ) }}">
                                    <img src="{{  $product->image != null ? asset($product->image) : asset('img/default.png')  }}" alt="{{  $product->name }}" class="avatar">
                                </a>
                            </div>
                        </div>
                        <div class="card-body bg-light text-center">
                            <div class="mb-2">
                                <h6 class="font-weight-semibold mb-2">
                                    <a href="{{ route('product.show',$product->id ) }}" class="text-default mb-2" >{{ $product->name }}</a>
                                </h6>
                                <a href="#" class="text-muted" data-abc="true">{{ $product->categories->name }}</a>
                            </div>
                            <div>
                                <i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i><i class="bi bi-star-fill start" ></i>
                            </div>
                            <h3 class="mb-0 font-weight-semibold">₡{{ $product->price }}</h3>
                            <div class="text-muted mb-3">No incluye impuestos</div>
                            @if(Cart::get($product->id) == null)
                                <div class="mt-3">
                                    <form action="{{ route('cart.add') }}" method="post" >
                                        @csrf
                                        <input value="{{ $product->id }}" name="id" hidden>
                                        <input value="1" name="quantity" hidden>
                                        <button type="submit" class="btn btn-primary"><i class="bi-cart-fill me-1"></i>Agregar</button>
                                    </form>
                                </div>
                            @else
                                <div class="mt-3">
                                    <button type="button" class="btn btn-outline-primary" disabled>Ya esta en el carrito</button>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>


@endsection
