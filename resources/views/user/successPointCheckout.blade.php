@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-5 pt-5 mx-auto text-center">
        <span class="fs-1 fw-bold">Checkout Berhasil</span>
        <hr>
        <span class="fs-2">Checkout telah dibayar menggunakan Point</span><br>
        <span class="fs-3">Untuk detail dapat dilihat pada tab Pemesanan</span><br>
        <a href="/pemesanan">
            <button type="button" class="btn btn-warning fs-4">Pemesanan</button>
        </a>
    </div>
@endsection
