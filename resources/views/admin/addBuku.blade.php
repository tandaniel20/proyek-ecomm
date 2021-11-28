@extends('layouts.admin')
@section('container')
    <div class="container pt-4" style="text-align: center">
        <form action="/admin/buku/add-buku" method="post">
            @csrf
            <div class="card text-center">
                <div class="card-header">
                    <h2>Add Buku</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Judul Buku
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="text" name="judul" id="" placeholder="Judul Buku" value="{{ old('judul') }}">
                        </div>
                        @error('judul')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Harga
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input type="number" class="w-50" name="harga" id="" placeholder="Harga Buku" value="{{ old('harga') }}">
                        </div>
                        @error('harga')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Penulis
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="text" name="penulis" id="" placeholder="Penulis" value="{{ old('penulis') }}">
                        </div>
                        @error('penulis')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Penerbit
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="text" name="penerbit" id="" placeholder="Penerbit" value="{{ old('penerbit') }}">
                        </div>
                        @error('penerbit')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Tahun
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input type="number" class="w-50" name="tahun" id="" placeholder="Tahun" value="{{ old('tahun') }}">
                        </div>
                        @error('tahun')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Bahasa
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <select name="bahasa" id="">
                                <option value="Bahasa Indonesia">Indonesia</option>
                                <option value="Bahasa Inggris">Inggris</option>
                                <option value="Bahasa Jepang">Jepang</option>
                            </select>
                        </div>
                        @error('bahasa')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Berat
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input type="number" class="w-50" name="berat" id="" placeholder="gram" value="{{ old('berat') }}">
                        </div>
                        @error('berat')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Dimensi
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-25" type="number" name="dimensi1" id="" placeholder="panjang" value="{{ old('dimensi1') }}"> x
                            <input class="w-25" type="number" name="dimensi2" id="" placeholder="lebar" value="{{ old('dimensi2') }}">
                        </div>
                        @error('dimensi1')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                        @error('dimensi2')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Cover
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <select name="cover" id="">
                                <option value="Cover Plastik">Plastik</option>
                                <option value="Cover Kertas Keras">Kertas Keras</option>
                                <option value="Cover Buffalo">Buffalo</option>
                            </select>
                        </div>
                        @error('cover')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Deskripsi Buku
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <div class="form-floating">
                                <textarea class="form-control w-50" placeholder="" id="floatingTextarea2" style="height: 100px" name="deskripsi">{{ old('deskripsi') }}</textarea>
                                <label for="floatingTextarea2">Deskripsi</label>
                            </div>
                        </div>
                        @error('deskripsikategori')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row" style="text-align: center;">
                        <div class="col"></div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success btn-block">Add Buku</button>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
