<!-- awal form login -->
<div class="container mt-3">
    <div class="card m-auto col-md-6">
        <div class="row mb-3 mt-3">
            <div class="col">
                <h3 class="text-center">Login</h3>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email anda">
                    </div>
                    <div class="form-group">
                        <label for="password_login">Password</label>
                        <input type="password" class="form-control" id="password_login" placeholder="*******">
                        <input type="checkbox" class="form-checkbox mt-2" id="checkbox">
                        Show Password
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="" class="text-decoration-none" data-toggle="modal" data-target="#exampleModal">
                                Belum memiliki akun?
                            </a>
                        </div>
                    </div>
                    <button id="suryadi" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir form login -->

<!-- modal registrasi -->
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="mt-3 mb-2">
                <h5 class="text-center" id="exampleModalLabel">Registrasi</h5>
                <hr>
            </div>
            <div class="modal-body">
                <form class="mt-n4">
                    <div class="form-group">
                        <label for="nama_modal">Nama</label>
                        <input type="text" class="form-control" id="nama_modal" placeholder="Masukkan nama lengkap anda">
                    </div>
                    <div class="form-group">
                        <label for="email_modal">Email</label>
                        <input type="email" class="form-control" id="email_modal" placeholder="Masukkan email lengkap anda">
                    </div>
                    <div class="form-group">
                        <label for="password_modal">Password</label>
                        <input type="password" class="form-control" id="password_modal" placeholder="*******">
                    </div>
                    <div class="form-group">
                        <label for="password_modal2">Ulangi Password</label>
                        <input type="password" class="form-control" id="password_modal2" placeholder="*******">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Daftar</button>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal -->