
function cms_show_detail_order(id) {
    $('#tr-detail-order-' + id).toggle(200);
    $('.i-detail-order-' + id).toggle();
}
jQuery(document).ready(function ($) {
    // delete order
    $(document).on("click", "#btn-delete-order", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/orders/' + id;
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
                        $("#order_" + id).remove();
                        window.location.reload();
                        $('#alert-cms-success').css('display', 'block');
                        $('#text-alert-success').text("Xóa đơn hàng thành công");
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
    $(document).on("click", "#delete-multi-order", function (e) {
        e.preventDefault();
        let ids = [];
        $('#order_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length == 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/orders/' + ids;
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
                                $("#order_" + value).remove();
                            });
                            window.location.reload();
                            $('#alert-cms-success').css('display', 'block');
                            $('#text-alert-success').text("Xóa đơn hàng thành công");
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

    // search order
    $(document).on('click', '#btn-search-order', function(e) {
        e.preventDefault();
        let orderCode = $('#order-search-code').val();
        let orderFromDate = $("#datepicker1").val();
        let orderToDate = $("#datepicker2").val();
        let urlResource = '/admin/orders/search/'
        callAjax(urlResource, 'GET',
        {
            order_code: orderCode.toLowerCase(),
            order_date_from: orderFromDate,
            order_date_to: orderToDate
        })
            .done(response => {
                $('#list-orders').html(response);
            })
            .fail(error => {
                console.log(error);
            })
    });

    // update status order
    $(document).on('click', '#update-status-order', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResource = '/admin/orders/' + id + '/update-status';
        callAjax(urlResource, 'GET')
            .done(response => {
                window.location.reload();
            })
            .fail(error => {
                console.log(error);
            })
    })
});
