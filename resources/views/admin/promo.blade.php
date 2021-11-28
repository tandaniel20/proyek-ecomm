@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <h1>Promo</h1>
            </div>
            <div class="col-2 my-auto" style="">
                <form action="/admin/promo/add">
                    <button type="submit" class="btn btn-primary col-12">Add Promo</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-2">
                <div class="card" style="">
                    <ul class="list-group list-group-flush">
                        @foreach ($promo as $p)
                            <a href="/admin/promo/{{ $p["id"] }}"><li class="list-group-item {{ $p["id"]==$current["id"]? 'active':'' }}">{{ $p["judul"] }}</li></a>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if (isset($current))
                <div class="col">
                    <div class="card" style="">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div>
                                    Judul Promo : {{ $current["judul"] }}
                                </div>
                                <div>
                                    Batas Akhir : {{ $current["tanggal_exp"] }}
                                </div>
                                <div>
                                    Created at : {{ $current["created_at"] }}
                                </div>
                                <br>
                                <h4>Promo Buku</h4>
                                <br>
                                @foreach ($current->buku as $b)
                                    <div>
                                        {{-- @dump($b) --}}
                                        {{ $b["judul"] }} - <span style="text-decoration: line-through;">{{ "Rp " . number_format($b["harga"],0,',','.') }}</span> -> {{ "Rp " . number_format($b->pivot->harga_promo,0,',','.') }}
                                    </div>
                                @endforeach
                                <br>
                                <div>
                                    <a href="/admin/promo/{{ $current["id"] }}/update"><button class="btn btn-warning">Edit</button></a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $current->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $current->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $current->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $current->id }}">Delete Promo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin membuang Promo {{ $current->judul }}?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="/admin/promo/{{ $current["id"] }}/delete"><button type="button" class="btn btn-primary">Delete</button></a>
                                            </div>
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
        {{-- <div class="row">
            <div class="col-2">
                <div class="card" style="">
                    <ul class="list-group list-group-flush">
                        @foreach ($promo as $p)
                            <a href="/admin/promo/{{ $p["id"] }}"><li class="list-group-item {{ $p["id"]==$current["id"]? 'active':'' }}">{{ $p["judul"] }}</li></a>
                        @endforeach
                    </ul>
                </div>
            </div>
            @if (isset($current))
                <div class="col">
                    <div class="card" style="">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div>
                                    Judul : {{ $current["judul"] }}
                                </div>
                                <div>
                                    Kode : {{ $current["kode"] }}
                                </div>
                                <div>
                                    Batas : sisa {{ $current["batas"] }} pakai
                                </div>
                                <div>
                                    Jumlah Point : {{ $current["jumlahpoint"] }}
                                </div>
                                <div>
                                    Created at : {{ $current["created_at"] }}
                                </div>
                                <div>
                                    <a href="/admin/voucher/{{ $current["id"] }}/update"><button class="btn btn-warning">Edit</button></a>
                                    <a href="/admin/voucher/{{ $current["id"] }}/delete"><button class="btn btn-danger">Delete</button></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        </div> --}}
    </div>
@endsection
