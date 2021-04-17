<body class="hold-transition login-page background-login">
    <!-- awal form login -->
    <div class="container ">
        <div class="login-box m-auto" style="width: 430px;">
            <!-- alert -->
            <div class="toastrDefaultError" data-flash_gagal="<?= $this->session->flashdata('gagal') ?>"></div>
            <div class="toastsDefaultDanger" data-flash_toast="<?= $this->session->flashdata('error') ?>"></div>
            <div class="swalDefaultError" data-flash_validasi="<?= $this->session->flashdata('validasi') ?>"></div>
            <div class="alert_sukses" data-alert-sukses="<?= $this->session->flashdata('alert_sukses') ?>"></div>
            <div class="flash_sukses" data-flash="<?= $this->session->flashdata('sukses') ?>"></div>

            <!-- /.login-logo -->
            <div class="card card-outline card-light">
                <div class="card-header text-center">
                    <p class="h1"><b>Registrasi</b></p>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Masuk untuk memulai session Anda</p>
                    <form action="<?= base_url() ?>Auth/login" method="POST">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email_login" id="email_login" placeholder="Masukkan Email Anda">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('email_login', '<div class="text-danger mt-n3">', '</div>'); ?>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password_login" id="password_login" placeholder="Masukkan Password Anda">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('password_login', '<div class="text-danger ">', '</div>'); ?>
                        <div class="d-flex justify-content-between">
                            <p class="text-left">
                                <input type="checkbox" class="form-checkbox mt-1" id="checkbox">
                                Show Password
                            </p>
                            <p class="text-right">
                                <a href="#" class="text-success" data-toggle="modal" data-target="#modal_lupa_password">Lupa Password?</a>
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-success btn-block">Masuk</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <section class="d-flex mt-3">
                        <hr style="width: 100px;" class="">
                        <p class="mt-1">atau masuk dengan</p>
                        <hr style="width: 100px;">
                    </section>
                    <div class="social-auth-links text-center mt-2 mb-3">
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook-f mr-2"></i> Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google mr-2"></i> Google
                        </a>
                    </div>
                    <!-- /.social-auth-links -->
                    <div class="row mt-3 text-center">
                        <div class="col">
                            belum memiliki akun?
                            <a href="" class="text-decoration-none text-success" data-toggle="modal" data-target="#exampleModal">
                                Daftar
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    </div>
    <!-- akhir form login -->



    <!-- modal registrasi -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="daftar_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="modal_daftar">
            <div class="modal-content bg-white text-dark">
                <div class="mt-4">
                    <h4 class="text-center" id="daftar_modal"><b>Daftar Sekarang</b></h4>
                    <hr class="mb-n4">
                </div>
                <div class="container p-5">
                    <form action="<?= base_url() ?>auth/registrasi" method="post" class="mb-3">
                        <div class="form-group pt-2">
                            <input type="text" name="nama" class="form-control bg-light" id="nama_modal" placeholder="Nama">
                        </div>
                        <div class="form-group pt-2">
                            <input type="email" name="email" class="form-control bg-light" id="email_modal" placeholder="Email">
                            <?= form_error('email', '<div class="text-danger mt-n3">', '</div>'); ?>
                        </div>
                        <div class="form-group pt-2">
                            <input type="password" name="password" class="form-control bg-light" id="password_modal" placeholder="Password">
                        </div>
                        <div class="form-group pt-2">
                            <input type="password" name="password2" class="form-control bg-light" id="password_modal2" placeholder="Confirm Password">
                            <input type="checkbox" class="form-checkbox" id="checkbox_modal">
                            Show Password
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <button type="submit" class="btn btn-success w-100">Daftar</button>
                            </div>
                        </div>
                        <div class="row float-right">
                            <div class="col">
                                Sudah memiliki akun?
                                <a href="<?= base_url('auth/login'); ?>">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal -->


    <!-- modal lupa password -->
    <div class="modal fade" id="modal_lupa_password" tabindex="-1" aria-labelledby="modal_lupa_password" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="modal_lupa_password">
            <div class="modal-content bg-white text-dark">
                <div class="mt-4">
                    <h4 class="text-center" id="daftar_modal"><b>Lupa Password</b></h4>
                    <hr class="mb-n4">
                </div>
                <div class="container p-5">
                    <form action="<?= base_url() ?>auth/lupa_password" method="post" class="mb-3">
                        <div class="form-group row justify-content-between">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10 justify-content-end">
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="row mb-n4">
                            <button class="btn btn-primary col-lg-12" type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal -->