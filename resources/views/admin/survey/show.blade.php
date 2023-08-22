@extends('admin.template')

@php
    $title = 'Encuestas';
    $breadcrumbs = [ 'Inicio' => route('admin.home') , 'Encuestas' => route('surveys.index'), 'Ver' => false ];
@endphp

@push('page-css')
    <style>
        .start {
            color: #FFD700;
            font-size: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="container-fluid">
                <div class="float-start">
                    <h4>Encuesta</h4>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="g-3 " >
                <div class="row">

                    <div class="col-12 col-lg-4 form-group mt-3">
                        <label for="name">Nombre Completo</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $survey->name }}" disabled>
                    </div>

                    <div class="col-12 col-lg-4 form-group mt-3">
                        <label for="date">Fecha Nacimiento</label>
                        <input type="text" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::parse($survey->date)->format('d/m/Y')}}" disabled>
                    </div>

                    <div class="col-12 col-lg-4 form-group mt-3">
                        <label for="email">Correo</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $survey->email}}" disabled>
                    </div>

                    <div class="col-12 col-lg-4 form-group mt-3">
                        <label for="place">Calificacion de Limpieza del Salon</label>
                        <div class="">
                            @for($i =1; $i <= $survey->place; $i++ )
                                <i class="bi bi-star-fill start" ></i>
                            @endfor
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 form-group mt-3">
                        <label for="clean">Calificacion de Limpieza de los Baños</label>
                        <div class="">
                            @for($i =1; $i <= $survey->clean; $i++ )
                                <i class="bi bi-star-fill start" ></i>
                            @endfor
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 form-group mt-3">
                        <label for="waitress">Calificacion del servicio de Meseros</label>
                        <div class="">
                            @for($i =1; $i <= $survey->waitress; $i++ )
                                <i class="bi bi-star-fill start" ></i>
                            @endfor
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 form-group mt-3">
                        <label for="recommendation">Nos recomendarian</label>
                        <div class="">
                            @if($survey->recommendation == 1)
                                <span class="badge text-bg-primary">Si nos recomienda</span>
                            @else
                                <span class="badge text-bg-danger">No nos recomienda</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 form-group mt-3">
                        <label for="socialMedia">Redes Sociales</label>
                        <div class="">
                            @foreach($survey->socialMedia as $social)
                                <span class="badge rounded-pill text-bg-success">{{ $social }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 form-group mt-3">
                        <label for="comments">Comentarios</label>
                        <textarea class="form-control" id="comments" name="comments" disabled>{{ $survey->comments }}</textarea>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
