@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <h1>Detail Retur {{ $header->kode_retur }}</h1>
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
                <div class="col-2">ID Pemesanan</div>
                <div class="col-10">: {{ $header->id_pemesanan_lama }}</div>
            </div>
            <div class="row">
                <div class="col-2">Value Retur</div>
                <div class="col-10">: {{ "Rp " . number_format($header->total,0,',','.') }}</div>
            </div>
            <div class="row">
                <div class="col-2">Status</div>
                <div class="col-10">
                    @if ($header->status == 0)
                        : Menunggu Respons Admin
                    @elseif ($header->status == 1)
                        : Menunggu Resend Admin
                    @elseif ($header->status == 2)
                        : Resent
                    @elseif ($header->status == 99)
                        : Rejected
                    @elseif ($header->status >= 3)
                        : Resent as Points
                    @endif
                </div>
            </div>
            <a href="/retur">
                <button type="button" class="btn btn-warning">Back to Retur</button>
            </a>
        <hr>
        <h1>Detail Buku</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $d)
                    <tr>
                        <th scope="row" class="align-middle">{{ $d->Buku->judul }}</th>
                        <td class="align-middle">{{ $d->qty }}</td>
                    </tr>
                @endforeach
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
