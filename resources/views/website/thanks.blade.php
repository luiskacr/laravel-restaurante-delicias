@extends('website.template')

@php
    $DisplayShopping = false
@endphp

@push('page-css')
    <style>
        #total {
            border-top: solid;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <section class="mt-4 mt-4">
                <div class="container">
                    <form class="card">
                        <div class="card-header">
                            <nav class="nav nav-pills nav-fill">
                                <a class="nav-link tab-pills disabled" href="#"><i class="bi bi-cart-check-fill m-1"></i>Carrito</a>
                                <a class="nav-link tab-pills disabled" href="#"><i class="bi bi-receipt m-1"></i>Check Out</a>
                                <a class="nav-link tab-pills" href="#"><i class="bi bi-emoji-laughing m-1"></i>Finalizar</a>
                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="text-center">
                                    <h2>Muchas Gracias por su compra</h2>
                                    <img src="{{ asset('img/thanks.jpg') }}" class="img-fluid" style="height: 200px" alt="">
                                    <div class="d-flex justify-content-between mt-3 ">
                                        <h5>
                                            <span class="fw-bold">Orden: N{{ $order->id }}</span>
                                            <span class="fw-bold">|</span>
                                            <span class="fw-bold">Fecha: {{ \Carbon\Carbon::parse($order->date)->format('d/m/Y') }}</span>
                                            <span class="fw-bold">|</span>
                                            <span class="fw-bold">Total: ₡{{ $order->total }}</span>
                                            <span class="fw-bold">|</span>
                                            <span class="fw-bold">Metodo de Pago: {{ $order->getPaymentType->name }}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-3 p-lg-5">
                                <h4>Detalle de la Order</h4>
                                <div class="table-responsive">
                                    <table class="table table-borderless p-lg-5" >
                                        <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th class="text-end poditog">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orderDetails as $orderDetail)
                                            <tr>
                                                <th>{{ $orderDetail->getProduct->name }}</th>
                                                <th class="text-end poditog">₡{{ $orderDetail->price }}</th>
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <th>SubTotal</th>
                                                <th class="text-end poditog">₡{{ $order->subTotal }}</th>
                                            </tr>
                                            <tr>
                                                <th>Impuestos</th>
                                                <th class="text-end poditog">₡{{ $order->taxes }}</th>
                                            </tr>
                                        </tbody>
                                        <tfoot id="total">
                                            <tr>
                                                <th>Total</th>
                                                <th class="text-end poditog">₡{{ $order->total }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('index') }}"> <button type="button" id="back_button" class="btn btn-link">Volver a la tienda</button></a>
                                <a href="#" class="ms-auto" ><button type="button" id="next_button" class="btn btn-primary" >Realizar Encuesta</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>

    </div>
@endsection
