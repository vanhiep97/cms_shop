jQuery(document).ready(function ($) {
    var supplierForm = $('#frm-crsup');

    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    // show modal create
    $(document).on("click", "#btn-create-supplier", function (e) {
        e.preventDefault();
        $('#btn-save').val("create-supplier");
        $('#btn-save').html("<span class='ti-save'></span> Save");
        supplierForm.trigger("reset");
        $('#create-sup').modal('show');
    });

    // edit supplier
    $(document).on("click", "#edit-supplier", function (e) {
        e.preventDefault();
        $('#btn-save').val("edit-supplier");
        $('#btn-save').html("<span class='ti-save'></span> Update");
        supplierForm.trigger("reset");
        let id = $(this).data('id');
        let urlResource = '/admin/suppliers/' + id + '/edit';
        callAjax(urlResource, 'GET')
            .done(response => {
                if (response.code === 500) {
                    loadSwalAlert('error', '!OK', 'ID không tồn tại');
                    window.location.reload();
                } else {
                    $('#create-sup').modal('show');
                    $('#supplier_code').val(response.data.supplier_code);
                    $('#supplier_name').val(response.data.supplier_name);
                    $('#supplier_phone').val(response.data.supplier_phone);
                    $('#supplier_email').val(response.data.supplier_email);
                    $('#address').val(response.data.address);
                    $('#ATM').val(response.data.ATM);
                    $('#supplier_note').val(response.data.supplier_note);
                    $('#btn-save').attr("data-id", id);
                }
            })
            .fail(error => {
                console.log(error);
            });
    });

    // create or update supplier
    supplierForm.validate({
        rules: {
            supplier_name: {
                required: true,
                minlength: 10,
                maxlength: 100,
            },
            supplier_phone: {
                required: true,
                number: true,
            },
            supplier_email: {
                required: true,
                email: true,
                minlength: 15,
                maxlength: 100,
            },
            address: {
                required: true,
                minlength: 10,
            },
            ATM: {
                required: true,
                number: true,
            },
        },
        messages: {
            supplier_name: {
                required: 'Vui lòng nhập tên nhà cung cấp',
                minlength: 'Nhập tối thiểu 10 kí tự',
                maxlength: 'Nhập tối đa 100 kí tự',
            },
            supplier_email: {
                required: 'Vui lòng nhập email NCC',
                minlength: 'Nhập tối thiểu 15 kí tự',
                maxlength: 'Nhập tối đa 100 kí tự',
                email: 'Email không đúng định dạng',
            },
            supplier_phone: {
                required: 'Vui lòng nhập SDT nhà cung cấp',
                number: 'Số điện thoại phải là kí tự số',
            },
            address: {
                required: 'Vui lòng nhập địa chỉ nhà cung cấp',
                minlength: 'Nhập tối thiểu 10 kí tự',
            },
            ATM: {
                required: 'Vui lòng nhập TK ATM nhà cung cấp',
                number: 'TK ATM phải là kí tự số',
            },
        },
        submitHandler: function (e) {
            var actionType = $('#btn-save').val();
            if (actionType === "create-supplier") {
                let dataResource = supplierForm.serialize();
                let urlResource = "/admin/suppliers/create-suppliers";
                callAjax(urlResource, 'POST', dataResource)
                    .done(response => {
                        supplierForm.trigger("reset");
                        $('#btn-save').html("<span class='ti-save'></span> Save");
                        window.location.reload()
                        loadSwalAlert('success', 'OK', 'Thêm nhà cung cấp thành công');
                    })
                    .fail(error => {
                        console.log(error)
                    });
            } else {
                let id = $('#btn-save').data('id');
                let urlResource = "/admin/suppliers/" + id;
                let dataResource = supplierForm.serialize();
                callAjax(urlResource, 'PATCH', dataResource)
                    .done(response => {
                        if (response.code === 500) {
                            loadSwalAlert('error', '!OK', 'ID không tồn tại');
                            window.location.reload();
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'OK',
                                text: 'Cập nhật NCC thành công',
                            })
                                .then((result) => {
                                    if (result.value) {
                                        window.location.reload()
                                    }
                                })
                        }
                    })
                    .fail(error => {
                        console.log(error);
                    });
            }
        }
    });

    // delete user
    $(document).on("click", "#delete-supplier", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResouce = '/admin/suppliers/' + id;
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
                callAjax(urlResouce, 'DELETE')
                    .done(response => {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        window.location.reload()
                    })
                    .fail(error => {
                        console.log(error);
                    })
            }
        })
    });

    // delete Multi record
    $(document).on("click", "#delete-multi", function (e) {
        e.preventDefault();
        let ids = [];
        $('#user_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length === 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/users/' + ids;
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
                                $("#user_" + value).remove();
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

    // search user
    $(document).on("click", "#btn-search", function (e) {
        e.preventDefault();
        let query = $('#user_search').val();
        if (query === '') {
            alert("Vui lòng nhập vào ô search");
        } else {
            let urlResource = '/admin/users/search/'+query;
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
});

