<!-- jquery -->
<!-- <script src="<?= base_url() ?>assets/js/jquery-3.6.0.js"></script> -->


<!-- bootstrap js -->
<!-- <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script> -->
<!-- sweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?= base_url() ?>assets/swal/sweetalert2.min.js"></script>

<!-- admin LTE -->

<!-- jQuery -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
    $.widget.bridge('uibutton', $.ui.button) <?= base_url('assets/adminLTE/') ?>
</script> -->
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/adminLTE/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/adminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<!-- <script src="<?= base_url('assets/adminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<!-- <script src="<?= base_url('assets/adminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminLTE/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url('assets/adminLTE/') ?>dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url('assets/adminLTE/') ?>dist/js/pages/dashboard.js"></script> -->
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/adminLTE/') ?>plugins/toastr/toastr.min.js"></script>

<!-- my js -->
<script src="<?= base_url() ?>assets/js/script.js"></script>

<script>
    // mendefinisikan variabel toast
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000
        });

        // alert untuk sukses
        let flash = $('.flash_sukses').data('flash');
        if (flash) {
            toastr.success(flash)
        }

        // alert untuk error
        let flash_error = $('.toastrDefaultError').data('flash_toast');
        if (flash_error) {
            // jika ada error
            Toast.fire({
                icon: 'error',
                title: flash_error
            })

            // jika validasi gagal
            let flash_validasi = $('.swalDefaultError').data('flash_validasi');
            if (flash_validasi) {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Oops..',
                    position: 'topLeft',
                    body: flash_validasi
                })
            }
        }
    })
</script>
</body>

</html>