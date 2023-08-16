@extends('admin.template')

@php
    $title = 'Contacto';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Contacto' => route('contact.index'), 'Ver' => false ];
@endphp


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Contacto</h4>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="g-3 " >
                <div class="row">
                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}" disabled>
                    </div>

                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="name">Correo</label>
                        <input type="text" class="form-control" id="email" name="email"  value="{{ $contact->email }}" disabled>
                    </div>

                    <div class="col-12 col-md-6 form-group mt-3">
                        <label for="name">Telefono</label>
                        <input type="text" class="form-control" id="telephone" name="telephone"  value="{{ $contact->telephone }}" disabled>
                    </div>
                    <div class="col-12 form-group mt-3">
                        <label for="name">Mensaje</label>
                        <textarea class="form-control"  id="message" style="height: 100px" disabled>{{ $contact->message }}</textarea>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
