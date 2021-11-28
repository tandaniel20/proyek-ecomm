<nav class="navbar navbar-expand-lg navbar-light bg-primary bg-gradient" style="--bs-bg-opacity: .2;">
    <div class="container">
        <a class="navbar-brand" href="/home">
            <img src="/img/logo.png" alt="Milimedia" width="30" height="24">
            Milimedia
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="ms-md-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="/home/promo" class="nav-link" role="button">Promo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($kategori as $k)
                            <li><a class="dropdown-item" href="/home/{{ $k["id"] }}">{{ $k["namakategori"] }}</a></li>
                        @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <form class= "d-flex me-auto col-5" method="POST" action="/home/search">
                @csrf
                <input class="form-control me-2" name="searchKey" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            <ul class="navbar-nav col-3">
                @if (Auth::check())
                    <li class="nav-item dropdown text-center">
                        <a class="nav-link dropdown-toggle px-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->email }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/pemesanan">Pemesanan</a></li>
                            <li><a class="dropdown-item" href="/alamat">Alamat</a></li>
                            <li><a class="dropdown-item" href="/point">My Point</a></li>
                            <li><a class="dropdown-item" href="/wishlist">Wishlist</a></li>
                            <li><a class="dropdown-item" href="/retur">Retur</a></li>
                            <li><a class="dropdown-item" href="/logout-user">Keluar</a></li>
                        </ul>
                    </li>
                    <li class="navbar-brand col-xs-2">
                        <a href="/cart" class="">
                            <img src="/img/cart-logo.png" alt="Cart" width="24" height="24">
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown {{ $errors->any()?'open':'' }} me-auto w-100 text-center">
                        <a class="nav-link dropdown-toggle px-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Masuk
                        </a>
                        <div class="dropdown-menu dropdown-menu-end p-4" id="modalLogin">
                            <form action="/login-user" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail2">Email</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com" name="email">
                                    @error('email')
                                        <span style='color: red'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormPassword2">Password</label>
                                    <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password" name="password">
                                    @error('password')
                                        <span style='color: red'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center my-2">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                            </form>
                            <div class="dropdown-divider"></div>
                            <div class="text-center">
                                Belum mendaftar? <a href="/register">Daftar</a>
                            </div>
                        </div>
                    </li>
                    <li class="navbar-brand col-xs-2">
                        <a href="/register" class="">
                            <img src="/img/cart-logo.png" alt="Cart" width="24" height="24">
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
