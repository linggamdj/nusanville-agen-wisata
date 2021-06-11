@extends('layouts.app')

@section('title', 'NUSANVILLE')

@section('content')
<!-- HEADER -->

<header class="text-center">
    <h1>Menelusuri Wisata Tersembunyi<br>Bersama Nusanville</h1>
    <a href="#pilihan-wisata" class="btn btn-get-started px-4 mt-5">
        Pilihan Wisata
    </a>
</header>

<!-- END OF HEADER -->

<!-- MAIN -->

<main>
    <section class="section-popular" id="pilihan-wisata">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Pilihan Wisata</h2>
                    <p>Wisata terkini<br>yang memiliki pesona tersembunyi</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-popular-content" id="popular-content">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                @foreach ($items as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">       
                    <div class="card-travel text-center d-flex flex-column" style="background-image: url(' {{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}');">
                        <div class="travel-country">{{$item->location}}</div>
                        <div class="travel-location">{{$item->title}}</div>
                        <div class="travel-button mt-auto">
                            <a href="{{route('detail', $item->slug)}}" class="btn btn-travel-details px-4">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-testimonial-heading" id="testimonial-heading">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>Apa Kata Mereka?</h2>
                    <p>Testimonial dari mereka<br>yang telah berwisata bersama kami</p>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section section-testimonial-content" id="testimonial-content">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testi-1.png" alt="User" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Lingga Adi Atmadja</h3>
                            <p class="testimonial">"It was glorious and I could
                                not stop to say wohooo for
                                every single moment
                                Dankeee!"
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to Ubud
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testi-2.png" alt="User" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Ekomon Tomoyasu</h3>
                            <p class="testimonial">"The trip was amazing and
                                I saw something beautiful in
                                that Island that makes me
                                want to learn more!"
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to Nusa Penida
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testi-3.png" alt="User" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Bligungblog</h3>
                            <p class="testimonial">"I loved it when the waves
                                was shaking harder - I was
                                scared too"
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to Karimun Jawa
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-help px-4 mt-4 mx-1">
                        I Need Help
                    </a>
                    <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="section section-testimonial-content" id="testimonial-content">
        <div class="container">
            <div class="carousel slide section-popular-travel row justify-content-center" id="carouselExampleControls" data-ride="carousel" data-interval="1500">
                <div class="carousel-inner col-sm-6 col-md-6 col-lg-4">
                    <div class="carousel-item active">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testi-1.png" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Lingga Adi Atmadja</h3>
                                <p class="testimonial">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus quasi magni est nihil placeat pariatur doloremque aliquam ex excepturi deserunt."
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Bandung
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testi-1.png" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Lingga Adi Atmadja</h3>
                                <p class="testimonial">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus quasi magni est nihil placeat pariatur doloremque aliquam ex excepturi deserunt."
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Yogyakarta
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testi-1.png" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Lingga Adi Atmadja</h3>
                                <p class="testimonial">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus quasi magni est nihil placeat pariatur doloremque aliquam ex excepturi deserunt."
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Bali
                            </p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                        Ayo Berangkat!
                    </a>
                    <a href="#" class="btn btn-help px-4 mt-4 mx-1">
                        Bantuan
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- END OF MAIN -->
@endsection