jQuery(document).ready(function ($) {
    $(document).on('click', '#profit-all', function(e) {
        window.location.href = '/admin/profits/all';
    });

    $(document).on('click', '#profit-customer', function (e) {
        window.location.href = '/admin/profits/customer';
    });

    $(document).on('click', '#profit-sale', function (e) {
        window.location.href = '/admin/profits/sale';
    });

    $(document).on('click', '#profit-product', function (e) {
        window.location.href = '/admin/profits/product';
    });

    $(document).on('click', '#profit-user', function (e) {
        window.location.href = '/admin/profits/user';
    });
});
