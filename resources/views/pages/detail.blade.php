@extends('layouts.app')
@section('title', 'Detail Wisata')

@section('content')
<!-- MAIN -->

<main>
    <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-md-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Wisata
                                </li>
                                <li class="breadcrumb-item active">
                                    Detail
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0 mb-4">
                        <div class="card card-details">
                            <h1>{{ $item->title }}</h1>
                            <p>{{$item->location}}</p>
                            @if ($item->galleries->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
                                    <div class="xzoom-thumbs">
                                        @foreach ($item->galleries as $gallery)
                                        <a href="{{Storage::url($gallery->image)}}">
                                            <img class="xzoom-gallery" width="128" src="{{Storage::url($gallery->image)}}" xpreview="{{Storage::url($gallery->image)}}">
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            <h2>Tentang Wisata</h2>
                            <p class="text-justify">
                                {{-- {!! nl2br(str_replace(" ", "&nbsp;", $item->about)) !!} --}}
                                {!! $item->about !!}
                            </p>
                            <div class="features row">
                                <div class="col-md-4 mt-2">
                                    <img src="{{ url('frontend/images/ic_event.png') }}" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Kesenian</h3>
                                        <p>{{$item->featured_event}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <img src="{{ url('frontend/images/ic_bahasa.png') }}" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Bahasa</h3>
                                        <p>{{$item->language}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <img src="{{ url('frontend/images/ic_foods.png') }}" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Makanan</h3>
                                        <p>{{$item->foods}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Informasi Perjalanan</h2>
                            <hr>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Keberangkatan</th>
                                    <td width="50%" class="text-right">
                                        {{\Carbon\carbon::create($item->departure_date)->format('d F Y')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Durasi</th>
                                    <td width="50%" class="text-right">
                                        {{$item->duration}}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Tipe</th>
                                    <td width="50%" class="text-right">
                                        {{$item->type}}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Harga Paket</th>
                                    <td width="50%" class="text-right">
                                        Rp{{number_format($item->price,2,',','.')}}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container">
                            @auth
                               <form action="{{route('checkout_process', $item->id)}}" method="post">
                                @csrf
                                   <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                       Bergabung Sekarang
                                   </button>
                               </form>
                            @endauth
                            @guest
                                <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                                    Login atau Daftar
                                </a>
                                @endguest
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>

<!-- END OF MAIN -->
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/dist/xzoom.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/xzoom/dist/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush