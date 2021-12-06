@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
<div class="container mt-3">
    <h1>Laporan Pengeluaran</h1>
    <hr>
    <div>
        <form action="/laporanuser/search">
            <span>waktu Dari </span>
            <input type="datetime-local" name="from">
            <span> ke </span>
            <input type="datetime-local" name="to">
            <button type="submit">Search</button>
        </form>

    </div>
    <hr>
    @foreach ($pemesanan as $p)
    @php
        $totalsemua=0;
    @endphp
    <h2>{{$p->id_pemesanan}}</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($p->Detail) --}}
            @foreach ($p->Detail as $b)
            @php
            $totalsemua+=$b->subtotal;
            @endphp
                <tr>
                    <th scope="row" class="align-middle">{{ $b->Buku->judul }}</th>
                    <th scope="row" class="align-middle">{{ $b->harga }}</th>
                    <th scope="row" class="align-middle">{{ $b->qty }}</th>
                    <td class="align-middle">{{ "Rp " . number_format($b->subtotal,0,',','.') }}</td>
                </tr>
            @endforeach
            <tr>
                <th scope="row" class="align-middle"></th>
                <th scope="row" class="align-middle"></th>
                <th scope="row" class="align-middle">Total Pengelauran :</th>
                <td class="align-middle">{{ "Rp " . number_format($totalsemua,0,',','.') }}</td>
            </tr>
            <tr>

            </tr>
        </tbody>
    </table>
    @endforeach

</div>
@if($errors->any())
    <script>alert('{{ $errors->first() }}')</script>
@endif
@endsection
