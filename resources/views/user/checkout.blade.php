@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <h1>Checkout</h1>
        <hr>
        <div class="row">
            <div class="col-8">
                <?php
                    $totalSemua = 0;
                ?>
                @foreach ($keranjang as $k)
                    <div class="card mb-3 w-auto" style="height: 10vh;">
                        <div class="d-flex flex-row">
                            <div class="align-self-center">
                                <img src="<?= asset('storage/imageBuku/')?>/{{ $k->Buku["id"] }}.png" class="img-fluid img-thumbnail rounded-start" alt="" style="height: 10vh">
                            </div>
                            <div class="align-self-center">
                                <div class="card-body align-middle">
                                    <h5 class="card-title">{{ $k->Buku->judul }}</h5>
                                    <span class="text-muted">
                                        <?php
                                            $ketemu = false;
                                            foreach ($dpromo as $dp) {
                                                if ($dp["id_buku"] == $k->Buku->id){
                                                    $ketemu = true;
                                                    echo "Rp " . number_format($dp["harga_promo"],0,',','.');
                                                }
                                            }
                                            if (!$ketemu){
                                                echo "Rp " . number_format($k->Buku->harga,0,',','.');
                                            }
                                        ?>,
                                    </span>
                                    <span class="text-muted">
                                        Stock : {{ $k->Buku->stock }}
                                    </span>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <div class="card-body align-middle">
                                    <p class="card-text">Jumlah : {{ $k->qty }}</p>
                                </div>
                            </div>
                            <div class="align-self-center">
                                <div class="card-body align-middle">
                                    <p class="card-text">Subtotal :
                                        <?php
                                            $ketemu = false;
                                            $total = 0;
                                            foreach ($dpromo as $dp) {
                                                if ($dp["id_buku"] == $k->Buku->id){
                                                    $ketemu = true;
                                                    $total = $k->qty * $dp["harga_promo"];
                                                    echo "Rp " . number_format($total,0,',','.');
                                                }
                                            }
                                            if (!$ketemu){
                                                $total = $k->Buku->harga*$k->qty;
                                                echo "Rp " . number_format($total,0,',','.');
                                            }
                                            $totalSemua += $total;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="align-self-center">
                        <h3>Total : {{ "Rp " . number_format($totalSemua,0,',','.') }}</h3>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="/checkout/confirm" method="post">
                            @csrf
                            <h5 class="card-title">Pilih Alamat</h5>
                            <select name="alamat" id="">
                                @foreach ($alamat as $a)
                                    <option value="{{ $a->id }}">{{ $a->penerima }} - {{ $a->jalan }}, {{ $a->kota }}</option>
                                @endforeach
                            </select>
                            <hr>
                            <h5 class="card-title">Metode Pembayaran</h5>
                            <select name="metode" id="">
                                <option value="0">Transfer</option>
                                <option value="1">Point</option>
                            </select>
                            <hr>
                            <h5 class="card-title">Rincian Pembayaran</h5>
                            <div class="row">
                                <div class="col text-muted text-left">
                                    Total belanja :
                                </div>
                                <div class="col" style="text-align: right;">
                                    {{ "Rp " . number_format($totalSemua,0,',','.') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-muted text-left">
                                    Biaya ongkir :
                                </div>
                                <div class="col" style="text-align: right;">
                                    {{ "Rp " . number_format(10000,0,',','.') }}
                                </div>
                            </div>
                            <hr>
                            <input type="hidden" name="totalSemua" value="{{ $totalSemua + 10000 }}">
                            <div class="row">
                                <div class="col text-left">
                                    Total :
                                </div>
                                <div class="col" style="text-align: right;">
                                    {{ "Rp " . number_format($totalSemua+10000,0,',','.') }}
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($errors->any())
        <script>alert('{{ $errors->first() }}')</script>
    @endif
@endsection
