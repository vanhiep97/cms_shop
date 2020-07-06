$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function callAjax(url, method, data = null) {
    return jQuery.ajax({
        url: url,
        async: false,
        type: method,
        data: data,
    });
}

