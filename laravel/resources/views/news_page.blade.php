@extends('template.user')

@section('content')
<main class="main">

    <!-- Clients Section -->
    <section id="clients" class="clients section">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            </div>

        </div>

    </section><!-- /Clients Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Features</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row justify-content-between">

            <div class="col-lg-5 d-flex align-items-center">

                <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                    <i class="bi bi-binoculars"></i>
                    <div>
                        <h4 class="d-none d-lg-block">Modi sit est dela pireda nest</h4>
                        <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur
                        </p>
                    </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                    <i class="bi bi-box-seam"></i>
                    <div>
                        <h4 class="d-none d-lg-block">Unde praesenti mara setra le</h4>
                        <p>
                        Recusandae atque nihil. Delectus vitae non similique magnam molestiae sapiente similique
                        tenetur aut voluptates sed voluptas ipsum voluptas
                        </p>
                    </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                    <i class="bi bi-brightness-high"></i>
                    <div>
                        <h4 class="d-none d-lg-block">Pariatur explica nitro dela</h4>
                        <p>
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                        Debitis nulla est maxime voluptas dolor aut
                        </p>
                    </div>
                    </a>
                </li>
                </ul><!-- End Tab Nav -->

            </div>

            <div class="col-lg-6">

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                <div class="tab-pane fade active show" id="features-tab-1">
                    <img src="assets/img/tabs-1.jpg" alt="" class="img-fluid">
                </div><!-- End Tab Content Item -->

                <div class="tab-pane fade" id="features-tab-2">
                    <img src="assets/img/tabs-2.jpg" alt="" class="img-fluid">
                </div><!-- End Tab Content Item -->

                <div class="tab-pane fade" id="features-tab-3">
                    <img src="assets/img/tabs-3.jpg" alt="" class="img-fluid">
                </div><!-- End Tab Content Item -->
                </div>

            </div>

            </div>

        </div>

    </section><!-- /Features Section -->

</main>
@endsection