@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <div class="d-flex justify-content-between text-mute">
            <div class="align-self-center">
                <h1>Form Retur</h1>
            </div>
        </div>
        <hr>
        <div>
            <form action="/retur/getNew" method="post">
                @csrf
                <span class="fs-4">Pilih ID Pemesanan</span>
                <select name="idPemesanan" id="" onchange="this.form.submit()">
                    @foreach ($pemesanan as $p)
                        <option value="{{ $p->id }}" {{ $p->id == $currentPemesanan->id ? 'selected' : ''}}>{{ $p->id_pemesanan }}</option>
                    @endforeach
                </select>
            </form>
            <hr>
            <h3>Detail</h3>
            <form action="" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Buku</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Jumlah Retur</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($currentPemesanan->Detail as $d)
                            <tr>
                                <th scope="row" class="align-middle">{{ $d->Buku->judul }}</th>
                                <th scope="row" class="align-middle">{{ $d->qty }}</th>
                                <td class="align-middle"><input type="number" name="buku{{ $d->Buku->id }}" id="" max="{{ $d->qty }}" min="0" value="0"></td>
                            </tr>
                        @endforeach
                        <tr>

                        </tr>
                    </tbody>
                </table>
                <span>Keterangan Retur</span><br>
                <textarea name="keterangan" id="" cols="50" rows="5" placeholder="Keterangan"></textarea><br>
                Upload Bukti Retur : <input type="file" accept="image/*" name="file" id=""><br><br>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
    @if($errors->any())
        <script>alert('{{ $errors->first() }}')</script>
    @endif
@endsection
