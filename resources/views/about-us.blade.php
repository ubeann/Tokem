@extends('layouts.app')

@section('content')
        <!-- Mashead header-->
        <header class="masthead bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-center">
                            <h1 class="display-1 lh-1 mb-3 text-white">About Us</h1>
                            <p class="lead fw-normal mb-5 text-white">Toko Kembang is a small company that was founded in 2017 and is still growing. Currently we have more than 1000 flowers sold every month</p>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <section class="bg-light">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-center">
                    <div class="col-12 col-lg-5">
                        <h2 class="display-4 lh-1 mb-4 text-center">Our Contact</h2>
                        <div class="row">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <img src="https://sttkharisma.ac.id/wp-content/uploads/2019/09/ig-logo-email.png" alt="" class="my-2" style="width: 96px; heigth: 96px">
                                    <h3 class="font-alt">Instagram</h3>
                                    <p>@tokem.id</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <img src="https://seeklogo.com/images/W/whatsapp-logo-CAD5F80B25-seeklogo.com.png" alt="" class="my-2" style="width: 96px; heigth: 96px">
                                    <h3 class="font-alt">Whatsapp</h3>
                                    <p>+62 8123 4567</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- App badge section-->
        <section class="bg-gradient-primary-to-secondary" id="download">
            <div class="container px-5">
                <h2 class="text-center text-white font-alt mb-4">Look at Our Office</h2>
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                    <p class="text-white">Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta</p>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6634705511956!2d106.82317239965322!3d-6.175787058818817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1641786307064!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Tokem 2021. All Rights Reserved.</div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>
@endsection
