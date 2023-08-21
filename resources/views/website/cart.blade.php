@extends('website.template')

@section('content')

    <div class="container">
        <div class="row mt-5 mb-5">
            <section class="mt-4 mt-4">
                <div class="container">
                    <form class="card">
                        <div class="card-header">
                            <nav class="nav nav-pills nav-fill">
                                <a class="nav-link tab-pills " href="#"><i class="bi bi-cart-check-fill m-1"></i>Carrito</a>
                                <a class="nav-link tab-pills" href="#"><i class="bi bi-receipt m-1"></i>Check Out</a>
                                <a class="nav-link tab-pills" href="#"><i class="bi bi-emoji-laughing m-1"></i>Finalizar</a>
                            </nav>
                        </div>
                        <div class="card-body">
                            @if(!Cart::isEmpty())
                                <div class="row">
                                    <div class="col-lg-8 col-12">
                                        <h4>Carrito</h4>
                                        <div class="table-responsive">
                                            <table class="table" id="basket">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Producto</th>
                                                    <th class="text-end">Precio</th>
                                                    <th>Cantidad</th>
                                                    <th class="text-end poditog">SubTotal</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(Cart::getContent() as $row)
                                                    <tr class="basket__item">
                                                        <td class="align-middle"><a href="{{ route('cart.delete', $row->id) }}"> <i class="bi bi-x" style="color: red; font-size: 1.5rem"></i></a></td>
                                                        <td class="align-middle"> <img src="{{ asset($row->attributes['image']) }}" class="img-fluid cart-img" alt="{{ $row->name }}"></td>
                                                        <td class="align-middle">{{ $row->name }}</td>
                                                        <td class="align-middle text-end price">₡{{$row->price}}</td>
                                                        <td class="align-middle count">
                                                            <div class="input-group">
                                                                <button type="button" class="btn btn-primary btn-minus">-</button>
                                                                <input min="0" type="number" value="{{ $row->quantity }}" data-price="1000" class="input form-control" disabled>
                                                                <button class="btn btn-primary btn-plus" type="button">+</button>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-end subtotal">₡{{ $row->quantity * $row->price }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 mt=lg-4">
                                        <div class="text-center">
                                            <h4>Total del Carrito</h4>
                                        </div>
                                        <hr>
                                        <div class="row justify-content-evenly">
                                            <div class="col-4">
                                                <h6>Sub Total:</h6>
                                            </div>
                                            <div class="col-4">
                                                ₡{{ Cart::getSubTotal() }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row justify-content-evenly">
                                            <div class="col-4">
                                                <h6>Total :</h6>
                                            </div>
                                            <div class="col-4">
                                                ₡{{ Cart::getSubTotal() + (Cart::getSubTotal() * 0.13) }} IVA
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <div class="">
                                        <img src="{{ asset('img/empty_car.jpg') }}" class="img-fluid" style="height: 350px" alt="">
                                        <h4>Actuamente no posee Productos en el carrito</h4>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ url()->previous() }}"> <button type="button" id="back_button" class="btn btn-link">Volver</button></a>
                                <a href="{{ !Cart::isEmpty() ? route('cart.checkout') : "#" }}" class="ms-auto" ><button type="button" id="next_button" class="btn btn-primary" {{ Cart::isEmpty() ? "disabled" : "" }}>Finalizar Compra</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>

    </div>
@endsection
