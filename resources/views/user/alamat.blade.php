@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.5.1/js/bootstrap.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    } );
</script>
<div class="row">
    <div class="col">
        <h1>Alamat</h1>
    </div>
    <div class="col-2 my-auto" style="">
        <a href="/keAddAlamat"><button  type="submit" class="btn btn-primary col-12">Add Alamat</button></a>
    </div>
</div>
<hr>
<div class="container-fluid" style="text-align: center;">
    @csrf
    <table id="editable" class="display">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Penerima</th>
            <th scope="col">No Hp</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Kota</th>
            <th scope="col">Kecamatan</th>
            <th scope="col">Kelurahan</th>
            <th scope="col">Kodepos</th>
            <th scope="col">Nama Jalan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $alamat as $alamat)
            <tr>
                <td>{{$alamat->id}}</td>
                <td>{{$alamat->penerima}}</td>
                <td>{{$alamat->nohp}}</td>
                <td>{{$alamat->provinsi}}</td>
                <td>{{$alamat->kota}}</td>
                <td>{{$alamat->kecamatan}}</td>
                <td>{{$alamat->kelurahan}}</td>
                <td>{{$alamat->kodepos}}</td>
                <td>{{$alamat->jalan}}</td>
                <td><a href="/keupdatealamat/{{ $alamat["id"] }}" class="btn btn-warning">Update</a></td>
                <td><a href="/deletealamat/{{ $alamat["id"] }}" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
