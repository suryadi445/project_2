$('document').ready(function() {
    $('#checkbox').click(function(){
        if($(this).is(':checked')){
            $('#password_login').attr('type', 'text')
        }else{
            $('#password_login').attr('type', 'password')
        }
    })

    $('#checkbox_modal').click(function(){
        if($(this).is(':checked')){
            $('#password_modal').attr('type', 'text')
            $('#password_modal2').attr('type', 'text')
        }else{
            $('#password_modal').attr('type', 'password')
            $('#password_modal2').attr('type', 'password')
        }
    })

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
                    window.location = link;
                } 
            })
    })
})