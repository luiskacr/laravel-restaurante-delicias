@extends('admin.template')

@php
    $title = 'Encuestas';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Encuestas' => false];
@endphp


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Encuestas</h4>
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
                        <th scope="col">Fecha Creación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if( $surveys->isEmpty() )
                        <tr>
                            <th colspan="5">
                                <div class="text-center">
                                    Actualmente no posee Encuestas
                                </div>
                            </th>
                        </tr>
                    @else
                        @foreach($surveys as $survey)
                            <tr class="align-middle">
                                <th>{{ $survey->id }}</th>
                                <th> {{ $survey->name }}</th>
                                <th>{{ $survey->email }}</th>
                                <th>{{ $survey->created_at }}</th>
                                <th>
                                    <div class="">
                                        <a href="{{ route('surveys.show', $survey->id) }}"><button type="button" class="btn btn-primary">Ver</button></a>
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
