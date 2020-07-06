jQuery(document).ready(function ($) {
    var userForm = $('#userForm');

    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    // show modal create
    $(document).on("click", "#btn-create-user", function (e) {
        e.preventDefault();
        $('#btn-save').val("create-user");
        $('#btn-save').html("<span class='ti-save'></span> Save");
        userForm.trigger("reset");
        $('#create-nv').modal('show');
    });

    // edit user
    $(document).on("click", "#edit-user", function (e) {
        e.preventDefault();
        $('#btn-save').val("edit-user");
        $('#btn-save').html("<span class='ti-save'></span> Update");
        userForm.trigger("reset");
        let id = $(this).data('id');
        let urlResource = '/admin/settings/' + id + '/edit';
        callAjax(urlResource, 'GET')
            .done(response => {
                if (response.code === 500) {
                    loadSwalAlert('error', '!OK', 'ID không tồn tại');
                    window.location.reload();
                } else {
                    $('#create-nv').modal('show');
                    $('#name').val(response.data.name);
                    $('#email').val(response.data.email);
                    $('#level').val(response.data.level);
                    $('#status').val(response.data.status);
                    $('#btn-save').attr("data-id", id);
                }
            })
            .fail(error => {
                console.log(error);
            });
    });

    // create or update user
    userForm.validate({
        rules: {
            name: {
                required: true,
                minlength: 4,
                maxlength: 50,
            },
            email: {
                required: true,
                minlength: 15,
                maxlength: 100,
                email: true,
            },
        },
        messages: {
            name: {
                required: 'Vui lòng nhập username',
                minlength: 'Nhập tối thiểu 4 kí tự',
                maxlength: 'Nhập tối đa 50 kí tự',
            },
            email: {
                required: 'Vui lòng nhập useremail',
                minlength: 'Nhập tối thiểu 10 kí tự',
                maxlength: 'Nhập tối đa 100 kí tự',
                email: 'Email không đúng định dạng',
            },
        },
        submitHandler: function (e) {
            var actionType = $('#btn-save').val();
            if (actionType === "create-user") {
                let dataResource = userForm.serialize();
                let urlResource = "/admin/settings/create-users";
                callAjax(urlResource, 'POST', dataResource)
                    .done(response => {
                        $('#userForm').trigger("reset");
                        $('#btn-save').html("<span class='ti-save'></span> Save");
                        window.location.reload()
                        loadSwalAlert('success', 'OK', 'Thêm User thành công');
                    })
                    .fail(error => {
                        if (error.responseJSON.errors.name) {
                            loadSwalAlert('error', '!OK', 'UserName đã tồn tại');
                        }
                        if (error.responseJSON.errors.email) {
                            loadSwalAlert('error', '!OK', 'Email đã tồn tại');
                        }
                    });
            } else {
                let id = $('#btn-save').data('id');
                let urlResource = "/admin/settings/" + id;
                let dataResource = userForm.serialize();
                callAjax(urlResource, 'PATCH', dataResource)
                    .done(response => {
                        if (response.code === 500) {
                            loadSwalAlert('error', '!OK', 'ID không tồn tại');
                            window.location.reload();
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'OK',
                                text: 'Cập nhật User thành công',
                            })
                                .then((result) => {
                                    if (result.value) {
                                        window.location.reload()
                                    }
                                })
                        }
                    })
                    .fail(error => {
                        console.log(error);
                    });
            }
        }
    });

    // delete user
    $(document).on("click", "#delete-user", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResouce = '/admin/settings/' + id;
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
                callAjax(urlResouce, 'DELETE')
                    .done(response => {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        window.location.reload()
                    })
                    .fail(error => {
                        console.log(error);
                    })
            }
        })
    });

    // delete Multi record
    $(document).on("click", "#delete-multi", function (e) {
        e.preventDefault();
        let ids = [];
        $('#user_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length === 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/users/' + ids;
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
                                $("#user_" + value).remove();
                            });
                            $('#dataRow').html(response);
                            $("#selectall").click(function () {
                                $(".individual").prop("checked", $(this).prop("checked"));
                            });
                        }
                    })
                })
                .fail(error => {
                    console.log(error);
                })
        }
    });

    // search user
    $(document).on("click", "#btn-search", function (e) {
        e.preventDefault();
        let query = $('#user_search').val();
        if (query === '') {
            alert("Vui lòng nhập vào ô search");
        } else {
            let urlResource = '/admin/users/search/' + query;
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

