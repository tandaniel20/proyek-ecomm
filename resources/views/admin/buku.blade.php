@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <h1>Buku</h1>
            </div>
            <div class="col-2 my-auto" style="">
                <form action="/admin/buku/add">
                    <button type="submit" class="btn btn-primary col-12">Add Buku</button>
                </form>
            </div>
        </div>
        <hr>
        {{-- <div class="d-flex flex-wrap gap-3 justify-content-center"> --}}
        {{-- <div class="row"> --}}
        <div class="d-flex flex-wrap justify-content-center">
            @foreach ($buku as $b)
                <div class="card flex" style="width: 15rem;">
                    <img class="card-img-top" src="<?= asset('storage/imageBuku/')?>/{{ $b["id"] }}.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $b["judul"] }}</h5>
                        <p class="card-text">
                            Kategori :
                        @foreach ($b->kategori as $kategori)
                            <button class="btn btn-outline-dark btn-sm my-1 rounded-pill">{{ $kategori["namakategori"] }}</button>
                        @endforeach
                        </p>
                        <a href="/admin/buku/{{ $b["id"] }}/kategori" class="btn btn-primary m-1" style="float: left">Kategori</a>
                        <a href="/admin/buku/{{ $b["id"] }}/update" class="btn btn-warning m-1" style="float: left">Edit</a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $b->id }}" style="float: left">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $b->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $b->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{{ $b->id }}">Delete Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin membuang Buku {{ $b->judul }}?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="/admin/buku/{{ $b["id"] }}/delete"><button type="button" class="btn btn-primary">Delete</button></a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- </div> --}}

        {{-- </div> --}}
    </div>
@endsection
