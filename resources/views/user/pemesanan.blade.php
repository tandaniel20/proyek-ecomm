@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <h1>Pemesanan Saya</h1>
        <div>
            <form action="/pemesanan/search">
                <span>waktu Dari </span>
                <input type="datetime-local" name="from">
                <span> ke </span>
                <input type="datetime-local" name="to">
                <button type="submit">Search</button>
            </form>

        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Pemesanan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanan as $p)
                    <tr>
                        <th scope="row" class="align-middle">{{ $p->id_pemesanan }}</th>
                        <th scope="row" class="align-middle">{{ $p->created_at }}</th>
                        <td class="align-middle">{{ "Rp " . number_format($p->total,0,',','.') }}</td>
                        <td class="align-middle">
                            @if ($p->metode == 0)
                                Transfer
                            @else
                                Point
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($p->status == 0)
                                Menunggu Bukti Transfer
                            @elseif ($p->status == 1)
                                Menunggu Admin Menyetujui Bukti Transfer
                            @elseif ($p->status == 2)
                                Menunggu Pengiriman dari Admin
                            @elseif ($p->status == 99)
                                Cancelled
                            @elseif ($p->status >= 3)
                                Terkirim
                            @endif
                        </td>
                        <td class="align-middle">
                            <a href="/pemesanan/{{ $p->id }}/detail"><button type="button" class="btn btn-warning">Detail</button></a>
                        </td>
                    </tr>
                @endforeach
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
    @if($errors->any())
        <script>alert('{{ $errors->first() }}')</script>
    @endif
@endsection
