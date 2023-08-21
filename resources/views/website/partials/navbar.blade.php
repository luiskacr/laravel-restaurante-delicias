
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('index') }}">Restaurante</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('website.products') }}">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('website.contact') }}">Contacto</a>
          </li>
        </ul>
      </div>
        <div class="dropdown me-2 me-md-5 ">
            <a class="position-relative cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="bi bi-cart-fill" style="font-size: 1.5rem;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ Cart::getTotalQuantity() }}</span>
            </a>
        </div>

    </div>
  </nav>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h4 class="offcanvas-title fw-bold mb-4" id="offcanvasRightLabel">Carrito de Compras</h4>
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
                            <img src="{{ asset($row->attributes['image']) }}" class="img-fluid cart-img" alt="{{ $row->name }}">
                        </div>
                        <div class="col-7">
                            <div class="m-2">
                                <h5 class="h5">{{ $row->name }}</h5>
                                <p class="card-text">{{ $row->quantity }} X ₡{{$row->price}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach

            <div class="mb-2">
                <h4>Sub Total: ₡{{ Cart::getSubTotal() }}</h4>
                <div class="mt-4">
                    <a href="{{ route('cart.show') }}" class="link-offset-2 link-underline link-underline-opacity-0 ">
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-secondary">Ver carrito</button>
                        </div>
                    </a>
                </div>
            </div>
        @else
            <div class="text-center"><h6> Actualmente no posee productos en su carrito</h6></div>
        @endif

    </div>
</div>
