jQuery(document).ready(function ($) {
    $("#selectall").click(function () {
        $(".individual").prop("checked", $(this).prop("checked"));
    });

    $(".per-select-all").click(function () {
        $(".per-select-one").prop("checked", $(this).prop("checked"));
    });
});
