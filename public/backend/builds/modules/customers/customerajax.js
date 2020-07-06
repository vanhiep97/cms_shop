jQuery(document).ready(function ($) {
    const customerForm = $('#customer-form');

    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    // show modal create
    $(document).on("click", "#btn-create-customer", function (e) {
        e.preventDefault();
        customerForm.trigger("reset");
        $('#modal-customer').modal('show');
    });

    // create or update brand
    customerForm.validate({
        rules: {
            customer_name: {
                required: true,
                minlength: 4,
                maxlength: 100,
            },
            customer_phone: {
                required: true,
                number: true
            },
            customer_email: {
                required: true,
                minlength: 15,
                maxlength: 100,
                email: true
            },
            customer_address: {
                required: true,
                minlength: 15,
            },
            customer_birthday: {
                required: true
            },
        },
        messages: {
            customer_name: {
                required: 'Vui lòng nhập tên khách hàng',
                minlength: 'Nhập tối thiểu 4 kí tự',
                maxlength: 'Nhập tối đa 100 kí tự',
            },
            customer_phone: {
                required: 'Vui lòng nhập SDT khách hàng',
                number: 'Vui lòng nhập vào kí tự số'
            },
            customer_email: {
                required: 'Vui lòng nhập email khách hàng',
                minlength: 'Nhập tối thiểu 15 kí tự',
                maxlength: 'Nhập tối đa 100 kí tự',
                email: 'Nhập email chưa đúng định dạng'
            },
            customer_address: {
                required: 'Vui lòng nhập địa chỉ khách hàng',
                minlength: 'Nhập tối thiểu 15 kí tự'
            },
            customer_birthday: {
                required: 'Vui lòng nhập ngày sinh khách hàng',
            },
        },
        submitHandler: function (form) {
            let dataResource = customerForm.serialize();
            let urlResource = "/admin/customers";
            callAjax(urlResource, 'POST', dataResource)
                .done(response => {
                    customerForm.trigger("reset");
                    $('#btn-save-customer').html('<i class="fa fa-check"></i> Lưu');
                    $('#modal-customer').modal('hide');
                    $('#alert-cms-success').css('display', 'block');
                    $('#text-alert-success').text("Tạo khách hàng thành công");
                    setTimeout(function() {
                        $('#alert-cms-success').css('display', 'none');
                    }, 2000)
                })
                .fail(error => {
                    if (error.responseJSON.errors.brand_name) {
                        loadSwalAlert('error', '!OK','Tên thương hiệu đã tồn tại');
                    }
                });
        }
    });

    // delete customer
    $(document).on("click", "#delete-customer", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResouce = '/admin/customers/' + id;
        callAjax(urlResouce, 'DELETE')
            .done(response => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        $("#customer_" + id).remove();
                        window.location.reload();
                    }
                })
            })
            .fail(error => {
                console.log(error);
            })
    });

    // delete Multi record
    $(document).on("click", "#delete-multi", function (e) {
        e.preventDefault();
        let ids = [];
        $('#brand_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length == 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/brands/' + ids;
            callAjax(urlResouce, 'DELETE')
                .done(response => {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            $.each(ids, function (key, value) {
                                $("#brand_" + value).remove();
                            });
                            $('#dataRow').html(response);
                            $("#selectall").click(function () {
                                $(".individual").prop("checked", $(this).prop("checked"));
                            });
                        }
                    })
                })
                .fail(error => {
                    console.log(error);
                })
        }
    });

    // search brand
    $(document).on("click", "#btn-search", function (e) {
        e.preventDefault();
        let query = $('#brand_search').val();
        if (query === '') {
            alert("Vui lòng nhập vào ô search");
        } else {
            let urlResource = '/admin/brands/search/'+query;
            callAjax(urlResource, 'GET')
                .done(response => {
                    $('#dataRow').html(response);
                    $("#selectall").click(function () {
                        $(".individual").prop("checked", $(this).prop("checked"));
                    });
                })
                .fail(error => {
                    console.log(error);
                });
        }
    });

    // send notification
    $(document).on('click', '#btn-send-notification', function (e) {
        e.preventDefault();
        let emails = [];
        $('#customer_ids:checked').each(function (i) {
            emails.push($(this).attr('data-emails'));
        });
        let urlResouce = '/admin/customers/send-notification'
        callAjax(urlResouce, 'POST', { email: emails })
            .done(response => {
                loadSwalAlert('success', 'OK', 'Gửi thông báo thành công');
                window.location.reload();
            })
            .fail(error => {
                console.log(error);
            })
    });
});

