@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-5 pt-5 mx-auto">
        <span class="fs-1 fw-bold">Kirim Bukti Transfer {{ $pemesanan->id_pemesanan }}</span>
        <hr>
        <span class="fs-2">Silahkan lakukan Transfer ke Rekening BCA</span><br>
        <span class="fs-3">Nomor Rekening : 189030122301</span><br>
        <span class="fs-3">a/n Tan, Daniel Indrajaya Prajitno Putra</span><br>
        <hr>
        <span class="fs-4">Kirimkan foto bukti transfer</span><br>

        <form enctype="multipart/form-data" action="upload-bukti" method="post">
            @csrf
            Upload image : <input type="file" accept="image/*" name="file" id=""><br>
            @if($errors->any())
                <span class="text-danger">{{ $errors->first() }}</span><br>
            @endif
            <br>
            <input type="submit" value="Submit Bukti" class="btn btn-primary">
        </form>
        <hr>
        <a href="/pemesanan">
            <button type="button" class="btn btn-warning fs-4">Back to Pemesanan</button>
        </a>
    </div>
@endsection
