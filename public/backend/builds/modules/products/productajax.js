jQuery(document).ready(function ($) {
    const formProduct = $('#form-product');

    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    $(document).on('change', '#prd_inventory', function(e) {
        e.preventDefault();
        if ($('input#prd_inventory:checked').length > 0) {
            $('#product_amount').removeAttr('disabled');
        } else {
            $('#product_amount').attr('disabled', 'disabled');
        }
    });

    // create or update product
    $(document).on("click", "#btn-save-continue", function () {
        formProduct.validate({
            rules: {
                product_name: {
                    required: true,
                    minlength: 10,
                    maxlength: 255,
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
                    let originPrice = $('#product_origin_price').val();
                    let sellPrice = $('#product_sell_price').val();

                    if(sellPrice < originPrice) {
                        $('#alert-cms-error').css('display', 'block');
                        $('#text-alert-error').text("Giá bán phải lớn hơn giá nhập");
                        setTimeout(function () {
                            $('#alert-cms-error').css('display', 'none');
                        }, 2000)
                    } else {
                        let dataResource = formProduct.serialize();
                        let urlResource = "/admin/products/" + id;
                        callAjax(urlResource, 'PATCH', dataResource)
                            .done(response => {
                                formProduct.trigger("reset");
                                window.location.reload();
                                $('#alert-cms-success').css('display', 'block');
                                $('#text-alert-success').text("Cập nhật sản phẩm thành công");
                                setTimeout(function () {
                                    $('#alert-cms-success').css('display', 'none');
                                }, 2000)
                            })
                            .fail(error => {
                                console.log(error);
                            });
                    }
                } else {
                    let originPrice = $('#product_origin_price').val();
                    let sellPrice = $('#product_sell_price').val();

                    if (sellPrice < originPrice) {
                        $('#alert-cms-error').css('display', 'block');
                        $('#text-alert-error').text("Giá bán phải lớn hơn giá nhập");
                        setTimeout(function () {
                            $('#alert-cms-error').css('display', 'none');
                        }, 2000)
                    } else {
                        let dataResource = formProduct.serialize();
                        let urlResource = "/admin/products/";
                        callAjax(urlResource, 'POST', dataResource)
                            .done(response => {
                                formProduct.trigger("reset");
                                window.location.reload();
                                $('#alert-cms-success').css('display', 'block');
                                $('#text-alert-success').text("Thêm sản phẩm thành công");
                                setTimeout(function () {
                                    $('#alert-cms-success').css('display', 'none');
                                }, 2000)
                            })
                            .fail(error => {
                                if (error.responseJSON.errors.product_name) {
                                    $('#alert-cms-error').css('display', 'block');
                                    $('#text-alert-error').text("Sản phẩm đã tồn tại");
                                    setTimeout(function () {
                                        $('#alert-cms-error').css('display', 'none');
                                    }, 2000)
                                }
                            });
                    }
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
                let actionType = $('#btn-save').val();
                if (actionType === 'update-product') {
                    let id = $('#btn-save').data('id');
                    let originPrice = $('#product_origin_price').val();
                    let sellPrice = $('#product_sell_price').val();

                    if (sellPrice < originPrice) {
                        $('#alert-cms-error').css('display', 'block');
                        $('#text-alert-error').text("Giá bán phải lớn hơn giá nhập");
                        setTimeout(function () {
                            $('#alert-cms-error').css('display', 'none');
                        }, 2000)
                    } else {
                        let dataResource = formProduct.serialize();
                        let urlResource = "/admin/products/" + id;
                        callAjax(urlResource, 'PATCH', dataResource)
                            .done(response => {
                                formProduct.trigger("reset");
                                window.location.href = '/admin/products';
                                $('#alert-cms-success').css('display', 'block');
                                $('#text-alert-success').text("Cập nhật sản phẩm thành công");
                                setTimeout(function () {
                                    $('#alert-cms-success').css('display', 'none');
                                }, 2000)
                            })
                            .fail(error => {
                                console.log(error);
                            });
                    }
                } else {
                    let originPrice = $('#product_origin_price').val();
                    let sellPrice = $('#product_sell_price').val();

                    if (sellPrice < originPrice) {
                        $('#alert-cms-error').css('display', 'block');
                        $('#text-alert-error').text("Giá bán phải lớn hơn giá nhập");
                        setTimeout(function () {
                            $('#alert-cms-error').css('display', 'none');
                        }, 2000)
                    } else {
                        let dataResource = formProduct.serialize();
                        let urlResource = "/admin/products/";
                        callAjax(urlResource, 'POST', dataResource)
                            .done(response => {
                                formProduct.trigger("reset");
                                window.location.href = '/admin/products';
                                $('#alert-cms-success').css('display', 'block');
                                $('#text-alert-success').text("Thêm sản phẩm thành công");
                                setTimeout(function () {
                                    $('#alert-cms-success').css('display', 'none');
                                }, 2000)
                            })
                            .fail(error => {
                                if (error.responseJSON.errors.product_name) {
                                    $('#alert-cms-error').css('display', 'block');
                                    $('#text-alert-error').text("Sản phẩm đã tồn tại");
                                    setTimeout(function () {
                                        $('#alert-cms-error').css('display', 'none');
                                    }, 2000)
                                }
                            });
                    }
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
                        $("#product_" + id).remove();
                        window.location.reload();
                        $('#alert-cms-success').css('display', 'block');
                        $('#text-alert-success').text("Xóa sản phẩm thành công");
                        setTimeout(function () {
                            $('#alert-cms-success').css('display', 'none');
                        }, 2000)
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
                            $.each(ids, function (key, value) {
                                $("#product_" + value).remove();
                            });
                            window.location.reload();
                            $('#alert-cms-success').css('display', 'block');
                            $('#text-alert-success').text("Xóa sản phẩm thành công");
                            setTimeout(function () {
                                $('#alert-cms-success').css('display', 'none');
                            }, 2000)
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
                $('#alert-cms-success').css('display', 'block');
                $('#text-alert-success').text("Cập nhật trạng thái thành công");
                setTimeout(function () {
                    $('#alert-cms-success').css('display', 'none');
                }, 2000)
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
                $('#alert-cms-success').css('display', 'block');
                $('#text-alert-success').text("Khôi phục sản phẩm thành công");
                setTimeout(function () {
                    $('#alert-cms-success').css('display', 'none');
                }, 2000)
            })
            .fail(error => {
                console.log(error);
            })
    });
});
