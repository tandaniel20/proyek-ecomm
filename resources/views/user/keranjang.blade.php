@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container mt-3">
        <h1>Keranjang</h1>
        <hr>
        <?php
            $totalSemua = 0;
        ?>
        @foreach ($keranjang as $k)
            <div class="card mb-3 w-auto" style="height: 15vh;">
                <div class="d-flex flex-row">
                    <div class="align-self-center w-25">
                        <img src="<?= asset('storage/imageBuku/')?>/{{ $k->Buku["id"] }}.png" class="img-fluid img-thumbnail rounded-start w-100" alt="" style="height: 15vh; object-fit: cover">
                    </div>
                    <div class="align-self-center">
                        <div class="card-body align-middle">
                            <h5 class="card-title">{{ $k->Buku->judul }}</h5>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <a href="/cart/{{ $k->id }}/kurang">
                            <button type="button" class="btn btn-success rounded-circle">
                                -
                            </button>
                        </a>
                    </div>
                    <div class="align-self-center">
                        <div class="card-body align-middle">
                            <p class="card-text">Jumlah : {{ $k->qty }}</p>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <a href="/cart/{{ $k->id }}/tambah">
                            <button type="button" class="btn btn-success rounded-circle">
                                +
                            </button>
                        </a>
                    </div>
                    <div class="align-self-center">
                        <div class="card-body align-middle">
                            <p class="card-text">Subtotal :
                                <?php
                                    $ketemu = false;
                                    $total = 0;
                                    foreach ($dpromo as $dp) {
                                        if ($dp["id_buku"] == $k->Buku->id){
                                            $ketemu = true;
                                            $total = $k->qty * $dp["harga_promo"];
                                            echo "Rp " . number_format($total,0,',','.');
                                        }
                                    }
                                    if (!$ketemu){
                                        $total = $k->Buku->harga*$k->qty;
                                        echo "Rp " . number_format($total,0,',','.');
                                    }
                                    $totalSemua += $total;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="align-self-center flex-grow-1 text-end">
                        <div class="card-body align-middle">
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $k->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $k->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $k->id }}">Delete Item Keranjang</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin membuang Item?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="/cart/{{ $k->id }}/remove"><button type="button" class="btn btn-primary">Delete</button></a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <form action="/cart/{{ $k->id }}/remove" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <hr>
        <div class="d-flex justify-content-between">
            <div class="align-middle">
                <h3>Total : {{ "Rp " . number_format($totalSemua,0,',','.') }}</h3>
            </div>
            <div>
                <a href="/checkout">
                    <button type="button" class="btn btn-success">To Check Out</button>
                </a>
            </div>
        </div>

        <hr>
    </div>
    @if($errors->any())
        <script>alert('{{ $errors->first() }}')</script>
    @endif
@endsection
