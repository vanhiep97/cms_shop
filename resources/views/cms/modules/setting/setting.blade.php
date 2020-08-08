@extends('cms.layouts.app')
@section('content')
    <div class="setting">
        <ul class="nav nav-tabs tab-setting" role="tablist">
            <li role="presentation" class="active"><a href="#user" aria-controls="home" role="tab" data-toggle="tab"><i
                        class="fa fa-user"></i> Nhân viên</a></li>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="user">
                <div class="panel panel-primary" style="margin-top: 20px">
                    <div class="panel-heading">
                        <i class="fa fa-user"></i> Nhân viên
                        <div class="action pull-right">
                            <button class="btn btn-default btn-sm create-nv btn-in-panel blue" id="btn-create-user">
                                <i
                                    class="fa fa-pencil blue"></i> Tạo nhân viên
                            </button>
                            | <i class="fa fa-refresh" style="font-size: 14px; cursor: pointer;"></i>
                        </div>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive ">
                            <table class="table table-hover table-user table-striped">
                                <thead>
                                <th class="text-center">#</th>
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                                <th>Email</th>
                                <th>Nhóm người sử dụng</th>
                                <th class="text-center">Trạng thái</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @if(!empty($users) && count($users) > 0)
                                    @foreach($users as $key => $value)
                                        <tr class="tr-item-">
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $value->user_code ? $value->user_code : '' }}</td>
                                            <td>{{ $value->name ? $value->name : '' }}</td>
                                            <td>{{ $value->email ? $value->email : '' }}</td>
                                            <td>
                                                @if($value->level == 1)
                                                    <span class="badge badge-success">{{ 'Quản lý cửa hàng' }}</span>
                                                @elseif($value->level == 2)
                                                    <span class="badge badge-success">{{ 'Nhân viên kho' }}</span>
                                                @elseif($value->level == 3)
                                                    <span class="badge badge-success">{{ 'Nhân viên thu chi' }}</span>
                                                @elseif($value->level == 4)
                                                    <span class="badge badge-success">{{ 'Nhân viên bán hàng' }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {!! $value->status == 1 ? '<span class="badge badge-success">Actived</span>' : '<span class="badge badge-danger">Locked</span>' !!}
                                            </td>
                                            <td class="text-center"><i class="fa fa-pencil-square-o edit-item"
                                                                       title="Sửa" id="edit-user" data-id="{{ $value->id }}"
                                                                       style="margin-right: 10px; cursor: pointer;"></i><i
                                                    title="Xóa"
                                                    class="fa fa-trash-o delete-item xoa" id="delete-user" data-id="{{ $value->id }}" style="cursor: pointer;"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <h3>Chức năng cho nhóm người dùng</h3>

                <div class="cms-function-user-info">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <th class="text-center" style="width: 50%; background-color: #fff;">Chức năng</th>
                        <th class="text-center">Ban giám đốc</th>
                        <th class="text-center">Quản lý</th>
                        <th class="text-center">Nhân viên bán hàng</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">Báo cáo mỗi ngày</td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                        </tr>
                        <tr>
                            <td class="text-center">sản phẩm</td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-times" style="color: darkred;"></i></td>
                        </tr>
                        <tr>
                            <td class="text-center">Đơn hàng</td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-times" style="color: darkred;"></i></td>
                        </tr>
                        <tr>
                            <td class="text-center">Nhập hàng</td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-times" style="color: darkred;"></i></td>
                        </tr>
                        <tr>
                            <td class="text-center">Báo cáo lợi nhuận</td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-times" style="color: darkred;"></i></td>
                            <td class="text-center"><i class="fa fa-times" style="color: darkred;"></i></td>
                        </tr>
                        <tr>
                            <td class="text-center">Báo cáo nhập xuất tồn</td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-times" style="color: darkred;"></i></td>
                        </tr>
                        <tr>
                            <td class="text-center">Báo cáo tồn kho</td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-times" style="color: darkred;"></i></td>
                        </tr>
                        <tr>
                            <td class="text-center">Thiết lập (Thông tin cửa hàng, nhân viên, thiết lập bán hàng, phân
                                quyền)
                            </td>
                            <td class="text-center"><i class="fa fa-check" style="color: green;"></i></td>
                            <td class="text-center"><i class="fa fa-times" style="color: darkred;"></i></i></td>
                            <td class="text-center"><i class="fa fa-times" style="color: darkred;"></i></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="notes-info">
                        <h3 style="color: #0B87C9;">Lưu ý</h3>

                        <p><span style="font-weight: bold;">[Ban giám đốc]</span> mới được xem giá vốn của sản phẩm và
                            báo
                            cáo lợi nhuận</p>

                        <p><span style="font-weight: bold;">[Quản lý]</span> không xóa được dữ liệu. Để xóa được dữ
                            liệu,
                            cần liên hệ <span style="font-weight: bold;">[Ban giám đốc]</span> để xóa</p>

                        <p><span style="font-weight: bold;">[Nhân viên bán hàng]</span> chỉ được bán hàng, nhập trả hàng
                            và
                            xem báo cáo cuối ngày</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start create employee -->
        <div class="modal fade" id="create-nv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;"><i
                                class="fa fa-user"></i>
                            Thêm tài khoản đăng nhập </h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="userForm">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="tennhanvien">Tên nhân viên</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder="Nhập tên nhân viên">
                                    <span style="color: red; font-style: italic;"
                                          class="error error-display_name"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="manv">Email</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="email" name="email" class="form-control"
                                           placeholder="Nhập email của bạn">
                                    <span style="color: red; font-style: italic;" class="error error-mail"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 padd-right-0">
                                    <label for="manv">Nhóm người dùng</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="group-user">
                                        <div class="group-selbox">
                                            <select name="level" id="level" class="form-control">
                                                <option value="0">-- Nhóm người dùng</option>
                                                <option value="1">Quản lý cửa hàng</option>
                                                <option value="2">Nhân viên kho</option>
                                                <option value="3">Nhân viên thu chi</option>
                                                <option value="4">Nhân viên bán hàng</option>
                                            </select>
                                        </div>
                                        <span style="color: red; font-style: italic;" class="error error-group"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-3 padd-right-0">
                                    <label for="status">Trạng thái</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="group-user">
                                        <div class="group-selbox">
                                            <select name="status" id="status" class="form-control">
                                                <option value="1">Actived</option>
                                                <option value="0">Locked</option>
                                            </select>
                                        </div>
                                        <span style="color: red; font-style: italic;" class="error error-group"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" id="btn-save" class="btn btn-primary btn-sm btn-crnv"><i
                                        class="fa fa-check"></i> Lưu
                                </button>
                                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i
                                        class="fa fa-undo"></i> Bỏ qua
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end create employee -->
    </div>
@endsection
