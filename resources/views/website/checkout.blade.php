@extends('website.template')

@php
    $DisplayShopping = false;
    $showNavbar = false;
@endphp

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            @if(isset($error_message))
                <div class="alert alert-primary" role="alert">
                    {{ $error_message }}
                </div>
            @endif
            <section class="mt-4 mt-4">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <nav class="nav nav-pills nav-fill">
                                <a class="nav-link tab-pills " href="{{ route('cart.show') }}"><i class="bi bi-cart-check-fill m-1"></i>Carrito</a>
                                <a class="nav-link tab-pills" href="#"><i class="bi bi-receipt m-1"></i>Check Out</a>
                                <a class="nav-link tab-pills disabled" href="#"><i class="bi bi-emoji-laughing m-1"></i>Finalizar</a>
                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 col-12 order-last order-lg-first">
                                    <div class="row m-1">
                                        <h4 class="mb-3 text-primary">Direccion de Entrega</h4>
                                        <form class="needs-validation" action="{{ route('cart.finish.order') }}" method="post" >
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-sm-6">
                                                    <label for="firstName" class="form-label">Nombre</label>
                                                    <input type="text" name="firstName" class="form-control" id="firstName" placeholder="" value="{{ old('firstName') }}" >
                                                    @error('firstName')
                                                    <div class="text-danger">
                                                        <div data-field="name">* {{$message}}</div>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="lastName" class="form-label">Apellido</label>
                                                    <input type="text" name="lastname" class="form-control" id="lastName" placeholder="" value="{{ old('lastname') }}" >
                                                    @error('lastname')
                                                    <div class="text-danger">
                                                        <div data-field="name">* {{$message}}</div>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <label for="email" class="form-label">Correo electrónico</label>
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="" value="{{ old('email') }}" >
                                                    @error('email')
                                                    <div class="text-danger">
                                                        <div data-field="name">* {{$message}}</div>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="province" class="form-label">Provincia</label>
                                                    <select class="form-select"  name="province" id="province" >
                                                        <option  value="0" selected>Seleccione una Provincia</option>
                                                        @foreach($provinces as $province)
                                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="canton" class="form-label">Canton</label>
                                                    <select class="form-select" name="canton" id="canton" disabled>
                                                        <option value="0" selected>Seleccione un Canton</option>
                                                        @foreach($cantons as $canton)
                                                            <option value="{{ $canton->id }}" data-province="{{ $canton->province_id }}">{{ $canton->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="district" class="form-label">Districto</label>
                                                    <select class="form-select" name="district" id="district" disabled>
                                                        <option value="0" >Seleccione un Districto</option>
                                                        @foreach($districts as $district)
                                                            <option value="{{ $district->id }}" data-canton="{{ $district->canton_id }}">{{  $district->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('district')
                                                    <div class="text-danger">
                                                        <div data-field="name">* {{$message}}</div>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <label for="address" class="form-label">Dirección Linea 1</label>
                                                    <input type="text" class="form-control" name="address1" id="address" placeholder=""  value="{{ old('address1') }}">
                                                    @error('address1')
                                                    <div class="text-danger">
                                                        <div data-field="name">* {{$message}}</div>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <label for="address2" class="form-label">Dirección Linea 2 <span class="text-body-secondary">(Opcional)</span></label>
                                                    <input type="text" class="form-control" name="address2" id="address2" placeholder="" value="{{ old('address2') }}">
                                                </div>

                                            </div>
                                            <hr class="my-4">

                                            <h4 class="mb-3">Pago</h4>

                                            <div class="my-3">
                                                <div class="form-check">
                                                    <input id="credit" name="credit" type="radio" class="form-check-input" checked >
                                                    <label class="form-check-label"  for="credit">Tarjeta</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="cash" name="cash" type="radio" class="form-check-input" >
                                                    <label class="form-check-label" for="debit">Pago en Efectivo</label>
                                                </div>


                                            </div>
                                            <div id="hold_cart" class="row gy-2">
                                                <div class="col-md-6">
                                                    <label for="cc-name"  class="form-label">Nombre de la Tarjeta</label>
                                                    <input type="text" class="form-control" name="cc-name" id="cc-name" placeholder="" value="{{ old('cc-name') }}" >
                                                    @error('cc-name')
                                                    <div class="text-danger">
                                                        <div data-field="name">* {{$message}}</div>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="cc-number" class="form-label">Número de tarjeta</label>
                                                    <input type="text" class="form-control" name="cc-number" id="cc-number" placeholder="" value="{{ old('cc-number') }}" >
                                                    @error('cc-number')
                                                    <div class="text-danger">
                                                        <div data-field="name">* {{$message}}</div>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col-6">
                                                    <label for="cc-expiration" class="form-label">Caducidad</label>
                                                    <input type="text" class="form-control" name="cc-expiration" id="cc-expiration" placeholder="" value="{{ old('cc-expiration') }}">
                                                    <small class="text-body-secondary">El Formato es (MM/AA)</small>
                                                    @error('cc-expiration')
                                                    <div class="text-danger">
                                                        <div data-field="name">* {{$message}}</div>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class=" col-6">
                                                    <label for="cc-cvv" class="form-label">Código de tarjeta</label>
                                                    <input type="text" class="form-control" name="cc-cvv" id="cc-cvv" placeholder="" value="{{ old('cc-cvv') }}" >
                                                    @error('cc-cvv')
                                                    <div class="text-danger">
                                                        <div data-field="name">* {{$message}}</div>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <button class="w-100 btn btn-primary btn-lg" type="submit">Finalizar Compra</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="mt-5">
                                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-primary">Total del Carrito</span>
                                        </h4>
                                        <ul class="list-group mb-3">
                                            @foreach(Cart::getContent() as $row)
                                                <li class="list-group-item d-flex justify-content-between align-items-center lh-sm">
                                                    <div>
                                                        <h6 class="my-0">{{ $row->name }}</h6>
                                                        <small class="text-body-secondary">{{ $row->quantity }} X ₡{{ $row->price}}</small>
                                                    </div>
                                                    <span class="text-body-secondary ">₡{{ $row->quantity * $row->price }}</span>
                                                </li>
                                            @endforeach
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span>SubTotal </span>
                                                    <strong class="text-primary">₡{{  (Cart::getSubTotal())   }} </strong>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span>Impuestos </span>
                                                    <strong class="text-primary">₡{{  (Cart::getSubTotal() * 0.13) }} </strong>
                                                </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Total </span>
                                                <strong class="text-primary">₡{{ Cart::getSubTotal() + (Cart::getSubTotal() * 0.13) }} IVA</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ url()->previous() != url()->current() ? url()->previous() : route('cart.show') }}"> <button type="button" id="back_button" class="btn btn-link">Volver</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection

@push('page-js')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        /**
         * Jquery Mask function for Payment Format
         */
        $(document).ready(function () {
            $('#cc-number').inputmask('9999 9999 9999 9999', { 'placeholder': ' ' });

            $('#cc-expiration').inputmask('99/99', { 'placeholder': 'MM/AA' });

            $('#cc-cvv').inputmask('999', { 'placeholder': '' });
        });

        /* Start Province Canton and District Select filter */

        let district = document.getElementById('district')
        let canton = document.getElementById('canton')
        canton.addEventListener('change', ()=> {
            if(Number(canton.value) === 0){
                district.disabled = true;
                district.value = "0";
            }else{
                district.disabled = false;
                district.value = "0";
                let districtOptions = district.querySelectorAll("option");
                districtOptions.forEach((option)=> {
                    if (Number(option.getAttribute("data-canton")) !== Number(canton.value)) {
                        if(Number(option.value) !== 0){
                            option.style.display = "none";
                        }
                    }else{
                        option.style.display = "";
                    }
                });
            }
        });

        let province = document.getElementById('province')
        province.addEventListener('change', ()=> {
            if(Number(province.value) === 0){
                canton.disabled = true;
                canton.value = "0";

                district.disabled = true;
                district.value = "0";
            }else{
                canton.disabled = false;
                canton.value = "0";
                let cantonOptions = canton.querySelectorAll("option");
                cantonOptions.forEach((option)=> {
                    if (Number(option.getAttribute("data-province")) !== Number(province.value)) {
                        if(Number(option.value) !== 0){
                            option.style.display = "none";
                        }
                    }else{
                        option.style.display = "";
                    }
                });

                district.disabled = true;
                district.value = "0";
            }
        });

        /* End Province Canton and District Select filter */


        /**
         * Cart Payment Radio Button Event Listener
         *
         * @type {HTMLElement}
         */
        let credit = document.getElementById('credit');
        credit.addEventListener('change', ()=> {
            showCartPayment()
            cash.checked = false;
        });

        /**
         * Cash Payment Radio Button Event Listener
         *
         * @type {HTMLElement}
         */
        let cash = document.getElementById('cash');
        cash.addEventListener('change', ()=> {
            hideCartPayment()
            credit.checked = false;
        });

        /**
         * Hide Cart Payment Option
         *
         */
        function hideCartPayment()
        {
            document.getElementById('hold_cart').style.display = 'none';
        }

        /**
         * Show Cart Payment Option
         *
         */
        function showCartPayment(){
            document.getElementById('hold_cart').style.display = '';
        }

        /**
         * This function fill the Select Menu from Province, Canton, District.
         *
         * @param province
         * @param canton
         * @param district
         */
        function fillPCDSelected(province, canton, district){
            if(province ){
                let provinceSelector = document.getElementById('province');
                provinceSelector.value = Number(province);
                if(canton){
                    let cantonSelector = document.getElementById('canton');
                    cantonSelector.value = Number(canton)
                    cantonSelector.disabled = false;

                    let cantonOptions = cantonSelector.querySelectorAll("option");
                    cantonOptions.forEach((option)=> {
                        if (Number(option.getAttribute("data-province")) !== Number(province)) {
                            option.style.display = "none";
                        }else{
                            option.style.display = "";
                        }
                    });

                }
                if(district){
                    let districtSelector = document.getElementById('district');
                    districtSelector.value = Number(district)
                    districtSelector.disabled = false;

                    let districtOptions = districtSelector.querySelectorAll("option");
                    districtOptions.forEach((option)=> {
                        if (Number(option.getAttribute("data-canton")) !== Number(canton)) {
                            option.style.display = "none";
                        }else{
                            option.style.display = "";
                        }
                    });
                }
            }
        }

        fillPCDSelected('{{ old('province') }}', '{{ old('canton') }}', '{{ old('district') }}' )
    </script>
@endpush

