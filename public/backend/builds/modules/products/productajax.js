jQuery(document).ready(function ($) {
    const formProduct = $('#form-product');

    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    // create or update product
    $(document).on("click", "#btn-save-continue", function () {
        formProduct.validate({
            rules: {
                product_name: {
                    required: true,
                    minlength: 10,
                    maxlength: 255,
                },
                product_amount: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 10000
                },
                product_origin_price: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 50000000
                },
                product_sell_price: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 50000000
                },
            },
            messages: {
                product_name: {
                    required: 'Vui lòng nhập tên sản phẩm',
                    minlength: 'Nhập tối thiểu 10 kí tự',
                    maxlength: 'Nhập tối đa 255 kí tự',
                },
                product_amount: {
                    required: 'Vui lòng nhập số lượng sản phẩm',
                    min: 'Nhập tối thiểu 1 sản phẩm',
                    max: 'Nhập tối đa 10000 sản phẩm',
                },
                product_origin_price: {
                    required: 'Vui lòng nhập giá vốn',
                    min: 'Giá sản phẩm tối thiểu 1 VNĐ',
                    max: 'Giá sản phẩm tối đa 50 triệu VNĐ',
                },
                product_sell_price: {
                    required: 'Vui lòng nhập giá bán',
                    min: 'Giá sản phẩm tối thiểu 1 VNĐ',
                    max: 'Giá sản phẩm tối đa 50 triệu VNĐ',
                },
            },
            submitHandler: function (form) {
                tinyMCE.triggerSave();
                let actionType = $('#btn-save-continue').val();
                if (actionType === 'update-product') {
                    let id = $('#btn-save-continue').data('id');
                    let dataResource = formProduct.serialize();
                    let urlResource = "/admin/products/" + id;
                    callAjax(urlResource, 'PATCH', dataResource)
                        .done(response => {
                            formProduct.trigger("reset");
                            loadSwalAlert('success', 'OK', 'Cập nhật sản phẩm thành công');
                            window.location.reload();
                        })
                        .fail(error => {
                            // if (error.responseJSON.errors.category_name) {
                            //     loadSwalAlert('error', '!OK','Tên danh mục đã tồn tại');
                            // }
                        });
                } else {
                    let dataResource = formProduct.serialize();
                    let urlResource = "/admin/products/";
                    callAjax(urlResource, 'POST', dataResource)
                        .done(response => {
                            formProduct.trigger("reset");
                            loadSwalAlert('success', 'OK', 'Thêm sản phẩm thành công');
                            window.location.reload();
                        })
                        .fail(error => {
                            // if (error.responseJSON.errors.category_name) {
                            //     loadSwalAlert('error', '!OK','Tên danh mục đã tồn tại');
                            // }
                        });
                }
            }
        });
    });

    $(document).on("click", "#btn-save", function () {
        formProduct.validate({
            rules: {
                product_name: {
                    required: true,
                    minlength: 10,
                    maxlength: 255,
                },
                product_amount: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 10000
                },
                product_origin_price: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 50000000
                },
                product_sell_price: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 50000000
                },
            },
            messages: {
                product_name: {
                    required: 'Vui lòng nhập tên sản phẩm',
                    minlength: 'Nhập tối thiểu 10 kí tự',
                    maxlength: 'Nhập tối đa 255 kí tự',
                },
                product_amount: {
                    required: 'Vui lòng nhập số lượng sản phẩm',
                    min: 'Nhập tối thiểu 1 sản phẩm',
                    max: 'Nhập tối đa 10000 sản phẩm',
                },
                product_origin_price: {
                    required: 'Vui lòng nhập giá vốn',
                    min: 'Giá sản phẩm tối thiểu 1 VNĐ',
                    max: 'Giá sản phẩm tối đa 50 triệu VNĐ',
                },
                product_sell_price: {
                    required: 'Vui lòng nhập giá bán',
                    min: 'Giá sản phẩm tối thiểu 1 VNĐ',
                    max: 'Giá sản phẩm tối đa 50 triệu VNĐ',
                },
            },
            submitHandler: function (form) {
                tinyMCE.triggerSave();
                let actionType = $('#btn-save-continue').val();
                if (actionType === 'update-product') {
                    let id = $('#btn-save-continue').data('id');
                    let dataResource = formProduct.serialize();
                    let urlResource = "/admin/products/" + id;
                    callAjax(urlResource, 'PATCH', dataResource)
                        .done(response => {
                            formProduct.trigger("reset");
                            loadSwalAlert('success', 'OK', 'Cập nhật sản phẩm thành công');
                            window.location.href = '/admin/products';
                        })
                        .fail(error => {
                            // if (error.responseJSON.errors.category_name) {
                            //     loadSwalAlert('error', '!OK','Tên danh mục đã tồn tại');
                            // }
                        });
                } else {
                    let dataResource = formProduct.serialize();
                    let urlResource = "/admin/products/";
                    callAjax(urlResource, 'POST', dataResource)
                        .done(response => {
                            formProduct.trigger("reset");
                            loadSwalAlert('success', 'OK', 'Thêm sản phẩm thành công');
                            window.location.href = '/admin/products';
                        })
                        .fail(error => {
                            // if (error.responseJSON.errors.category_name) {
                            //     loadSwalAlert('error', '!OK','Tên danh mục đã tồn tại');
                            // }
                        });
                }
            }
        });
    });

    // delete product
    $(document).on("click", "#delete-product", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/products/' + id;
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
                        $("#product_" + id).remove();
                        window.location.reload();
                    }
                })
            })
            .fail(error => {
                console.log(error)
            })
    });

    // delete Multi record
    $(document).on("click", "#delete-multi", function (e) {
        e.preventDefault();
        let ids = [];
        $('#product_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length == 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/products/' + ids;
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
                                $("#product_" + value).remove();
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

    // update status product
    $(document).on("click", '#change-status-product', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResouce = '/admin/products/' + id + '/update-status';
        callAjax(urlResouce, 'PATCH')
            .done(response => {
                window.location.reload();
                loadSwalAlert('success', 'OK', 'Cập nhật trạng thái thành công');
            })
            .fail(error => {
                console.log(error);
            })
    });

    // show product by value
    $(document).on('click', '#search-option-1', function (e) {
        e.preventDefault();
        let actionType = $('#search-option-1').val();
        let urlResource = '/admin/products/show-product-by-res';
        callAjax(urlResource, 'GET', { action: actionType })
            .done(response => {
                $('#product-list').html(response);
            })
            .fail(error => {
                console.log(error);
            })
    });

    // Restore soft delete
    $(document).on('click', '#restore-product-trash', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/products/restore-product-soft-delete/' + id;
        callAjax(urlResource, 'POST')
            .done(response => {
                window.location.reload();
            })
            .fail(error => {
                console.log(error);
            })
    });
});
