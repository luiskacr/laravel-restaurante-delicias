@extends('website.template')

@php
    $DisplayShopping = true;
    $showNavbar = true;
@endphp

@push('page-css')
    <style>
        .features-icons .features-icons-item .features-icons-icon i {
            font-size: 4.5rem;
        }
        .features-icons {
            padding-top: 7rem;
            padding-bottom: 7rem;
        }
        .showcase .showcase-img {
            min-height: 30rem;
            background-size: cover;
        }
        .showcase .showcase-text {
            padding: 5rem;
        }
        @media (min-width: 768px){
            .showcase .showcase-text {
                padding: 7rem;
            }
        }
        .testimonials {
            padding-top: 7rem;
            padding-bottom: 7rem;
        }
        .testimonials .testimonial-item {
            max-width: 18rem;
        }
        .testimonials .testimonial-item img {
            max-width: 12rem;
            box-shadow: 0px 5px 5px 0px #adb5bd;
        }
        #hero {
            width: 100%;
            height: 50vh;
            background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)), url('{{ asset('img/restaurant1.jpg') }}') top center;
            background-size: cover;
            position: relative;
            color: white;

        }
        @media (min-width: 576px) {
            #hero {
                height: 80vh;
            }
        }

        @media (min-width: 768px) {
            #hero {
                height: 70vh;
            }
        }


    </style>
@endpush

@section('content')
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative">
            <h1>Bienvenido a Nuestro Restaurante</h1>
            <h2>Descubre Nuestros Deliciosos Platos</h2>
            <a href="{{ route('website.products') }}" class="btn-get-started"><button type="button" class="btn btn-outline-light btn-lg">Ver el Menu</button></a>
        </div>

    </section>

    <main id="main">
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-cup m-auto text-primary"></i></div>
                            <h3>Exquisita Cocina</h3>
                            <p class="lead mb-0">Disfruta de nuestra deliciosa y auténtica comida que te dejará con ganas de más.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-people m-auto text-primary"></i></div>
                            <h3>Atención Personalizada</h3>
                            <p class="lead mb-0">Nuestro equipo está comprometido en brindarte una experiencia única y memorable.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-heart m-auto text-primary"></i></div>
                            <h3>Ambiente Acogedor</h3>
                            <p class="lead mb-0">Relájate y disfruta de nuestro restaurante con un ambiente cálido y acogedor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset('img/culinary.jpg') }}'); background-size: cover; "></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Experiencia Culinaría de Clase Mundial</h2>
                    <p class="lead mb-0">Descubre una experiencia gastronómica que despierta tus sentidos y te transporta a un mundo de sabores excepcionales. 🍽️✨</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{ asset('img/relax.jpg') }}')"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Ambiente Encantador y Relajado</h2>
                    <p class="lead mb-0">Sumérgete en un entorno acogedor y relajante que te invita a disfrutar de momentos especiales con tus seres queridos. 🕯️🌿</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset('img/clean.jpg') }}')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Limpieza e Higiene de Primer Nivel</h2>
                    <p class="lead mb-0">Tu salud y seguridad son nuestra prioridad. Cumplimos con los más altos estándares de limpieza e higiene. 🧼🧽</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials-->
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5 fw-bold">Nuestro Equipo</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Chef Margaret" />
                        <h5>Chef Margaret E.</h5>
                        <p class="font-weight-light mb-0">"Preparamos platos deliciosos para satisfacer tu paladar y crear momentos inolvidables."</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Chef Fred" />
                        <h5>Chef Fred S.</h5>
                        <p class="font-weight-light mb-0">"Nuestra pasión es crear experiencias culinarias únicas que deleiten tus sentidos."</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Chef Sarah" />
                        <h5>Chef Sarah W.</h5>
                        <p class="font-weight-light mb-0">"Nos enorgullece ofrecer los sabores más auténticos y deliciosos en cada plato que servimos."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('website.partials.subscribe')
@endsection
