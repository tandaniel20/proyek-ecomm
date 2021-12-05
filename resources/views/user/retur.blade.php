@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <div class="d-flex justify-content-between text-mute">
            <div class="align-self-center">
                <h1>Retur Saya</h1>
            </div>
            <div class="align-self-center">
                <a href="/retur/ajuRetur">
                    <button type="button" class="btn btn-primary">Aju Retur</button>
                </a>
            </div>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Retur</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">ID Pemesanan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($retur as $r)
                    <tr>
                        <th scope="row" class="align-middle">{{ $r->kode_retur }}</th>
                        <th scope="row" class="align-middle">{{ $r->created_at }}</th>
                        <td class="align-middle">{{ $r->id_pemesanan_lama }}</td>
                        <td class="align-middle">
                            @if ($r->status == 0)
                                Menunggu Respons Admin
                            @elseif ($r->status == 1)
                                Menunggu Resend Admin
                            @elseif ($r->status == 2)
                                Resent
                            @elseif ($r->status == 99)
                                Rejected
                            @elseif ($r->status >= 3)
                                Resent as Point
                            @endif
                        </td>
                        <td class="align-middle">
                            <a href="/retur/{{ $r->id }}/detail"><button type="button" class="btn btn-warning">Detail</button></a>
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
