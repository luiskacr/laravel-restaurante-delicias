@extends('admin.template')

@php
    $title = 'Contacto';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Contacto' => false];
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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if( $contacts->isEmpty() )
                        <tr>
                            <th colspan="4">
                                <div class="text-center">
                                    Actualmente no posee Mensajes de Contacto
                                </div>
                            </th>
                        </tr>
                    @else
                        @foreach($contacts as $contact)
                            <tr class="align-middle">
                                <th>{{ $contact->id }}</th>
                                <th>{{ $contact->name }}</th>
                                <th>{{ $contact->email }}</th>
                                <th>
                                    <div class="">
                                        <a href="{{ route('contact.show', $contact->id) }}"><button type="button" class="btn btn-primary">Ver</button></a>
                                        <button type="button"  onclick="del('{{ route('contact.destroy',$contact->id) }}')" class="btn btn-danger">Eliminar</button>
                                    </div>
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

@include('admin.partials.delete')
