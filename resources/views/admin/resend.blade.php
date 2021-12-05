@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <h1>Resend</h1>
        <hr>
        <div class="row">
            <div class="col-2">
                <div class="card" style="">
                    <ul class="list-group list-group-flush">
                        @foreach ($pemesanan as $p)
                            <a href="/admin/resend/{{ $p["id"] }}" style="text-decoration:none;"><li class="list-group-item text-white {{ $p["id"]==$current["id"]? 'active':'' }}
                            @if ($p["status"] == 3)
                                bg-danger
                            @elseif ($p["status"] == 1)
                                bg-warning
                            @else
                                bg-success
                            @endif
                            ">{{ $p["kode_retur"] }}</li></a>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if (isset($current))
                <div class="col">
                    <div class="card" style="">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-left">
                                <h3>Detail Resend {{ $current["kode_retur"] }}</h3>
                                Retur oleh : {{ $current->User->name }} <br>
                                Nama Penerima : {{ $current->Alamat->penerima }} <br>
                                No. HP Penerima : {{ $current->Alamat->nohp }} <br>
                                Alamat retur : {{ $current->Alamat->jalan }}, Kota {{ $current->Alamat->kota }} - {{ $current->Alamat->provinsi }}, KODE POS : {{ $current->Alamat->kodepos }} <br>
                                Jumlah Total Retur Senilai : {{ "Rp " . number_format($current["total"],0,',','.') }}<br>
                                Keterangan retur : <br>
                                <span class="text-wrap">{{ $current->keterangan }}</span>
                                <br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($current->Detail as $d)
                                            <tr>
                                                <th scope="row" class="align-middle">{{ $d->Buku->judul }}</th>
                                                <td class="align-middle">{{ $d->qty }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>

                                @if ($current->status == 1)
                                    <a href="/admin/resend/{{ $current["id"] }}/accept"><button type="button" class="btn btn-success m-2">Resend</button></a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $current->id }}">
                                        Refund
                                    </button>
                                @elseif ($current->status == 3)
                                    <span class="text-danger">Resent as Point</span>
                                @else
                                    <span class="text-success">Resent</span>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $current->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $current->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $current->id }}">Refund Pengiriman Resend</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin membatalkan Retur {{ $current->kode_retur }}?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="/admin/resend/{{ $current["id"] }}/reject"><button type="button" class="btn btn-primary">Refund</button></a>
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
