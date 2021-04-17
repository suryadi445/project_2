$('document').ready(function() {
    // show password login
    $('#checkbox').click(function(){
        if($(this).is(':checked')){
            $('#password_login').attr('type', 'text')
        }else{
            $('#password_login').attr('type', 'password')
        }
    })

    // show password registrasi
    $('#checkbox_modal').click(function(){
        if($(this).is(':checked')){
            $('#password_modal').attr('type', 'text')
            $('#password_modal2').attr('type', 'text')
        }else{
            $('#password_modal').attr('type', 'password')
            $('#password_modal2').attr('type', 'password')
        }
    })
    // show password ganti password
    $('#checkbox_gantiPassword').click(function(){
        if($(this).is(':checked')){
            $('#ganti_password1').attr('type', 'text')
            $('#ganti_password2').attr('type', 'text')
        }else{
            $('#ganti_password1').attr('type', 'password')
            $('#ganti_password2').attr('type', 'password')
        }
    })

    // logout
    $('#logout').click(function(e){
        e.preventDefault();

        var link = $(this).attr('href');
            Swal.fire({
            icon: 'warning',
            title: 'Apakah anda yakin?',
            showCancelButton: true,
            confirmButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout',
            cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                    title:'Logout berhasil!!',
                    icon:'success',
                    showConfirmButton: false,
                    timer: 2000
                    })
                    window.location = link;
                } 
            })
    })
})