jQuery(document).ready(function ($) {
    $(document).on('click', '#revenue-all', function(e) {
        window.location.href = '/admin/revenues/all';
    });

    $(document).on('click', '#revenue-customer', function (e) {
        window.location.href = '/admin/revenues/customer';
    });

    $(document).on('click', '#revenue-sale', function (e) {
        window.location.href = '/admin/revenues/sale';
    });

    $(document).on('click', '#revenue-product', function (e) {
        window.location.href = '/admin/revenues/product';
    });

    $(document).on('click', '#revenue-user', function (e) {
        window.location.href = '/admin/revenues/user';
    });
});
