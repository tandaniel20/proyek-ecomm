@extends('layouts.admin')
@section('container')
    <div class="container pt-4" style="text-align: center">
        <form action="/admin/promo/add-promo" method="post">
            @csrf
            <div class="card text-center">
                <div class="card-header">
                    <h2>Add Promo</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Judul Promo
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="text" name="judul" id="" placeholder="Judul Promo">
                        </div>
                        @error('judul')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12" style="text-align: center;">
                            List Promo
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            <select name="buku1" id="">
                                <option value="null">-</option>
                                @foreach ($buku as $b)
                                    <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle">
                            <input type="number" name="harga1" id="" placeholder="Harga">
                        </div>
                    </div>
                    @error('harga1')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            <select name="buku2" id="">
                                <option value="null">-</option>
                                @foreach ($buku as $b)
                                    <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle">
                            <input type="number" name="harga2" id="" placeholder="Harga">
                        </div>
                    </div>
                    @error('harga2')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            <select name="buku3" id="">
                                <option value="null">-</option>
                                @foreach ($buku as $b)
                                    <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle">
                            <input type="number" name="harga3" id="" placeholder="Harga">
                        </div>
                    </div>
                    @error('harga3')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            <select name="buku4" id="">
                                <option value="null">-</option>
                                @foreach ($buku as $b)
                                    <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle">
                            <input type="number" name="harga4" id="" placeholder="Harga">
                        </div>
                    </div>
                    @error('harga4')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            <select name="buku5" id="">
                                <option value="null">-</option>
                                @foreach ($buku as $b)
                                    <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle">
                            <input type="number" name="harga5" id="" placeholder="Harga">
                        </div>
                    </div>
                    @error('harga5')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Jangka Waktu
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-25" type="number" name="jangkawaktu" id="" placeholder="Hari">
                        </div>
                        @error('jangkawaktu')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row" style="text-align: center;">
                        <div class="col"></div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success btn-block">Add Promo</button>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
    </script>
@endsection
