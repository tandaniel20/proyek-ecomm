@extends('layouts.admin')
@section('container')
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <h1>Kategori Buku {{ $bukuSelected["judul"] }}</h1>
            </div>
        </div>
        <hr>
        <div class="d-flex flex-row gap-3 justify-content-center">
            <form action="kategori-added" method="post">
                @csrf
                @foreach ($kategori as $k)
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" name="katid{{ $k["id"] }}" id="flexCheckDefault{{ $k["id"] }}"
                        @foreach ($bukuSelected->kategori as $katBuku)
                            @if ($katBuku["id"] == $k["id"])
                                checked
                            @endif
                        @endforeach
                        >
                        <label class="form-check-label" for="flexCheckDefault{{ $k["id"] }}">
                            {{ $k["namakategori"] }}
                        </label>
                    </div>
                @endforeach
                <p></p>
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
