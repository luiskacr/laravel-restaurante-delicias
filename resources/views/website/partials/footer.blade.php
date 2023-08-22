
<!-- Footer -->
<footer class="text-center text-lg-start  text-muted" >
    <!-- Section: Links  -->
    <section class="pt-3">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Company name
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Productos</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Categorias</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Links
                    </h6>
                    <p>
                        <a href="{{ route('login') }}" class="text-reset">Iniciar seccion</a>
                    </p>
                    <p>
                        <a href="{{ route('survey.index') }}" class="text-reset">Encuesta </a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                    <p><i class="bi bi-house"></i> Calle Siles 203, Santa Marta, SJ</p>
                    <p><i class="bi bi-envelope"></i> correodelestudiante@ufide.ac.cr</p>
                    <p><i class="bi bi-phone"></i> 86068600 </p>
                    <p><i class="bi bi-telephone"></i> 2206-8600</p>
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
