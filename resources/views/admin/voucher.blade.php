@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <h1>Voucher</h1>
            </div>
            <div class="col-2 my-auto" style="">
                <form action="/admin/voucher/add">
                    <button type="submit" class="btn btn-primary col-12">Add Voucher</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-2">
                <div class="card" style="">
                    <ul class="list-group list-group-flush">
                        @foreach ($voucher as $v)
                            <a href="/admin/voucher/{{ $v["id"] }}"><li class="list-group-item {{ $v["id"]==$current["id"]? 'active':'' }}">{{ $v["judul"] }}</li></a>
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
                                    Jumlah Point : {{ "Rp " . number_format($current["jumlahpoint"],0,',','.') }}
                                </div>
                                <div>
                                    Created at : {{ $current["created_at"] }}
                                </div>
                                <div>
                                    <a href="/admin/voucher/{{ $current["id"] }}/update"><button class="btn btn-warning">Edit</button></a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $current->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $current->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $current->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $current->id }}">Delete Voucher</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin membuang Voucher {{ $current->judul }}?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="/admin/voucher/{{ $current["id"] }}/delete"><button type="button" class="btn btn-primary">Delete</button></a>
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
    </div>
@endsection
