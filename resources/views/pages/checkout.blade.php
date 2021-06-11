@extends('layouts.checkout')
@section('title', 'Checkout')

@section('content')
<main>
    <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-md-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item">
                                    Details
                                </li>
                                <li class="breadcrumb-item active">
                                    Checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details mb-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h1>Ajak Teman mu!</h1>
                            <p>Berwisata ke {{$item->travel_package->title}}, {{$item->travel_package->location}}</p>
                            <div class="anttendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Foto</td>
                                            <td>Nama</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td>
                                                    <img src="https://ui-avatars.com/api/?name={{$detail->username}}" height="60" class="rounded-circle">
                                                </td>
                                                <td class="align-middle">
                                                    {{$detail->username}}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{route('checkout-remove', $detail->id)}}">
                                                        <img src="{{ url('frontend/images/ic_group_delete.png') }}" alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No Visitor
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="member mt-3">
                                    <h2>Tambah Orang</h2>
                                    <form class="form-inline" method="post" action="{{route('checkout-create', $item->id)}}">
                                        @csrf
                                        <label for="username" class="sr-only">Name</label>
                                        <input type="text" name="username" class="form-control mb-2 mr-sm-2" id="username" required placeholder="Username">
                                        <button type="submit" class="btn btn-add-now mb-2 px-4">
                                            Tambahkan
                                        </button>
                                    </form>
                                    <h3 class="mt-2 mb-0">
                                        Catatan
                                    </h3>
                                    <p class="disclaimer mb-0">
                                        Pastikan orang yang anda ajak telah mendaftarkan diri
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">                                 
                            <h2>Informasi Checkout</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Anggota</th>
                                    <td width="50%" class="text-right">
                                        {{$item->details->count()}} Orang
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <th width="50%">Harga Perjalanan</th>
                                    <td width="50%" class="text-right">
                                        Rp{{$item->travel_package->price}},00 / Orang
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-right">
                                        Rp{{$item->transaction_total}},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+ Kode Unik)</th>
                                    <td width="50%" class="text-right text-total">
                                        <span class="text-blue">Rp{{$item->transaction_total}},</span><span class="text-orange">{{mt_rand(0,99)}}</span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h2>Instruksi Pembayaran</h2>
                            <p class="payment-instructions">
                                Mohon selesaikan pembayaran sebelum anda melanjutkan
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT Nusanville</h3>
                                        <p>
                                            1111 2222 3333<br>Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT Nusanville</h3>
                                        <p>
                                            1111 2222 3333<br>Bank Mandiri
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="{{route('checkout-success', $item->id)}}" class="btn btn-block btn-join-now mt-3 py-2">
                                Saya Telah Membayar
                            </a>
                        </div>
                        <div class="cancel-container text-center mb-4">
                            <a href="{{route('detail', $item->travel_package->slug)}}" class="text-muted">
                                Batalkan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/dist/combined/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/gijgo/dist/combined/js/gijgo.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<img src="{{ url('frontend/images/ic_date.png') }}"/>'
                }
            })
        });
    </script>
@endpush