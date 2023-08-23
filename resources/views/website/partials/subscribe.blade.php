@push('page-css')
    <style>
        .call-to-action {
            position: relative;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url("{{ asset('img/restaurant2.jpg') }}") no-repeat center center;
            background-size: cover;
            padding-top: 7rem;
            padding-bottom: 7rem;
        }
    </style>
@endpush


<section class="call-to-action text-white text-center" id="signup">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <h2 class="mb-4">Recibe ofertas exclusivas, noticias sobre nosotros y más al suscribirte.!</h2>
                <div class="form-subscribe" >
                    <div class="row">
                        <div class="col">
                            <input class="form-control form-control-lg" id="emailAddressSubscribe" type="email"  placeholder="Correo Electronico"  />
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary btn-lg disabled" onclick="sendSubscribe()" id="submitButton" >Enviar</button>
                        </div>
                        <div class="col-12 mt-4">
                            <div id="sendSubscribeSuccess" class="alert alert-primary alert-dismissible fade show" role="alert" style="display: none">
                                Muchas Gracias por Subscribirse!
                            </div>
                        </div>
                        <div class="col-12 mt-1">
                            <div id="sendSubscribeInfo" class="alert alert-info alert-dismissible fade show" role="alert" style="display: none">
                                Este Correo ya se encuentra Subscrito
                            </div>
                        </div>
                        <div class="col-12 mt-1">
                        <div id="sendSubscribeWarning" class="alert alert-warning alert-dismissible fade show" role="alert" style="display: none">
                            Este información no corresponde a un correo.
                        </div>
                    </div>
                        <div class="col-12 mt-1">
                            <div id="sendSubscribeError" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none">
                                Hubo un error interno al intentar Subscribirse!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@push('page-js')
    <script>
        let route = '{{ route('subscribe.create') }}'
        let token = '{{ csrf_token() }}'

        let emailInput = document.getElementById('emailAddressSubscribe')
        emailInput.addEventListener('input', ()=> {
           let value = document.getElementById('emailAddressSubscribe').value
            console.log(value, value.length)
            if(value.length === 0){
                document.getElementById('submitButton').className = 'btn btn-primary btn-lg disabled';
            }else{
                document.getElementById('submitButton').className = 'btn btn-primary btn-lg';
            }
        })


        function sendSubscribe(){
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
                    email: document.getElementById('emailAddressSubscribe').value
                })
            }).then(result =>{
                if(result.ok){
                    document.getElementById('sendSubscribeSuccess').style.display = '';
                    sleep(5000).then(() => {
                        document.getElementById('sendSubscribeSuccess').style.display = 'none';
                    });
                }else if(result.status === 500){
                    document.getElementById('sendSubscribeError').style.display = '';
                    sleep(5000).then(() => {
                        document.getElementById('sendSubscribeError').style.display = 'none';
                    });
                }else if(result.status === 422){
                    document.getElementById('sendSubscribeWarning').style.display = '';
                    sleep(5000).then(() => {
                        document.getElementById('sendSubscribeWarning').style.display = 'none';
                    });
                }else if(result.status === 406){
                    document.getElementById('sendSubscribeInfo').style.display = '';
                    sleep(5000).then(() => {
                        document.getElementById('sendSubscribeInfo').style.display = 'none';
                    });
                }else{
                    document.getElementById('sendSubscribeError').style.display = '';
                    sleep(5000).then(() => {
                        document.getElementById('sendSubscribeError').style.display = 'none';
                    });
                }
                document.getElementById('emailAddressSubscribe').value = '';
            })
        }
    </script>
@endpush
