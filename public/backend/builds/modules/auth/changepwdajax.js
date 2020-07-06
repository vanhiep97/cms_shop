jQuery(document).ready(function ($) {
    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    $('#changePwdModal').modal('hide');
    $(document).on("click", '#changePassword', function (e) {
        e.preventDefault();
        $('#changePwdModal').modal('show');
    });
    var formChangePass = $('#formChangePass');
    formChangePass.validate({
        rules: {
            password: {
                required: true,
                minlength: 6,
            },
            passwordNew: {
                required: true,
                minlength: 6,
            },
            passwordConfirm: {
                required: true,
            }
        },
        messages: {
            password: {
                required: 'Vui lòng nhập mật khẩu cũ',
                minlength: 'Mật khẩu tối thiểu 6 kí tự'
            },
            passwordNew: {
                required: 'Vui lòng nhập mật khẩu mới',
                minlength: 'Mật khẩu mới tối thiểu 6 kí tự'
            },
            passwordConfirm: {
                required: 'Vui lòng nhập lại mật khẩu',
            }
        },
        submitHandler: function (form) {
            let userId = $('#changePassword').data('id');
            let urlResource = 'admin/change-password/' + userId;
            let dataResource = formChangePass.serialize();
            callAjax(urlResource, 'PATCH', dataResource)
                .done(response => {
                    if (response.code === 200) {
                        $('#changePwdModal').modal('hide');
                        loadSwalAlert('success', 'OK', 'Thay đổi mật khẩu thành công');
                        window.location.href = '/login';
                    } else {
                        loadSwalAlert('error', '!OK', 'Thay đổi mật khẩu không thành công');
                    }
                })
                .fail(error => {
                    if (error.responseJSON.errors.password) {
                        loadSwalAlert('error', '!OK', 'Mật khẩu cũ không đúng');
                    }
                    if (error.responseJSON.errors.passwordNew) {
                        loadSwalAlert('error', '!OK', 'Mật khẩu mới không được trùng với mật khẩu ban đầu');
                    }
                    if (error.responseJSON.errors.passwordConfirm) {
                        loadSwalAlert('error','!OK','Xác nhận mật khẩu không chính xác');
                    }
                });
        }
    });
});
