@extends('auth.template')

@section('content')
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="{{ asset('img/food_login.jpg') }}"
                         class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="{{ route('login.post') }}" method="post">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg" />
                            <label class="form-label" for="email">Correo Electronico</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" />
                            <label class="form-label" for="password">Contraseña</label>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" name="remember" type="checkbox" value="" id="remember"  />
                                <label class="form-check-label" for="remember"> Remember me </label>
                            </div>
                            <a href="#!">Forgot password?</a>
                        </div>
                        @if(Session::has('error'))
                            <div class="mb-3">
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('error')}}
                                </div>
                            </div>
                        @endif
                        @if(Session::has('status'))
                            <div class="mb-3">
                                <div class="alert alert-primary" role="alert">
                                    {{Session::get('status')}}
                                </div>
                            </div>
                        @endif
                        @if(Session::has('message'))
                            <div class="mb-3">
                                <div class="alert alert-primary" role="alert">
                                    {{Session::get('message')}}
                                </div>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>

                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection
