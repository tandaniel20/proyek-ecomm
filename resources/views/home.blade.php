@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    {{-- <div class="container m-auto flex" style="justify-content: center;">
        <div class="flex d-flex flex-wrap gap-3 m-5" style="justify-content: flex-start;"> --}}
    <div class="container pt-3">
        <h1>Buku-buku{{ isset($filter) ? " ".$filter : "" }}</h1></div>
        <hr>
        @if (count($buku) < 1)
            @if (isset($filter))
                <div class="text-muted"><h3>Buku dengan filter {{ $filter }} tidak ditemukan!</h3></div>
            @else
                <div class="text-muted"><h3>Buku tidak ditemukan!</h3></div>
            @endif
        @endif
        <div style="display: flex; justify-content: center">
            <div class="container gap-3" style="display: flex; justify-content: flex-start; flex-wrap: wrap;">
                @foreach ($buku as $b)
                <a href="/buku/{{ $b["id"] }}/detail">
                    <div class="card flex linkBuku" style="width: 15rem;height: 24rem">
                        <img class="card-img-top" src="<?= asset('storage/imageBuku/')?>/{{ $b["id"] }}.png" alt="Card image cap">
                        <div class="card-body">
                            <div class="h-75">
                                <h6 class="card-title">{{ $b["judul"] }}</h6>
                                Kategori :
                                @foreach ($b->kategori as $kategori)
                                    <form action="/home/{{ $kategori["id"] }}" method="get">
                                        <button class="btn btn-outline-dark btn-sm m-1 rounded-pill fw-light">{{ $kategori["namakategori"] }}</button>
                                    </form>
                                @endforeach
                            </div>
                            <div>
                                <p class="card-text">
                                    <span
                                    @foreach ($dpromo as $dp)
                                        @if ($dp["id_buku"] == $b["id"])
                                            style="text-decoration: line-through"
                                        @endif
                                    @endforeach
                                    >{{ "Rp " . number_format($b["harga"],0,',','.') }}</span>
                                    @foreach ($dpromo as $dp)
                                        @if ($dp["id_buku"] == $b["id"])
                                            <span class="text-danger"> {{ "Rp " . number_format($dp["harga_promo"],0,',','.') }} </span>
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
