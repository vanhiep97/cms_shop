jQuery(document).ready(function ($) {
    const manufactureForm = $('#manufacture-form');

    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    // edit manufacture
    $(document).on("click", "#edit-manufacture", function (e) {
        e.preventDefault();
        manufactureForm.trigger("reset");
        let id = $(this).data('id');
        let urlResource = '/admin/manufactures/' + id + '/edit';
        callAjax(urlResource, 'GET')
            .done(response => {
                if (response.code === 500) {
                    loadSwalAlert('error', '!OK','ID không tồn tại');
                    window.location.reload();
                } else {
                    $('#manufacture_name').val(response.data.manufacture_name);
                    $('#manufacture_description').val(response.data.manufacture_description);
                    $('#btn-save').val('update-manufacture');
                    $('#btn-save').html('<i class="fa fa-floppy-o"></i> Cập nhật');
                    $('#btn-save').attr('data-id', id);
                }
            })
            .fail(error => {
                console.log(error);
            });
    });

    // create or update manufacture
    manufactureForm.validate({
        rules: {
            manufacture_name: {
                required: true,
                minlength: 4,
                maxlength: 255,
            },
        },
        messages: {
            manufacture_name: {
                required: 'Vui lòng nhập tên danh mục',
                minlength: 'Nhập tối thiểu 4 kí tự',
                maxlength: 'Nhập tối đa 255 kí tự',
            },
        },
        submitHandler: function (form) {
            let actionType = $('#btn-save').val();
            if(actionType === 'update-manufacture') {
                let id = $('#btn-save').data('id');
                let urlResource = '/admin/manufactures/' + id;
                let dataResource = manufactureForm.serialize();
                callAjax(urlResource, 'PATCH', dataResource)
                    .done(response => {
                        manufactureForm.trigger("reset");
                        window.location.reload();
                        loadSwalAlert('success', 'OK', 'Cập nhật nhà sản xuất thành công');
                    })
                    .fail(error => {
                        if (error.responseJSON.errors.category_name) {
                            loadSwalAlert('error', '!OK','Tên danh mục đã tồn tại');
                        }
                    });
            } else {
                let urlResource = '/admin/manufactures';
                let dataResource = manufactureForm.serialize();
                callAjax(urlResource, 'POST', dataResource)
                    .done(response => {
                        manufactureForm.trigger("reset");
                        window.location.reload();
                        loadSwalAlert('success', 'OK', 'Thêm nhà sản xuất thành công');
                    })
                    .fail(error => {
                        if (error.responseJSON.errors.category_name) {
                            loadSwalAlert('error', '!OK','Tên danh mục đã tồn tại');
                        }
                    });
            }
        }
    });

    $('body').on('click', '.chkAll', function () {
        var $checkboxies = $(this).closest('table').find('.chk');
        if ($(this).prop('checked')) {
            $checkboxies.prop('checked', true);
        } else {
            $checkboxies.prop('checked', false);
        }
    });

    // delete category
    $(document).on("click", "#btn-delete", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResouce = '/admin/manufactures/' + id;
        callAjax(urlResouce, 'DELETE')
            .done(response => {
                if (response.code === 500) {
                    loadError('ID không tồn tại');
                    window.location.reload();
                } else {
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
                            $("#manufacture_" + id).remove();
                            window.location.reload();
                        }
                    })
                }
            })
            .fail(error => {
                console.log(error);
            })
    });

    // delete Multi record
    $(document).on("click", "#btn-delete-multi-manufacture", function (e) {
        e.preventDefault();
        let ids = [];
        $('#manufacture:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length === 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResource = '/admin/manufactures/' + ids;
            callAjax(urlResource, 'DELETE')
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
                                $("#manufacture_" + value).remove();
                            });
                            window.location.reload();
                        }
                    })
                })
                .fail(error => {
                    console.log(error);
                })
        }
    });

    // search category
    $(document).on("click", "#btn-search", function (e) {
        e.preventDefault();
        let query = $('#category_search').val();
        if (query === '') {
            alert("Vui lòng nhập vào ô search");
        } else {
            let urlResource = '/admin/categories/search/'+query;
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

