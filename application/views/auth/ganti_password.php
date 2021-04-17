<body class="hold-transition login-page background-password">
    <div class="login-box">
        <div class="login-logo text-white">
            <p><b>GANTI PASSWORD</b></p>
        </div>
        <!-- /.login-logo -->
        <div class=" card">
            <div class="card-body login-card-body text-black">
                <p class="login-box-msg ">Masukan kata sandi baru Anda</p>
                <!-- alert -->
                <div class="toastrDefaultError" data-flash_gagal="<?= $this->session->flashdata('gagal') ?>"></div>
                <div class="toastsDefaultDanger" data-flash_toast="<?= $this->session->flashdata('error') ?>"></div>
                <div class="swalDefaultError" data-flash_validasi="<?= $this->session->flashdata('validasi') ?>"></div>
                <div class="alert_sukses" data-alert-sukses="<?= $this->session->flashdata('alert_sukses') ?>"></div>
                <div class="flash_sukses" data-flash="<?= $this->session->flashdata('sukses') ?>"></div>

                <form action="<?= base_url('auth/ganti_password'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control text-secondary text-capitalize" name="session_email" value="<?= $this->session->userdata('reset_email') ?>" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="ganti_password1" id="ganti_password1" placeholder=" Masukkan Password Baru Anda">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('ganti_password1', '<div class="text-danger mt-n3">', '</div>'); ?>
                    <div class="input-group">
                        <input type="password" class="form-control" name="ganti_password2" id="ganti_password2" placeholder="Konfirmasi Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-2">
                        <input type="checkbox" class="form-checkbox" id="checkbox_gantiPassword">
                        Show Password
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

</body>