@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <h1>Bukti Transfer</h1>
        <hr>
        <div class="row">
            <div class="col-2">
                <div class="card" style="">
                    <ul class="list-group list-group-flush">
                        @foreach ($pemesanan as $p)
                            <a href="/admin/bukti-transfer/{{ $p["id"] }}"><li class="list-group-item {{ $p["id"]==$current["id"]? 'active':'' }}">{{ $p["id_pemesanan"] }}</li></a>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if (isset($current))
                <div class="col">
                    <div class="card" style="">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center">
                                <img src="<?= asset('storage/bukti/')?>/{{ $current["id"] }}.png" class="img-fluid" alt="..."><br>
                                Bukti Transfer {{ $current["id_pemesanan"] }} : <br>
                                Bukti Transfer dari : {{ $current->User->name }} <br>
                                Jumlah Pembayaran {{ "Rp " . number_format($current["total"],0,',','.') }}<br>
                                <a href="/admin/bukti-transfer/{{ $current["id"] }}/accept"><button type="button" class="btn btn-success m-2">Accept</button></a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $current->id }}">
                                    Reject
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $current->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $current->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $current->id }}">Reject Bukti Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin membatalkan Pemesanan {{ $current->id_pemesanan }}?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="/admin/bukti-transfer/{{ $current["id"] }}/reject"><button type="button" class="btn btn-primary">Reject</button></a>
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
