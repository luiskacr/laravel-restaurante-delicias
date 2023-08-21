@extends('admin.template')

@php
    $title = 'Ordenes';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Ordenes' => route('orders.index'), 'Ver' => false ];
@endphp


@section('content')

    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Orden N{{ $order->id }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="g-3 " >
                <div class="row">
                    <div class="col-12">
                        <h4>Cliente</h4>
                        <hr>
                    </div>
                    <div class="col-12 col-md-4 form-group mt-3">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name"  value="{{ $order->getCliente->name }}" disabled>
                    </div>
                    <div class="col-12 col-md-4 form-group mt-3">
                        <label for="lastName">Apellido</label>
                        <input type="text" class="form-control" id="name" name="lastName"  value="{{ $order->getCliente->lastname }}" disabled>
                    </div>
                    <div class="col-12 col-md-4 form-group mt-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"  value="{{ $order->getCliente->email }}" disabled>
                    </div>
                    <div class="col-12 col-md-4 form-group mt-3">
                        <label for="province">Provincia</label>
                        <input type="text" class="form-control" id="province" name="province"  value="{{ $order->getCliente->getDistrict->canton->province->name }}" disabled>
                    </div>
                    <div class="col-12 col-md-4 form-group mt-3">
                        <label for="canton">Canton</label>
                        <input type="text" class="form-control" id="canton" name="canton"  value="{{ $order->getCliente->getDistrict->canton->name }}" disabled>
                    </div>
                    <div class="col-12 col-md-4 form-group mt-3">
                        <label for="district">Districto</label>
                        <input type="text" class="form-control" id="district" name="district"  value="{{ $order->getCliente->getDistrict->name }}" disabled>
                    </div>
                    <div class="col-12 form-group mt-3">
                        <label for="direction1">Direccion Linea 1</label>
                        <input type="text" class="form-control" id="direction1" name="direction1"  value="{{ $order->getCliente->address1}}" disabled>
                    </div>
                    <div class="col-12 form-group mt-3">
                        <label for="direction2">Direccion Linea 2</label>
                        <input type="text" class="form-control" id="direction2" name="direction2"  value="{{ $order->getCliente->address2 }}" disabled>
                    </div>

                    <div class="col-12 mt-4">
                        <h4>Orden</h4>
                        <hr>
                    </div>
                    <div class="col-12 col-md-4 form-group mt-3">
                        <label for="subtotal">SubTotal</label>
                        <input type="text" class="form-control" id="subtotal" name="subtotal"  value="₡{{ $order->subTotal }}" disabled>
                    </div>
                    <div class="col-12 col-md-4 form-group mt-3">
                        <label for="taxes">Impuestos</label>
                        <input type="text" class="form-control" id="taxes" name="taxes"  value="₡{{ $order->taxes }}" disabled>
                    </div>
                    <div class="col-12 col-md-4 form-group mt-3">
                        <label for="total">Total</label>
                        <input type="text" class="form-control" id="total" name="total"  value="₡{{ $order->total }}" disabled>
                    </div>
                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="date">Fecha</label>
                        <input type="text" class="form-control" id="date" name="date"  value="{{ \Illuminate\Support\Carbon::parse($order->date)->format('d/m/Y') }}" disabled>
                    </div>
                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="payment">Tipo de Pago</label>
                        <input type="text" class="form-control" id="payment" name="payment"  value="{{ $order->getPaymentType->name }}" disabled>
                    </div>
                    @if($order->payment_type == 1)
                        <div class="col-12 col-md-4 form-group mt-3">
                            <label for="cardName">Nombre Tarjeta</label>
                            <input type="text" class="form-control" id="cardName" name="cardName"  value="₡{{ $order->card_name }}" disabled>
                        </div>
                        <div class="col-12 col-md-4 form-group mt-3">
                            <label for="card">Tarjeta</label>
                            <input type="text" class="form-control" id="card" name="card"  value="₡{{ $order->card_number }}" disabled>
                        </div>
                        <div class="col-12 col-md-4 form-group mt-3">
                            <label for="cart_expiration">Fecha de Expiracion</label>
                            <input type="text" class="form-control" id="cart_expiration" name="cart_expiration"  value="₡{{ $order->cart_expiration }}" disabled>
                        </div>
                    @endif

                    <div class="col-12 mt-4">
                        <h4>Detalle de la Orden</h4>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderDetails as $detail)
                                        <tr>
                                            <th>{{ $detail->getProduct->name }}</th>
                                            <th>{{ $detail->quantity }}</th>
                                            <th>₡{{ $detail->price }}</th>
                                        </tr>
                                    @endforeach
                                <tbody>
                            </table>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection
