@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    } );
</script>

<div class="container-fluid" style="text-align: center;">
    <form action="/updatealamat" method="post">
        @csrf
        <div class="card text-center">
            <div class="card-header">
                <h2>Update Alamat</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3" style="text-align: right;">
                        ID
                    </div>
                    <div class="col" style="text-align: left; vertical-align: middle;">
                        <input class="w-50" type="number" name="id" id="" placeholder="ID" value="{{ old('id') }}">
                    </div>
                    @error('id')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="row">
                    <div class="col-3" style="text-align: right;">
                        Penerima
                    </div>
                    <div class="col" style="text-align: left; vertical-align: middle;">
                        <input class="w-50" type="text" name="penerima" id="" placeholder="Penerima" value="{{ old('penerima') }}">
                    </div>
                    @error('penerima')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="row">
                    <div class="col-3" style="text-align: right;">
                        Nomor Hp
                    </div>
                    <div class="col" style="text-align: left; vertical-align: middle;">
                        <input type="number" class="w-50" name="nohp" id="" placeholder="No Hp" value="{{ old('No Hp') }}">
                    </div>
                    @error('nohp')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="row">
                    <div class="col-3" style="text-align: right;">
                        Provinsi
                    </div>
                    <div class="col" style="text-align: left; vertical-align: middle;">
                        <input class="w-50" type="text" name="provinsi" id="" placeholder="Provinsi" value="{{ old('provinsi') }}">
                    </div>
                    @error('provinsi')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="row">
                    <div class="col-3" style="text-align: right;">
                        Kota
                    </div>
                    <div class="col" style="text-align: left; vertical-align: middle;">
                        <input class="w-50" type="text" name="kota" id="" placeholder="kota" value="{{ old('kota') }}">
                    </div>
                    @error('kota')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="row">
                    <div class="col-3" style="text-align: right;">
                        Kecamatan
                    </div>
                    <div class="col" style="text-align: left; vertical-align: middle;">
                        <input type="text" class="w-50" name="kecamatan" id="" placeholder="Kecamatan" value="{{ old('kecamatan') }}">
                    </div>
                    @error('kecamatan')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="row">
                    <div class="col-3" style="text-align: right;">
                        Kelurahan
                    </div>
                    <div class="col" style="text-align: left; vertical-align: middle;">
                        <input type="text" class="w-50" name="kelurahan" id="" placeholder="Kelurahan" value="{{ old('kelurahan') }}">
                    </div>
                    @error('kelurahan')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="row">
                    <div class="col-3" style="text-align: right;">
                        Kode Pos
                    </div>
                    <div class="col" style="text-align: left; vertical-align: middle;">
                        <input type="number" class="w-50" name="kodepos" id="" placeholder="Kode Pos" value="{{ old('kodepos') }}">
                    </div>
                    @error('kodepos')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="row">
                    <div class="col-3" style="text-align: right;">
                        Jalan
                    </div>
                    <div class="col" style="text-align: left; vertical-align: middle;">
                        <input class="w-50" type="text" name="jalan" id="" placeholder="Jalan" value="{{ old('jalan') }}">
                    </div>
                    @error('jalan')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <br>
                <div class="row" style="text-align: center;">
                    <div class="col"></div>
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-block">Update Alamat</button>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
