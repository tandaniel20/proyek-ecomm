@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <h1>Pengantaran</h1>
        <hr>
        <div class="row">
            <div class="col-2">
                <div class="card" style="">
                    <ul class="list-group list-group-flush">
                        @foreach ($pemesanan as $p)
                            <a href="/admin/pengantaran/{{ $p["id"] }}"><li class="list-group-item {{ $p["id"]==$current["id"]? 'active':'' }}">{{ $p["id_pemesanan"] }}</li></a>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if (isset($current))
                <div class="col">
                    <div class="card" style="">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h3>Detail Pemesanan {{ $current["id_pemesanan"] }}</h3>
                                Pemesanan oleh : {{ $current->User->name }} <br>
                                Nama Penerima : {{ $current->Alamat->penerima }} <br>
                                No. HP Penerima : {{ $current->Alamat->nohp }} <br>
                                Alamat pemesanan : {{ $current->Alamat->jalan }}, Kota {{ $current->Alamat->kota }} - {{ $current->Alamat->provinsi }}, KODE POS : {{ $current->Alamat->kodepos }} <br>
                                Jumlah Biaya Pemesanan : {{ "Rp " . number_format($current["total"],0,',','.') }}<br>
                                Biaya Ongkir : Rp 10.000 <br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($current->Detail as $d)
                                            <tr>
                                                <th scope="row" class="align-middle">{{ $d->Buku->judul }}</th>
                                                <td class="align-middle">{{ "Rp " . number_format($d->harga,0,',','.') }}</td>
                                                <td class="align-middle">{{ $d->qty }}</td>
                                                <td class="align-middle">{{ "Rp " . number_format($d->subtotal,0,',','.') }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>

                                <a href="/admin/pengantaran/{{ $current["id"] }}/accept"><button type="button" class="btn btn-success m-2">Terkirim</button></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $current->id }}">
                                    Cancel
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $current->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $current->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $current->id }}">Cancel Pengantaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin membatalkan Pemesanan {{ $current->id_pemesanan }}?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="/admin/pengantaran/{{ $current["id"] }}/reject"><button type="button" class="btn btn-primary">Cancel</button></a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
