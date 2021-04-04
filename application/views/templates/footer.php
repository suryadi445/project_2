<!-- jquery -->
<script src="<?= base_url() ?>assets/js/jquery-3.6.0.js"></script>


<!-- bootstrap js -->
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- sweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?= base_url() ?>assets/swal/sweetalert2.min.js"></script>

<!-- my js -->
<script src="<?= base_url() ?>assets/js/script.js"></script>

<script>
    let flash = $('.flash_sukses').data('flash');

    if (flash) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Good..!',
            text: flash,
            showConfirmButton: false,
            timer: 1500
        })
    }

    let flash_error = $('.flash_error').data('flash');

    if (flash_error) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Oops..',
            text: flash_error,
            showConfirmButton: true,
        })
    }
</script>
</body>

</html>