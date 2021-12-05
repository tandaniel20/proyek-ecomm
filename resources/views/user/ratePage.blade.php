@extends('layouts.main')
@section('navbar')
    @include('partials.navbar')
@endsection
@section('container')
    <div class="container pt-5">
        <div class="w-full">
            <h1>Rate Buku {{ $buku->judul }}</h1>
        </div>
        <hr>
        <div class="d-flex flex-wrap m-5">
            <div class="w-50 justify-content-center" style="height: 35vh;">
                <div class="w-75">
                    <img src="<?= asset('storage/imageBuku/')?>/{{ $buku["id"] }}.png" alt="" class="img-thumbnail">
                </div>
                <div class="w-full">
                    <span>Current rate : </span>
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
                    <span class="text-muted"> {{ number_format($currentRate,1,',','.') }}</span>
                </div>
            </div>
            <div class="w-50" style="height: 40vh;">
                <form action="/rate/{{ $buku->id }}/submit" method="post">
                    @csrf
                    <h3>Rate It</h3>
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="5">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="4">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="3">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="2">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="1">1 star</label>
                    </div><br><br>
                    Response : <br>
                    <textarea name="responseUser" id="" cols="40" rows="5" placeholder="Your response"></textarea><br><br>
                    <button type="submit" class="btn btn-warning">Rate</button>
                </form>
            </div>
        </div>
    </div>
@endsection
