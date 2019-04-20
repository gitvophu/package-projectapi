$(document).ready(function () {
    $("button[type='submit']").on('click', function (e) {
        // e.preventDefault();
        
        var email = $('#email').val();
        var password = $('#password').val();
        var name = $('#name').val();
        var tel = $('#tel').val();
        // $('#register-form').submit();
        // if(validate(email, password, name, tel)){
        //     $('#register-form').submit();
        //     console.log('submit')
        // }
        
    })

    function validate(email, password, name, tel) {
        var flag = true;
        if (!email || !password || !name || !tel) {
            swal("Cảnh báo", "Vui lòng điền đủ thông tin", "error");
            flag = false;
        }
        return flag;

    }
})