@extends('layouts.app')


@section('title') {{-- same as @section('title', 'NUSANVILLE') --}}
NUSANVILLE
@endsection

@section('content')
<!-- HEADER -->

<header class="text-center">
    <h1>Menelusuri Wisata Tersembunyi<br>Bersama Nusanville</h1>
    {{-- <p class="mt-3">You will see beautiful<br>moment you never see before</p> --}}
    <a href="#popular" class="btn btn-get-started px-4 mt-5">
        Get Started
    </a>
</header>

<!-- END OF HEADER -->

<!-- MAIN -->

<main>
    {{-- <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3K</h2>
                <p>Hotels</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>72</h2>
                <p>Partners</p>
            </div>
        </section>
    </div> --}}

    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Wisata Terkini</h2>
                    <p>Something that you never try<br>before in this world</p>
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
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- <section class="section-networks" id="networks">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>
                        Our Networks
                    </h2>
                    <p>Companies are trusted us<br>more than just a trip</p>
                </div>
                <div class="col-md-8 text-center">
                    <img src="frontend/images/logos_partner.png" alt="Logo Partner" class="img-partner">
                </div>
            </div>
        </div>
    </section> --}}

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
                    <div class="carousel-item">
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
                    <div class="carousel-item">
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
                    <a href="#" class="btn btn-help px-4 mt-4 mx-1">
                        I Need Help
                    </a>
                    <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- END OF MAIN -->
@endsection