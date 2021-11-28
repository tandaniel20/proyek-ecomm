@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <h1>Kategori Buku</h1>
            </div>
            <div class="col-2 my-auto" style="">
                <form action="/admin/kategori/add">
                    <button type="submit" class="btn btn-primary col-12">Add Kategori</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            @foreach ($kategori as $k)
                <div class="card flex">
                    <div class="card-body">
                        <h5 class="card-title">{{ $k["namakategori"] }}</h5>
                        <p class="card-text">{{ $k["deskripsikategori"] }}</p>
                        <a href="/admin/kategori/{{ $k["id"] }}/update" class="btn btn-warning">Update</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $k->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $k->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel{{ $k->id }}">Delete Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin membuang kategori {{ $k->namakategori }}?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="/admin/kategori/{{ $k["id"] }}/delete"><button type="button" class="btn btn-primary">Delete</button></a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
