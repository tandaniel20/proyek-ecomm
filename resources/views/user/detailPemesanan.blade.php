@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <h1>Detail Pemesanan {{ $header->id_pemesanan }}</h1>
        <hr>
            <div class="row">
                <div class="col-2"><span class="text-muted">Tanggal</div>
                <div class="col-10"><span class="text-muted">: {{ $header->created_at }} </span></div>
            </div>
            <div class="row">
                <div class="col-2"><span class="text-muted">Email</div>
                <div class="col-10"><span class="text-muted">: {{ $header->User->email }} </span></div>
            </div>
            <div class="row">
                <div class="col-2">Nama</div>
                <div class="col-10">: {{ $header->User->name }}</div>
            </div>
            <div class="row">
                <div class="col-2">Penerima</div>
                <div class="col-10">: {{ $header->Alamat->penerima }}</div>
            </div>
            <div class="row">
                <div class="col-2">No. HP Penerima</div>
                <div class="col-10">: {{ $header->Alamat->nohp }}</div>
            </div>
            <div class="row">
                <div class="col-2">Alamat Penerima</div>
                <div class="col-10">: {{ $header->Alamat->jalan }}, Kota {{ $header->Alamat->kota }} - {{ $header->Alamat->provinsi }}, KODE POS : {{ $header->Alamat->kodepos }}</div>
            </div>
            <div class="row">
                <div class="col-2">Metode</div>
                <div class="col-10">: {{ $header->metode == 1 ? 'Point' : 'Transfer' }}</div>
            </div>
            <div class="row">
                <div class="col-2">Biaya Ongkir</div>
                <div class="col-10">: {{ "Rp " . number_format(10000,0,',','.') }}</div>
            </div>
            <div class="row">
                <div class="col-2">Total Pemesanan</div>
                <div class="col-10">: {{ "Rp " . number_format($header->total,0,',','.') }}</div>
            </div>
            <div class="row">
                <div class="col-2">Status</div>
                <div class="col-10">
                    @if ($header->status == 0)
                        : Menunggu Bukti Transfer
                    @elseif ($header->status == 1)
                        : Menunggu Admin Menyetujui Bukti Transfer
                    @elseif ($header->status == 2)
                        : Menunggu Pengiriman dari Admin
                    @elseif ($header->status == 99)
                        : Cancelled
                    @elseif ($header->status >= 3)
                        : Terkirim
                    @endif
                </div>
            </div>
            <a href="/pemesanan">
                <button type="button" class="btn btn-warning">Back to Pemesanan</button>
            </a>
            @if ($header->status == 0)
                <a href="kirim-bukti">
                    <button type="button" class="btn btn-primary">Kirim Bukti Transfer</button>
                </a>
            @endif
        <hr>
        <h1>Detail Buku</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Subtotal</th>
                    @if ($header->status == 3)
                        <th scope="col">Rate</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $d)
                    <tr>
                        <th scope="row" class="align-middle">{{ $d->Buku->judul }}</th>
                        <td class="align-middle">{{ "Rp " . number_format($d->harga,0,',','.') }}</td>
                        <td class="align-middle">{{ $d->qty }}</td>
                        <td class="align-middle">{{ "Rp " . number_format($d->subtotal,0,',','.') }}</td>
                        @if ($header->status == 3)
                            <td>
                                <a href="/rate/{{ $d->Buku->id }}">
                                    <button type="button" class="btn btn-dark">
                                        <span class="fa fa-star checkedStar"></span>
                                    </button>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
