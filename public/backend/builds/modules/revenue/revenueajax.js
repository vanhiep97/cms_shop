jQuery(document).ready(function ($) {
    $(document).on('click', '#revenue', function(e) {
        let revenueOption = 1;
        revenueOption = $(this).val();
        let urlResource = '/admin/revenues/';
        callAjax(urlResource, 'GET', {
            revenueOption: revenueOption
        })
    })
});
