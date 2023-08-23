@extends('website.template')

@php
    $DisplayShopping = true;
    $showNavbar = true;
@endphp

@push('page-css')
    <style>
        .avatar {
            height: 250px;
        }

        img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .start {
            color: #FFD700;
            font-size: 20px;
        }
    </style>
@endpush

@section('content')
    <img id="banner" src="{{ asset('img/menu.jpg') }}" class="img-fluid" alt="menu">
    <div class="container mb-5">
        <div class="row mt-3">
            <div class="col-12 text-center mb-4 mt-4">
                <h2 class="fs-1 fw-bold">Nuestras Categorias</h2>
            </div>
            <div class="col-12">
                <div class="d-flex flex-md-row flex-column justify-content-center" id="categoryBtn">
                    <div class="p-2 mx-auto m-md-0">
                        <button type="button" id="all" class="btn btn-primary " onclick="filterCategory(0, this)">
                            Todas las Categorias
                        </button>
                    </div>
                    @foreach($categories as $category)
                        <div class="p-2 mx-auto m-md-0">
                            <button type="button" class="btn btn-outline-primary "
                                    onclick="filterCategory({{ $category->id }}, this)">{{ $category->name }}</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-4 justify-content-center" id="products">
            @foreach($products as $product)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-3" data-category-id="{{ $product->category }}">
                    <div class="card mx-auto m-md-0" style="width: 18rem;">
                        <div class="card-body">
                            <div class="card-img-actions">
                                <a href="{{ route('product.show',$product->id ) }}">
                                    <img
                                        src="{{  $product->image != null ? asset($product->image) : asset('img/default.png')  }}"
                                        alt="{{  $product->name }}" class="avatar">
                                </a>
                            </div>
                        </div>
                        <div class="card-body bg-light text-center">
                            <div class="mb-4 " style="height: 55px">
                                <h4 class="font-weight-semibold mb-2">
                                    <a href="{{ route('product.show',$product->id ) }}"
                                       class="text-default mb-2 link-underline link-underline-opacity-0">{{ $product->name }}</a>
                                </h4>
                            </div>
                            <a href="#" class="text-muted link-underline link-underline-opacity-0"
                               data-abc="true">{{ $product->categories->name }}</a>
                            <div>
                                <i class="bi bi-star-fill start"></i><i class="bi bi-star-fill start"></i><i
                                    class="bi bi-star-fill start"></i><i class="bi bi-star-fill start"></i><i
                                    class="bi bi-star-fill start"></i>
                            </div>
                            <h3 class="mb-0 font-weight-semibold">₡{{ $product->price }}</h3>
                            <div class="text-muted mb-3">No incluye impuestos</div>
                            @if(Cart::get($product->id) == null)
                                <div class="mt-3">
                                    <form action="{{ route('cart.add') }}" method="post">
                                        @csrf
                                        <input value="{{ $product->id }}" name="id" hidden>
                                        <input value="1" name="quantity" hidden>
                                        <button type="submit" class="btn btn-primary"><i class="bi-cart-fill me-1"></i>Agregar
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="mt-3">
                                    <button type="button" class="btn btn-outline-primary" disabled>Ya esta en el
                                        carrito
                                    </button>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('website.partials.subscribe')
@endsection

@push('page-js')
    <script>
        /**
         * Filter the products depending on the category
         *
         * @param categoryId
         * @param btn
         */
        function filterCategory(categoryId, btn) {
            const products = document.querySelectorAll('.col-xl-3[data-category-id]');

            resetBtn();

            if (Number(categoryId) !== 0) {
                btn.className = 'btn btn-primary ';
                document.getElementById('all').className = 'btn btn-outline-primary';
            }

            products.forEach(product => {
                const categoryIdAttribute = Number(product.getAttribute('data-category-id'));

                if (categoryId === 0) {
                    product.style.display = 'block';
                } else if (categoryIdAttribute === Number(categoryId)) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        }

        /**
         *  Clear all Category Buttons format
         *
         */
        function resetBtn() {
            const categoryButtons = document.querySelectorAll('#categoryBtn button');

            categoryButtons.forEach(button => {
                button.id === 'all'
                    ? button.className = 'btn btn-primary '
                    : button.className = 'btn btn-outline-primary ';
            });
        }
    </script>
@endpush
