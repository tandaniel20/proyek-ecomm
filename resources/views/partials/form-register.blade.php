<div class="container">
    <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
        <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Daftar</h5>
            <form action="/register-user" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap" name="name">
                    <label for="floatingInput">Nama Lengkap</label>
                    @error('name')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <span style='color: red'>{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Daftar</button>
                </div>
            </form>
            <h5 class="text-center mt-5 fw-light fs-5">Sudah Punya Akun? <a href="/login">Masuk</a></h5>
        </div>
        </div>
    </div>
    </div>
</div>
