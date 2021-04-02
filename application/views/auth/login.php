<!-- awal form login -->
<div class="container mt-3">
    <div class="card m-auto col-md-6 bg-light">
        <div class="row mb-3 mt-3">
            <div class="col">
                <h3 class="text-center">Login</h3>
                <hr style="width: 40px;" class="mt-1 bg-dark">
            </div>
        </div>
        <?= $this->session->flashdata('error') ?>
        <?= $this->session->flashdata('sukses') ?>
        <?= $this->session->flashdata('validasi') ?>
        <div class="row mb-3">
            <div class="col">
                <form action="<?= base_url() ?>Auth/login" method="POST">
                    <div class="form-group">
                        <label for="email_login">Email</label>
                        <input type="email" class="form-control" name="email_login" id="email_login" aria-describedby="emailHelp" placeholder="Masukkan email anda">
                    </div>
                    <div class="form-group">
                        <label for="password_login">Password</label>
                        <input type="password" class="form-control" name="password_login" id="password_login" placeholder="*******">
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
                    <button class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir form login -->

<!-- modal registrasi -->
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="mt-3 mb-2">
                <h5 class="text-center" id="exampleModalLabel">Registrasi</h5>
            </div>
            <div class="container">
                <form action="<?= base_url() ?>auth/registrasi" method="post" class="mb-3">
                    <div class="form-group">
                        <label for="nama_modal">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama_modal" placeholder="Masukkan nama lengkap anda" value="<?= set_value('nama') ?>">
                    </div>
                    <div class="form-group">
                        <label for="email_modal">Email</label>
                        <input type="email" name="email" class="form-control" id="email_modal" placeholder="Masukkan email lengkap anda" value="<?= set_value('email') ?>">
                    </div>
                    <div class="form-group">
                        <label for="password_modal">Password</label>
                        <input type="password" name="password" class="form-control" id="password_modal" placeholder="*******" value="<?= set_value('password') ?>">
                    </div>
                    <div class="form-group">
                        <label for="password_modal2">Konfirmasi Password</label>
                        <input type="password" name="password2" class="form-control" id="password_modal2" placeholder="*******" value="<?= set_value('password2') ?>">
                    </div>
                    <div class="row float-right mb-3">
                        <div class="col">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal -->