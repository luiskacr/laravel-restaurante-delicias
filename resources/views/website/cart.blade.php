@extends('website.template')

@php
$DisplayShopping = false;
$showNavbar = false;
@endphp

@push('page-css')
    <style>
        .input-group {
            width: 125px;
        }

        @media (max-width: 769px) {
            #basket thead {
                display: none;
            }

            .basket__item td {
                display: flex;
                width: 100%;
                justify-content: space-between;
                align-items: center;
                border: 0;
            }

            .basket__item {
                position: relative;
                border-bottom: 2px solid #ccc;
            }

            .align-middle.deleteProduct a {
                position: absolute;
                top: 40px;
                left: 5px;
            }
            .basket__item td::before {
                content: attr(data-title);
                font-weight: 700;
                margin-right: 1px;
            }
        }

    </style>
@endpush


@section('content')

    <div class="container">
        <div class="mt-5 mb-5">

            <section class="mt-4 mt-4">
                <div class="container"><div id="error-alert" style="display: none">
                        <div class="alert alert-danger mb-3" role="alert">
                            Hubo un error interno al intentar actualizar el carrito
                        </div>
                    </div>
                    <form class="card">
                        <div class="card-header">
                            <nav class="nav nav-pills nav-fill">
                                <a class="nav-link tab-pills " href="#"><i class="bi bi-cart-check-fill m-1"></i>Carrito</a>
                                <a class="nav-link tab-pills disabled" href="#"><i class="bi bi-receipt m-1"></i>Check Out</a>
                                <a class="nav-link tab-pills disabled" href="#"><i class="bi bi-emoji-laughing m-1"></i>Finalizar</a>
                            </nav>
                        </div>
                        <div class="card-body">
                            @if(!Cart::isEmpty())
                                <div class="row">
                                    <div class="col-lg-8 col-12">
                                        <h4 class="text-primary ">Carrito</h4>
                                        <div class="table-responsive">
                                            <table class="table" id="basket">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Producto</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th >SubTotal</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(Cart::getContent() as $row)
                                                    <tr class="basket__item">
                                                        <td class="align-middle deleteProduct"><a href="{{ route('cart.delete', $row->id) }}"> <i class="bi bi-x" style="color: red; font-size: 1.5rem"></i></a></td>
                                                        <td class="align-middle"> <img src="{{ asset($row->attributes['image'] != null ? $row->attributes['image'] : asset('img/default.png') ) }}" class="img-fluid cart-img" alt="{{ $row->name }}"></td>
                                                        <td class="align-middle" data-title="Nombre">{{ $row->name }}</td>
                                                        <td class="align-middle " data-title="Precio">₡{{$row->price}}</td>
                                                        <td class="align-middle count" data-title="Cantidad">
                                                            <div class="input-group">
                                                                <button type="button" onclick="subtractProduct('{{ $row->id }}', '{{ $row->quantity }}')" class="btn btn-primary btn-minus">-</button>
                                                                <input  id="product-{{ $row->id }}" value="{{ $row->quantity }}" class="input form-control text-center" disabled>
                                                                <button class="btn btn-primary btn-plus" onclick="sumProduct('{{ $row->id }}', '{{ $row->quantity }}')" type="button">+</button>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle  subtotal" data-title="Subtotal">₡{{ $row->quantity * $row->price }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 mt=lg-4">
                                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-primary">Tu Carrito</span>
                                        </h4>
                                        <ul class="list-group mb-3">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>SubTotal </span>
                                                <strong>₡{{  (Cart::getSubTotal())   }} </strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Impuestos </span>
                                                <strong>₡{{  (Cart::getSubTotal() * 0.13) }} </strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Total </span>
                                                <strong>₡{{ Cart::getSubTotal() + (Cart::getSubTotal() * 0.13) }} IVA</strong>
                                            </li>
                                        </ul>
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
                                <a href="{{  route('index')  }}"> <button type="button" id="back_button" class="btn btn-link">Volver a la tienda</button></a>
                                <a href="{{ !Cart::isEmpty() ? route('cart.checkout') : "#" }}" class="ms-auto" ><button type="button" id="next_button" class="btn btn-primary" {{ Cart::isEmpty() ? "disabled" : "" }}>Finalizar Compra</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

@endsection

@push('page-js')
    <script>
        let route = '{{ route('cart.update') }}'
        let token = '{{ csrf_token() }}'


        function sumProduct(id,quantity){
            fetch(route,{
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                credentials: "same-origin",
                body:JSON.stringify({
                    id : Number(id),
                    quantity : Number(quantity ) + 1,
                })
            }).then(result =>{
                if(result.ok){
                    //document.getElementById('product-'+id).value = Number(quantity) + 1;
                    location.reload();
                }else{
                    document.getElementById('error-alert').style.display = '';
                    sleep(5000).then(() => {
                        document.getElementById('error-alert').style.display = 'none';
                    });
                }
            })
        }

        function subtractProduct(id,quantity){
            if(Number(quantity) -1 < 1){
                let errorMessage = document.getElementById('error-alert');
                let errorMessageContainer  = document.querySelector(".alert.alert-danger");
                let oldMessage = errorMessageContainer.textContent

                errorMessageContainer.textContent = "No se puede restar mas a este producto";
                errorMessage.style.display = '';

                sleep(5000).then(() => {
                    errorMessage.style.display = 'none';
                    errorMessageContainer.textContent = oldMessage;
                });

            }else{
                fetch(route,{
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    credentials: "same-origin",
                    body:JSON.stringify({
                        id : Number(id),
                        quantity : Number(quantity ) - 1,
                    })
                }).then(result =>{
                    if(result.ok){
                        //document.getElementById('product-'+id).value = Number(quantity) - 1;
                        location.reload();
                    }else{
                        document.getElementById('error-alert').style.display = '';
                        sleep(5000).then(() => {
                            document.getElementById('error-alert').style.display = 'none';
                        });
                    }
                })
            }
        }
    </script>
@endpush
