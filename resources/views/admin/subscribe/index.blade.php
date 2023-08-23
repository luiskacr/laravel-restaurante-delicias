@extends('admin.template')

@php
    $title = 'Suscripciones';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Suscripciones' => false];
@endphp


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Suscripciones</h4>
                </div>
                <div class="float-end">
                    <a class="text-white" href="{{ route('subscribe.excel') }}">
                        <button class="btn btn-success" type="button">
                            Descargar excel
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Correo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if( $subscribes->isEmpty() )
                        <tr>
                            <th colspan="2">
                                <div class="text-center">
                                    Actualmente no posee Suscripciones
                                </div>
                            </th>
                        </tr>
                    @else
                        @foreach($subscribes as $subscribe)
                            <tr class="align-middle">
                                <th>{{ $subscribe->id }}</th>
                                <th> {{ $subscribe->email }}</th>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
