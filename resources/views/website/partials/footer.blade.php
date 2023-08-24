
<!-- Footer -->
<footer class="text-center text-lg-start  text-muted " >
    <!-- Section: Links  -->
    <section class="pt-3">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 ">
                    <!-- Content -->
                    <h5 class="text-uppercase fw-bold mb-4 ">
                        Restaurante Delicias
                    </h5>
                    <p>
                        Descubre una variedad de platos únicos y sabores inolvidables en nuestro restaurante.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h5 class="text-uppercase fw-bold mb-4">
                        Restaurante
                    </h5>
                    <p>
                        <a href="{{ route('website.products') }}" class="text-reset">Menú</a>
                    </p>
                    <p>
                        <a href="{{ route('survey.index') }}" class="text-reset">Encuesta</a>
                    </p>
                    <p>
                        <a href="{{ route('login') }}" class="text-reset">Iniciar sección</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h5 class="text-uppercase fw-bold mb-4">Contacto</h5>
                    <p><i class="bi bi-house ms-2"></i> Calle Siles 203, Santa Marta, SJ</p>
                    <p><i class="bi bi-envelope ms-2"></i> <a href="mailto:correodelestudiante@ufide.ac.cr" target="blank" class="text-reset">correodelestudiante@ufide.ac.cr</a> </p>
                    <p><i class="bi bi-whatsapp ms-2"></i> <a href="https://wa.me/86068600?" target="blank" class="text-reset"> 86068600 </a> </p>
                    <p><i class="bi bi-telephone ms-2"></i> <a href="tel:+22068600" target="blank" class="text-reset"> 2206-8600</a> </p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        ©{{ now()->year }} Ambiente Web Cliente/Servidor
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
