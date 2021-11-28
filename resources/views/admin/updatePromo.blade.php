@extends('layouts.admin')
@section('container')
    <div class="container pt-4" style="text-align: center">
        <form action="update-promo" method="post">
            @csrf
            <div class="card text-center">
                <div class="card-header">
                    <h2>Edit Promo</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Judul Promo
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="text" name="judul" id="" placeholder="Judul Promo" value="{{ $hpromo["judul"] }}">
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
                                    @if (isset($dpromo[0]))
                                        @if ($dpromo[0]["id_buku"] == $b["id"])
                                            <option value="{{ $b["id"] }}" selected>{{ $b["judul"] }}</option>
                                        @else
                                            <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle">
                            <input type="number" name="harga1" id="" placeholder="Harga" value="{{ isset($dpromo[0]) ? $dpromo[0]["harga_promo"] : ""}}">
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
                                    @if (isset($dpromo[1]))
                                        @if ($dpromo[1]["id_buku"] == $b["id"])
                                            <option value="{{ $b["id"] }}" selected>{{ $b["judul"] }}</option>
                                        @else
                                            <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle">
                            <input type="number" name="harga2" id="" placeholder="Harga" value="{{ isset($dpromo[1]) ? $dpromo[1]["harga_promo"] : ""}}">
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
                                    @if (isset($dpromo[2]))
                                        @if ($dpromo[2]["id_buku"] == $b["id"])
                                            <option value="{{ $b["id"] }}" selected>{{ $b["judul"] }}</option>
                                        @else
                                            <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle">
                            <input type="number" name="harga3" id="" placeholder="Harga" value="{{ isset($dpromo[2]) ? $dpromo[2]["harga_promo"] : ""}}">
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
                                    @if (isset($dpromo[3]))
                                        @if ($dpromo[3]["id_buku"] == $b["id"])
                                            <option value="{{ $b["id"] }}" selected>{{ $b["judul"] }}</option>
                                        @else
                                            <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle">
                            <input type="number" name="harga4" id="" placeholder="Harga" value="{{ isset($dpromo[3]) ? $dpromo[3]["harga_promo"] : ""}}">
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
                                    @if (isset($dpromo[4]))
                                        @if ($dpromo[4]["id_buku"] == $b["id"])
                                            <option value="{{ $b["id"] }}" selected>{{ $b["judul"] }}</option>
                                        @else
                                            <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $b["id"] }}">{{ $b["judul"] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle">
                            <input type="number" name="harga5" id="" placeholder="Harga" value="{{ isset($dpromo[4]) ? $dpromo[4]["harga_promo"] : ""}}">
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
                            <input class="w-25" type="number" name="jangkawaktu" id="" placeholder="Hari" value="10">
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
