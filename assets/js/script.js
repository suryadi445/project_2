$('document').ready(function() {
    $('#checkbox').click(function(){
        if($(this).is(':checked')){
            $('#password_login').attr('type', 'text')
        }else{
            $('#password_login').attr('type', 'password')
        }
    })
})