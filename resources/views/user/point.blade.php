@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <h1>Point</h1>
        <hr>
        <div class="d-flex justify-content-between text-mute">
            <div class="align-self-center">
                {{ "My point : Rp " . number_format(Auth::user()->point,0,',','.') }}
            </div>
            <div class="align-self-center">
                <form action="/point/cekVoucher" method="post">
                    @csrf
                    <input type="text" name="kodeVoucher" id="" placeholder="Kode Voucher">
                    <button type="submit" class="btn btn-success">Redeem Voucher</button>
                </form>
            </div>
        </div>
        <div>
            {{ "Saldo Refund : Rp " . number_format(Auth::user()->saldo_refund,0,',','.') }}
        </div>
        <hr>
        <h2>History Point</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col" class="text-success">Tambah</th>
                    <th scope="col" class="text-danger">Kurang</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $h)
                    <tr>
                        <th scope="row">{{ $h->created_at }}</th>
                        <td class="text-success">
                            @if ($h->kredit == 0)
                                -
                            @else
                                {{ "Rp " . number_format($h->kredit,0,',','.') }}
                            @endif
                        </td>
                        <td class="text-danger">
                            @if ($h->debit == 0)
                                -
                            @else
                                {{ "Rp " . number_format($h->debit,0,',','.') }}
                            @endif
                        </td>
                        <td>{{ $h->keterangan }}</td>
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
