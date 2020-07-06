<div class="alert alert-dange ajax-error" role="alert"><span
        style="font-weight: bold; font-size: 18px;">Thông báo!</span><br>

    <div class="ajax-error-ct"></div>
</div>
<div class="alert ajax-success" role="alert"
     style="width: 350px;background: rgba(92,130,79,0.9); display:none; color: #fff;"><span
        style="font-weight: bold; font-size: 18px;">Thông báo!</span>
    <br>

    <div class="ajax-success-ct"></div>
</div>

{{-- Start create notification customer --}}
<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;"><i class="fa fa-user"></i>
                    Tạo thông báo khách hàng </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="title">Tiêu đề</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="title" name="title" class="form-control" value=""
                                   placeholder="Nhập tiêu đề thông báo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="info">Nội dung</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Nội dung thông báo ..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm btn-crfunc"><i class="fa fa-check"></i> Lưu</button>
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i
                        class="fa fa-undo"></i> Bỏ qua
                </button>
            </div>
        </div>
    </div>
</div>
{{-- End --}}

<!-- Start create group -->
<div class="modal fade" id="create-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;"><i class="fa fa-user"></i>
                    Thêm nhóm người dùng </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="group-name">Tên Nhóm</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="group-name" name="group_name" class="form-control" value=""
                                   placeholder="Nhập tên nhóm người dùng">
                            <span style="color: red; font-style: italic;" class="error error-group_name"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm btn-crgroup"><i class="fa fa-check"></i> Lưu
                </button>
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i
                        class="fa fa-undo"></i> Bỏ qua
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end create function -->

<!-- Start create group -->
<div class="modal fade" id="create-store" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-transform: uppercase;"><i class="fa fa-user"></i>
                    Thêm kho </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="group-name">Tên Kho</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="store-name" name="store_name" class="form-control" value=""
                                   placeholder="Nhập tên kho">
                            <span style="color: red; font-style: italic;" class="error error-store_name"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" onclick="cms_crstore();" ><i class="fa fa-check"></i> Lưu
                </button>
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i
                        class="fa fa-undo"></i> Bỏ qua
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end create function -->

<!-- start create customer -->
<div class="modal fade" id="modal-customer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tạo mới khách hàng</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="customer-form">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_name">Mã khách hàng</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_code" name="customer_code" class="form-control" value=""
                                   placeholder="Mã khách hàng(tự sinh nếu bỏ trống)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_name">Tên Khách hàng</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_name" name="customer_name" class="form-control" value=""
                                   placeholder="Nhập tên khách hàng( bắc buộc )">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_phone">Số điện thoại</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_phone" name="customer_phone"
                                   class="form-control" value="" placeholder="0.123.456.789">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_email">Email</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_email" name="customer_email" class="form-control" value=""
                                   placeholder="Nhập email khách hàng ( ví dụ: kh10@gmail.com )">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_addr">Địa chỉ</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_address" name="customer_address" class="form-control"
                                   value="" placeholder="Mai Dịch - Cầu Giấy - Hà Nội">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_birthday">Ngày sinh</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_birthday" name="customer_birthday"
                                   class="form-control txttimes" value="" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_gender">Giới tính</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="radio" name="customer_gender" checked class="gender" value="1"> Nam
                            <input type="radio" name="customer_gender" class="gender" value="0"> Nữ
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="customer_notes">Ghi chú</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="customer_note" name="customer_note" class="form-control" value=""
                                   placeholder="Ghi chú ...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn-save-customer" class="btn btn-primary btn-sm btn-crcust"><i
                                class="fa fa-check"></i> Lưu
                        </button>
                        <button type="reset" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i
                                class="fa fa-undo"></i> Bỏ qua
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end customer -->

<!-- PRODUCTS -->
<div class="modal fade" id="list-prd-manufacture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Quản lý nhà sản xuất</h4>
            </div>
            <div class="modal-body">
                <div class="tabtable">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-setting" role="tablist"
                        style="background-color: #EFF3F8; padding: 5px 0 0 15px;">
                        <li role="presentation" class="active list-manufacture-click" style="margin-right: 3px;"><a
                                href="#list-manufacture" aria-controls="list-manufacture" role="tab"
                                data-toggle="tab"><i class="fa fa-list"></i> Danh sách Nhà sản xuất</a></li>
                        <li role="presentation"><a href="#create-manufacture" aria-controls="create-manufacture"
                                                   role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Tạo mới chủng
                                loại</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" style="padding:10px; border: 1px solid #ddd; border-top: none;">
                        <div role="tabpanel" class="tab-pane active" id="list-manufacture">
                            <div class="prd_manufacture-body">

                            </div>
                        </div>

                        <!-- Tab Function -->
                        <div role="tabpanel" class="tab-pane" id="create-manufacture">
                            <div class="row form-horizontal">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-7 padd-right-0">
                                            <input type="text" style="border-radius: 0 !important;" class="form-control"
                                                   id="prd_manuf_name" value="" placeholder="Nhập tên Nhà sản xuất">
                                        </div>
                                        <div class="input-groups-btn col-md-5 padd-0">
                                            <button type="button" class="btn btn-primary"
                                                    style="border-radius: 0 3px 3px 0;"
                                                    onclick="cms_create_manufacture(1);"><i class="fa fa-check"></i> Lưu
                                            </button>
                                            <button type="button" class="btn btn-primary " onclick="cms_create_manufacture(0);"><i
                                                    class="fa fa-floppy-o"></i> Lưu và tiếp tục
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i
                        class="fa fa-undo"></i> Đóng
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="list-prd-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Quản lý danh mục</h4>
            </div>
            <div class="modal-body">
                <div class="tabtable">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tab-setting" role="tablist"
                        style="background-color: #EFF3F8; padding: 5px 0 0 15px;">
                        <li role="presentation" class="active" style="margin-right: 3px;"><a href="#list-groups"
                                                                                             aria-controls="list-group"
                                                                                             role="tab"
                                                                                             data-toggle="tab"><i
                                    class="fa fa-list"></i> Danh sách danh mục</a></li>
                        <li role="presentation"><a href="#create-groups" aria-controls="create-group" role="tab"
                                                   data-toggle="tab"><i class="fa fa-plus"></i> Tạo mới danh mục</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" style="padding:10px; border: 1px solid #ddd; border-top: none;">
                        <div role="tabpanel" class="tab-pane active" id="list-groups">
                            <div class="prd_group-body">
                                <div class="text-center">
                                    @include('cms.modules.products.list-prod-group')
                                </div>
                            </div>
                        </div>

                        <!-- Tab Function -->
                        <div role="tabpanel" class="tab-pane" id="create-groups">
                            <div class="row form-horizontal">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-4 text-right">
                                            <label>Tên danh mục</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="prd_group_name" class="form-control"
                                                   placeholder="Nhập tên danh mục.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4 text-right">
                                            <label>Danh mục cấp cha</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="parentid" class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="button" class="btn btn-primary"
                                                    style="border-radius: 0 3px 3px 0;" onclick="cms_create_group(1);"><i
                                                    class="fa fa-check"></i> Lưu
                                            </button>
                                            <button type="button" class="btn btn-primary "
                                                    onclick="cms_create_group(0);"><i class="fa fa-floppy-o"></i> Lưu
                                                và tiếp tục
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal"><i
                        class="fa fa-undo"></i> Đóng
                </button>
            </div>
        </div>
    </div>
</div>
