jQuery(document).ready(function ($) {
    var proGroupForm = $('#product-group');

    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    // edit category
    $(document).on("click", "#edit-pro-group", function (e) {
        e.preventDefault();
        proGroupForm.trigger("reset");
        let id = $(this).data('id');
        let urlResource = '/admin/group-products/' + id + '/edit';
        callAjax(urlResource, 'GET')
            .done(response => {
                if (response.code === 500) {
                    loadSwalAlert('error', '!OK','ID không tồn tại');
                    window.location.reload();
                } else {
                    $('#pro_group_parent_id').val(response.data.pro_group_parent_id);
                    $('#pro_group_name').val(response.data.pro_group_name);
                    $('#pro_group_description').val(response.data.pro_group_description);
                    $('#btn-save').val('update-pro-group');
                    $('#btn-save').html('<i class="fa fa-floppy-o"></i> Cập nhật');
                    $('#btn-save').attr('data-id', id);
                }
            })
            .fail(error => {
                console.log(error);
            });
    });

    // create or update category
    proGroupForm.validate({
        rules: {
            pro_group_name: {
                required: true,
                minlength: 4,
                maxlength: 255,
            },
        },
        messages: {
            pro_group_name: {
                required: 'Vui lòng nhập tên danh mục',
                minlength: 'Nhập tối thiểu 4 kí tự',
                maxlength: 'Nhập tối đa 255 kí tự',
            },
        },
        submitHandler: function (form) {
            let actionType = $('#btn-save').val();
            if(actionType === 'update-pro-group') {
                let id = $('#btn-save').data('id');
                let urlResource = '/admin/group-products/' + id;
                let dataResource = proGroupForm.serialize();
                callAjax(urlResource, 'PATCH', dataResource)
                    .done(response => {
                        proGroupForm.trigger("reset");
                        window.location.reload();
                        loadSwalAlert('success', 'OK', 'Cập nhật nhóm sản phẩm thành công');
                    })
                    .fail(error => {
                        if (error.responseJSON.errors.category_name) {
                            loadSwalAlert('error', '!OK','Tên danh mục đã tồn tại');
                        }
                    });
            } else {
                let urlResource = '/admin/group-products';
                let dataResource = proGroupForm.serialize();
                callAjax(urlResource, 'POST', dataResource)
                    .done(response => {
                        proGroupForm.trigger("reset");
                        window.location.reload();
                        loadSwalAlert('success', 'OK', 'Thêm nhóm sản phẩm thành công');
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
        let urlResouce = '/admin/group-products/' + id;
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
                            $("#pro-group_" + id).remove();
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
    $(document).on("click", "#btn-delete-multi", function (e) {
        e.preventDefault();
        let ids = [];
        $('#pro-group:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        console.log(ids);
        if (ids.length === 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResource = '/admin/group-products/' + ids;
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
                                $("#pro-group_" + value).remove();
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

