jQuery(document).ready(function ($) {
    var loginForm = $('#form-login');

    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    loginForm.validate({
        rules: {
            email: {
                required: true,
                email: true,
                minlength: 6,
            },
            password: {
                required: true,
                minlength: 6,
            }
        },
        messages: {
            email: {
                required: 'Vui lòng nhập Email',
                email: 'Email không đúng định dạng',
                minlength: 'Email tối thiểu 6 kí tự'
            },
            password: {
                required: 'Vui lòng nhập mật khẩu',
                minlength: 'Mật khẩu tối thiểu 6 kí tự'
            }
        },
        submitHandler: function (form) {
            let urlResource = '/sign-in/';
            let dataResource = loginForm.serialize();
            callAjax(urlResource, 'POST', dataResource)
                .done(response => {
                    if (response.code === true) {
                        loadSwalAlert('success', 'OK', 'Đăng nhập thành công');
                        window.location.href = '/admin';
                    } else {
                        loadSwalAlert('error', '!OK', 'Đăng nhập thất bại');
                    }
                })
                .fail(error => {
                    console.log(error);
                });
        }
    });
});
