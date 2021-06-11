@extends('layouts.success')

@section('title', 'Checkout Success')

@section('content')
<!-- MAIN -->

<main>
    <div class="section-success d-flex align-item-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/ic_mail.png') }}" alt="" class="py-2">
            <h1>Transaksi Berhasil!</h1>
            <p>
                Silahkan cek email Anda untuk mencetak tiket perjalanan<br>Terima kasih telah memilih kami sebagai patner perjalanan Anda
            </p>
            <a href="{{url('/')}}" class="btn btn-home-page mt-3 mb-3 px-5">
                Kembali ke Home Page
            </a>
        </div>
    </div>
</main>

<!-- END OF MAIN -->
@endsection