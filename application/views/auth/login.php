<body class="background-login">
    <!-- awal form login -->
    <div class="container mt-3 margin">
        <div class="card m-auto col-md-6" style="width: 100%;">
            <div class="row mb-3 mt-3">
                <div class="col">
                    <h3 class="text-center">Login</h3>
                    <hr style="width: 40px;" class="mt-1 bg-dark">
                </div>
            </div>
            <div class="flash_error" data-flash="<?= $this->session->flashdata('error') ?>"></div>
            <div class="flash_sukses" data-flash="<?= $this->session->flashdata('sukses') ?>"></div>
            <?= $this->session->flashdata('validasi'); ?>
            <div class="container">
                <div class="row mb-3">
                    <div class="col">
                        <form action="<?= base_url() ?>Auth/login" method="POST">
                            <div class="form-group">
                                <label for="email_login">Email</label>
                                <input type="email" class="form-control" name="email_login" id="email_login" aria-describedby="emailHelp" placeholder="Masukkan email anda">
                                <?= form_error('email_login', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password_login">Password</label>
                                <input type="password" class="form-control" name="password_login" id="password_login" placeholder="*******">
                                <?= form_error('password_login', '<small class="text-danger">', '</small><br>'); ?>
                                <input type="checkbox" class="form-checkbox mt-2" id="checkbox">
                                Show Password
                            </div>
                            <button class="btn btn-success mb-n3 w-100">Masuk</button>
                        </form>
                    </div>
                </div>
                <div class="row text-secondary d-inline">
                    <div class="col text-center">
                        atau masuk dengan
                    </div>
                </div>
                <div class="row mx-sm-n5">
                    <div class="col px-sm-5">
                        <button class="p-2 ml-3 border btn btn-primary float-left rounded-pill w-100">
                            <i class="fab fa-facebook-f"></i>
                            Facebook</button>
                    </div>
                    <div class="col px-sm-5">
                        <button class="p-2 mr-3 border btn btn-danger float-right rounded-pill w-100">
                            <i class="fab fa-google"></i>
                            Google
                        </button>
                    </div>
                </div>
                <div class="row mt-3 mb-4 text-center">
                    <div class="col">
                        belum memiliki akun?
                        <a href="" class="text-decoration-none text-success" data-toggle="modal" data-target="#exampleModal">
                            Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir form login -->



    <!-- modal registrasi -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="daftar_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-white text-dark">
                <div class="mt-4">
                    <h4 class="text-center" id="daftar_modal">Daftar Sekarang</h4>
                    <hr class="mb-n4">
                </div>
                <div class="container p-5">
                    <form action="<?= base_url() ?>auth/registrasi" method="post" class="mb-3">
                        <div class="form-group pt-2">
                            <input type="text" name="nama" class="form-control bg-light" id="nama_modal" placeholder="Nama" value="<?= set_value('nama') ?>">
                        </div>
                        <div class="form-group pt-2">
                            <input type="email" name="email" class="form-control bg-light" id="email_modal" placeholder="Email" value="<?= set_value('email') ?>">
                        </div>
                        <div class="form-group pt-2">
                            <input type="password" name="password" class="form-control bg-light" id="password_modal" placeholder="Password" value="<?= set_value('password') ?>">
                        </div>
                        <div class="form-group pt-2">
                            <input type="password" name="password2" class="form-control bg-light" id="password_modal2" placeholder="Confirm Password" value="<?= set_value('password2') ?>">
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