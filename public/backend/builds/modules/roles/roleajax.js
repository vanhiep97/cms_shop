jQuery(document).ready(function ($) {
    var roleForm = $('#roleForm');

    function loadSwalAlert(icon, title, message) {
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        });
    }

    // DataRaw
    function dataRaw(response) {
        return `<tr id="role_${response.data.id}">
                    <td><input type="checkbox" id="role_ids" data-ids="${response.data.id}" class="individual"/><br></td>
                    <td>${response.data.id}</td>
                    <td>${response.data.role_name}</td>
                    <td>${response.data.role_label}</td>
                    <td>${response.data.role_description}</td>
                    <td>${response.data.role_status == 1 ? '<span class="badge badge-success">Actived</span>' : '<span class="badge badge-pill badge-primary">Locked</span>'}</td>
                    <td>${response.data.created_at}</td>
                    <td>${response.data.created_by}</td>
                    <td width="160px">
                        <a id="edit-role" data-id="${response.data.id}" href="javascript:void(0)" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a id="delete-role" data-id="${response.data.id}" href="javascript:void(0)" class="btn btn-warning"><i class="fa fa-trash"></i></a>
                        <a title="Create and Update Permission" href="javascript:void(0)" class="btn btn-danger" data-toggle="modal" data-target="#largeModal"><span class="ti-settings"></span></a>
                    </td>
                </tr>`;
    }

    // show modal create
    $(document).on("click", "#btn-create-role", function (e) {
        e.preventDefault();
        $('#btn-save').val("create-role");
        $('#btn-save').html("<span class='ti-save'></span> Save");
        roleForm.trigger("reset");
        $('#mediumModal').modal('show');
    });

    // edit role
    $(document).on("click", "#edit-role", function (e) {
        e.preventDefault();
        $('#btn-save').val("edit-role");
        $('#btn-save').html("<span class='ti-save'></span> Update");
        roleForm.trigger("reset");
        let id = $(this).data('id');
        let urlResource = '/admin/roles/' + id + '/edit';
        callAjax(urlResource, 'GET')
            .done(response => {
                $('#mediumModal').modal('show');
                $('#role_name').val(response.data.role_name);
                $('#role_label').val(response.data.role_label);
                $('#role_description').val(response.data.role_description);
                $('#role_status').val(response.data.role_status);
                $('#btn-save').attr("data-id", id);
            })
            .fail(error => {
                console.log(error);
            });
    });

    // create or update role
    roleForm.validate({
        rules: {
            role_name: {
                required: true,
                minlength: 4,
                maxlength: 20,
            },
            role_label: {
                required: true,
                minlength: 4,
                maxlength: 25,
            },
        },
        messages: {
            role_name: {
                required: 'Vui lòng nhập tên',
                minlength: 'Nhập tối thiểu 4 kí tự',
                maxlength: 'Nhập tối đa 20 kí tự',
            },
            role_label: {
                required: 'Vui lòng nhập tên hiển thị',
                minlength: 'Nhập tối thiểu 4 kí tự',
                maxlength: 'Nhập tối đa 25 kí tự',
            },
        },
        submitHandler: function (form) {
            var actionType = $('#btn-save').val();
            if (actionType === "create-role") {
                let dataResource = roleForm.serialize();
                let urlResource = "/admin/roles";
                callAjax(urlResource, 'POST', dataResource)
                    .done(response => {
                        $('#dataRow').html(response);
                        $("#selectall").click(function () {
                            $(".individual").prop("checked", $(this).prop("checked"));
                        });
                        roleForm.trigger("reset");
                        $('#btn-save').html("<span class='ti-save'></span> Save");
                        loadSwalAlert('success', 'OK', 'Tạo nhóm quyền thành công !')
                    })
                    .fail(error => {
                        if (error.responseJSON.errors.role_name) {
                            loadSwalAlert('error', '!OK', 'Tên nhóm quyền đã tồn tại');
                        }
                        if (error.responseJSON.errors.role_label) {
                            loadSwalAlert('error', '!OK', 'Tên hiển thị nhóm quyền đã tồn tại');
                        }
                    });
            } else {
                let id = $('#btn-save').data('id');
                let urlResource = "/admin/roles/" + id;
                let dataResource = roleForm.serialize();
                callAjax(urlResource, 'PATCH', dataResource)
                    .done(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'OK',
                            text: 'Cập nhật nhóm quyền thành công !!',
                        }).then((result) => {
                                if (result.value) {
                                    $("#role_" + id).replaceWith(dataRaw(response));
                                    $('#mediumModal').modal('hide');
                                }
                            })
                    })
                    .fail(error => {
                        console.log(error);
                    });
            }
        }
    });

    // delete role
    $(document).on("click", "#delete-role", function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let urlResouce = '/admin/roles/' + id;
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
                        $("#role_" + id).remove();
                        $('#dataRow').html(response);
                        $("#selectall").click(function () {
                            $(".individual").prop("checked", $(this).prop("checked"));
                        });
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
        $('#role_ids:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length == 0) {
            Swal.fire(
                'Cant Delete!',
                'Chọn bản ghi cần xóa.',
                'error'
            );
        } else {
            let urlResouce = '/admin/roles/' + ids;
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
                                $("#role_" + value).remove();
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

    // search role
    $(document).on("click", "#btn-search", function (e) {
        e.preventDefault();
        let query = $('#role_search').val();
        if (query === '') {
            alert("Vui lòng nhập vào ô tìm kiếm");
        } else {
            let urlResource = '/admin/roles/search/'+query;
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

    // show permission by role
    $(document).on("click", "#setting-permission", function (e) {
        e.preventDefault();
        let roleId = $(this).data('id');
        let urlResource = '/admin/roles/' + roleId + '/permissions';
        callAjax(urlResource, 'GET')
            .done(response => {
                $('#largeModal').modal('show');
                $('#permission').html(response);
                $('#btn-setting').attr("data-id", roleId);
            })
            .fail(error => {
                console.log(error);
            });
    });

    // set permmission
    $(document).on("click", "#btn-setting", function (e) {
        e.preventDefault();
        let ids = [];
        $('.per-select-one:checked').each(function (i) {
            ids.push($(this).attr('data-ids'));
        });
        if (ids.length == 0) {
            Swal.fire(
                'Cant Delete!',
                'Hay Chọn bản ghi.',
                'error'
            );
        } else {
            let role_id = $(this).data('id');
            let urlResource = '/admin/roles/' + role_id + '/setting/permissions/' + ids;
            let dataResource = [
                role_id, ids
            ];
            callAjax(urlResource, 'POST', dataResource)
                .done(response => {
                    $('#setPermissionForm').trigger("reset");
                    $('#largeModal').modal('hide');
                    loadSwalAlert('success', 'OK', 'Cài đặt quyền thành công');
                    window.location.reload();
                    $(".per-select-all").prop("checked", true);
                })
                .fail(error => {
                    console.log(error);
                });
        }
    });
});

