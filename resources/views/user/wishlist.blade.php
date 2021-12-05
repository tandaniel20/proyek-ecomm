@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <h1>Wishlist</h1>
        <hr>
        <div style="display: flex; justify-content: center">
            <div class="container gap-3" style="display: flex; justify-content: flex-start; flex-wrap: wrap;">
                @foreach ($buku as $b)
                <a href="/buku/{{ $b["id"] }}/detail">
                    <div class="card flex linkBuku" style="width: 15rem;height: 24rem">
                        <img class="card-img-top" src="<?= asset('storage/imageBuku/')?>/{{ $b["id"] }}.png" alt="Card image cap">
                        <div class="card-body">
                            <div class="h-100">
                                <h6 class="card-title">{{ $b["judul"] }}</h6>
                                Kategori :
                                @foreach ($b->kategori as $kategori)
                                    <button class="btn btn-outline-dark btn-sm m-1 rounded-pill fw-light">{{ $kategori["namakategori"] }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
