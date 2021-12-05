@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container d-flex flex-wrap m-5">
        <div class="w-25 d-flex justify-content-center" style="height: 25vh;">
            <img src="<?= asset('storage/imageBuku/')?>/{{ $buku["id"] }}.png" alt="" class="w-75 img-thumbnail">
        </div>
        <div class="w-50" style="height: 75vh;">
            <span class="fw-bold">
                <h2>
                    {{ $buku["judul"] }}
                    @if (Auth::check())
                        @if (isset($wishlist))
                        <a href="/buku/{{ $buku["id"] }}/removeWishlist">
                            <button class="btn btn-danger rounded-circle shadow-lg" href="google.com">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                            </button>
                        </a>
                        @else
                        <a href="/buku/{{ $buku["id"] }}/wishlist">
                            <button class="btn btn-secondary rounded-circle shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                </svg>
                            </button>
                        </a>
                        @endif
                    @endif
                </h2>
            </span>
            @if (isset($dpromo))
                <h4>
                    <span class="fw-bold" style="text-decoration: line-through">{{ "Rp " . number_format($buku["harga"],0,',','.') }}</span>
                    <span class="fw-bold text-danger">{{ "Rp " . number_format($dpromo["harga_promo"],0,',','.') }}</span> <br>
                    <span class="text-muted fs-6">Hingga {{ $dpromo["tanggal_exp"] }}</span>
                </h4>
            @else
                <h4><span class="fw-bold">{{ "Rp " . number_format($buku["harga"],0,',','.') }}</span></h4>
            @endif
            <hr>
            <span>Rating : </span>
            @if ($currentRate >= 1)
                <span class="fa fa-star checkedStar"></span>
            @else
                <span class="fa fa-star"></span>
            @endif

            @if ($currentRate >= 2)
                <span class="fa fa-star checkedStar"></span>
            @else
                <span class="fa fa-star"></span>
            @endif

            @if ($currentRate >= 3)
                <span class="fa fa-star checkedStar"></span>
            @else
                <span class="fa fa-star"></span>
            @endif

            @if ($currentRate >= 4)
                <span class="fa fa-star checkedStar"></span>
            @else
                <span class="fa fa-star"></span>
            @endif

            @if ($currentRate >= 5)
                <span class="fa fa-star checkedStar"></span>
            @else
                <span class="fa fa-star"></span>
            @endif
            <span class="text-muted"> {{ number_format($currentRate,1,',','.') }}</span><br>
            <span class="text-muted">Description : </span> <br>
            <span>{{ $buku["deskripsi"] }}</span>
            <hr>
            <div class="row text-muted">
                <div class="col">
                    <span>Penulis</span>
                </div>
                <div class="col-10">
                    <span>: {{ $buku["penulis"] }}</span>
                </div>
            </div>
            <div class="row text-muted">
                <div class="col">
                    <span>Penerbit</span>
                </div>
                <div class="col-10">
                    <span>: {{ $buku["penerbit"] }}</span>
                </div>
            </div>
            <div class="row text-muted">
                <div class="col">
                    <span>Bahasa</span>
                </div>
                <div class="col-10">
                    <span>: {{ $buku["bahasa"] }}</span>
                </div>
            </div>
            <div class="row text-muted">
                <div class="col">
                    <span>Tahun</span>
                </div>
                <div class="col-10">
                    <span>: {{ $buku["tahun"] }}</span>
                </div>
            </div>
            <div class="row text-muted">
                <div class="col">
                    <span>Berat</span>
                </div>
                <div class="col-10">
                    <span>: {{ $buku["berat"] }}</span>
                </div>
            </div>
            <div class="row text-muted">
                <div class="col">
                    <span>Dimensi</span>
                </div>
                <div class="col-10">
                    <span>: {{ $buku["dimensi"] }}</span>
                </div>
            </div>
            <div class="row text-muted">
                <div class="col">
                    <span>Cover</span>
                </div>
                <div class="col-10">
                    <span>: {{ $buku["cover"] }}</span>
                </div>
            </div>
            <hr>
            <div>
                <h3>User Responses</h3>
                @foreach ($responseUsers as $r)
                    <div class="card">
                        <div class="card-body">
                            @if ($r->rate >= 1)
                                <span class="fa fa-star checkedStar"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif

                            @if ($r->rate >= 2)
                                <span class="fa fa-star checkedStar"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif

                            @if ($r->rate >= 3)
                                <span class="fa fa-star checkedStar"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif

                            @if ($r->rate >= 4)
                                <span class="fa fa-star checkedStar"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif

                            @if ($r->rate >= 5)
                                <span class="fa fa-star checkedStar"></span>
                            @else
                                <span class="fa fa-star"></span>
                            @endif
                            <span class="text-muted"> {{ number_format($r->rate,1,',','.') }} from {{ $r->User->name }}</span>
                            <br>
                            <span>
                                {{ $r->response }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if (Auth::check())
            <div class="w-25" style="height: 75vh;">
                <div class="card flex" style="w-100 h-50">
                    <div class="card-body">
                        <div class="h-75">
                            <h5 class="card-title text-center">Tambahkan ke Keranjang</h5>
                        </div>
                        <div>
                            <p class="card-text">Jumlah Barang :</p>
                            <button class="btn btn-success rounded-circle" onclick="kurangValue()">-</button>
                            <input type="number" name="jumlah" id="inp_jumlah" value="0" class="w-25 rounded" onchange="changeTotal()">
                            <button class="btn btn-success rounded-circle" onclick="tambahValue()">+</button>
                            <span class="cart-text" style="color:gray;">Stock : {{ $buku["stock"] }}</span>
                            <hr>
                            <span>Subtotal : Rp. </span>
                            <span id="subtotal">0</span>
                            <hr>
                            <form action="addToCart" method="post">
                                @csrf
                                <input type="hidden" name="jumlahBarang" id="jumlahBarang" value="0">
                                <input type="hidden" name="hargaBarang" id="hargaBarang" value="{{ $buku["harga"] }}">
                                <input type="hidden" name="hargaDiskon" id="hargaDiskon" value="{{ isset($dpromo) ? $dpromo["harga_promo"] : -1 }}">
                                <input type="hidden" name="totalBarang" id="totalBarang" value="0">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success rounded">Add to Cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @if($errors->any())
        <script>alert('{{ $errors->first() }}')</script>
    @endif
    <script>
        function ubahNilai(){
            var harga
            if (document.getElementById("hargaDiskon").value == -1){
                harga = document.getElementById("hargaBarang").value;
            }else{
                harga = document.getElementById("hargaDiskon").value;
            }
            var banyak = document.getElementById("inp_jumlah").value;
            var total = parseInt(harga)*parseInt(banyak);
            document.getElementById("subtotal").innerHTML = total;
            document.getElementById("totalBarang").value = total;
            document.getElementById("jumlahBarang").value = banyak;
        }

        function changeTotal(){
            ubahNilai();
        }

        function tambahValue(){
            document.getElementById("inp_jumlah").value = parseInt(document.getElementById("inp_jumlah").value) + 1;
            document.getElementById("jumlahBarang").value = parseInt(document.getElementById("jumlahBarang").value) + 1;
            ubahNilai();
        }

        function kurangValue(){
            if (parseInt(document.getElementById("inp_jumlah").value) > 0){
                document.getElementById("inp_jumlah").value = parseInt(document.getElementById("inp_jumlah").value) - 1;
                document.getElementById("jumlahBarang").value = parseInt(document.getElementById("jumlahBarang").value) - 1;
                ubahNilai();
            }
        }
    </script>
@endsection
