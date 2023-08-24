
<nav class="navbar sticky-top navbar-expand-lg " >
    <div class="container-fluid" >
        @if($showNavbar)
            <a class="navbar-brand ms-4" href="{{ route('index') }}"><img src="{{ asset('img/logo.webp') }}" alt="logo" style="height: 60px" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse p-md-2 p-lg-4" id="navbarNav" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('website.products') }}">Menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('website.contact') }}">Contacto</a>
                    </li>
                </ul>
                @if($DisplayShopping)
                    <div class="ms-auto">
                        <div class="dropdown me-2 me-lg-5 ">
                            <a class="position-relative cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                               aria-controls="offcanvasRight">
                                <i class="bi bi-cart-fill" style="font-size: 1.8rem;"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ Cart::getTotalQuantity() }}</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        @else
            <div class="mx-auto p-md-2 p-lg-4">
                <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('img/logo.webp') }}" alt="logo" style="height: 80px" /></a>
            </div>
        @endif
    </div>

</nav>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h4 class="offcanvas-title fw-bold mb-4 text-primary" id="offcanvasRightLabel">Carrito de Compras</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        @if(!Cart::isEmpty())
            @foreach(Cart::getContent() as $row)
                <div class="mb-2">
                    <div class="row g-0">
                        <div class="col-1">
                            <a href="{{ route('cart.delete', $row->id) }}"> <i class="bi bi-x" style="color: red; font-size: 1.5rem"></i></a>
                        </div>
                        <div class="col-4">
                            <img src="{{ asset($row->attributes['image'] != null ? $row->attributes['image'] : asset('img/default.png') ) }}" class="img-fluid cart-img"
                                 alt="{{ $row->name }}">
                        </div>
                        <div class="col-7">
                            <div class="m-2">
                                <h5 class="fs-5 fw-bold">{{ $row->name }}</h5>
                                <p class="card-text">{{ $row->quantity }} X ₡{{$row->price}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach

            <div class="mb-2">
                <h4 class="text-primary">SubTotal: ₡{{ Cart::getSubTotal() }}</h4>
                <div class="mt-4">
                    <a href="{{ route('cart.show') }}" class="link-offset-2 link-underline link-underline-opacity-0 ">
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary">Ver carrito</button>
                        </div>
                    </a>
                </div>
            </div>
        @else
            <div class="text-center"><h6> Actualmente no posee productos en su carrito</h6></div>
        @endif

    </div>
</div>
