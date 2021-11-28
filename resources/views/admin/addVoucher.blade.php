@extends('layouts.admin')
@section('container')
    <div class="container pt-4" style="text-align: center">
        <form action="/admin/voucher/add-voucher" method="post">
            @csrf
            <div class="card text-center">
                <div class="card-header">
                    <h2>Add Voucher</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Judul Voucher
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="text" name="judul" id="" placeholder="Judul Voucher">
                        </div>
                        @error('judul')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Kode
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input type="text" class="w-50" name="kode" id="kodeVoucher" placeholder="Kode Voucher" onclick="getValue();">
                        </div>
                        @error('kode')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Batas
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="number" name="batas" id="" placeholder="Batas Pakai">
                        </div>
                        @error('batas')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Jumlah Point
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="number" name="jumlahpoint" id="" placeholder="Jumlah Point">
                        </div>
                        @error('jumlahpoint')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5" style="text-align: right;">
                            Durasi
                        </div>
                        <div class="col" style="text-align: left; vertical-align: middle;">
                            <input class="w-50" type="number" name="durasi" id="" placeholder="Hari">
                        </div>
                        @error('durasi')
                            <span style='color: red'>{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="row" style="text-align: center;">
                        <div class="col"></div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success btn-block">Add Voucher</button>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </form>
        <br>
        {{-- <button class="btn btn-primary">Generate</button> --}}
    </div>
    <script>
        function getValue(){
            document.getElementById("kodeVoucher").value = makeid(5)+"-"+makeid(5);
        }

        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }
    </script>
@endsection
