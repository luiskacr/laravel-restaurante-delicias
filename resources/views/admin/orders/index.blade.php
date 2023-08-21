@extends('admin.template')

@php
    $title = 'Ordenes';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Ordenes' => false];
@endphp


@section('content')

    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Ordenes</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo de Pago</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if( $orders->isEmpty() )
                        <tr>
                            <th colspan="6">
                                <div class="text-center">
                                    Actualmente no posee Ordenes
                                </div>
                            </th>
                        </tr>
                    @else
                        @foreach($orders as $order)
                            <tr class="align-middle">
                                <th>{{ $order->id }}</th>
                                <th>{{ $order->getCliente->name }}</th>
                                <th>{{ \Illuminate\Support\Carbon::parse($order->date)->format('d/m/Y') }}</th>
                                <th>{{ $order->getPaymentType->name }}</th>
                                <th>₡{{ $order->total }}</th>
                                <th>
                                    <a href="{{ route('orders.show', $order->id) }}"><button type="button" class="btn btn-primary">Ver</button></a>
                                </th>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
