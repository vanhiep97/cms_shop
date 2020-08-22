@extends('cms.layouts.app')
@section('content')
    <div class="customer-supplier">
        <div class="breadcrumbs-fixed panel-action">
            <div class="row">
                <div class="supplier-act act">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="left-action text-left clearfix">
                            <h2>Nhà cung cấp</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right-action text-right">
                            <div class="btn-groups">
                                <button type="button" class="btn btn-primary" id="btn-create-supplier">
                                    <i class="fa fa-plus"></i>Tạo NCC
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-space customer"></div>
        <div>
            <div class="sup-sear panel-sear">
                <div>
                    {{-- <div class="form-group col-md-6 padd-0">
                        <input type="text" class="form-control txt-ssupplier"
                               placeholder="Nhập tên, mã hoặc SDT Nhà cung cấp">
                    </div>
                    <div class="form-group col-md-6 ">
                        <div class="col-md-4 padd-0" style="margin-right: 10px;">
                            <select id="sup-option" class="form-control">
                                <option value="0">Tất cả</option>
                                <option value="1">NCC từng nhập hàng</option>
                                <option value="2">Còn nợ NCC</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary btn-large btn-ssup"><i
                                class="fa fa-search"></i> Tìm kiếm
                        </button>
                    </div> --}}
                </div>
            </div>
            <div class="sup-body">
                @include('cms.modules.suppliers.list_supplier')
            </div>
        </div>
        <div class="modal fade" id="create-sup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tạo mới nhà cung cấp</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="frm-crsup">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="supplier_name">Tên NCC</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="supplier_name" name="supplier_name" class="form-control" value=""
                                           placeholder="Nhập tên nhà cung cấp (bắc buộc)">
                                    <span style="color: red; font-style: italic;" class="error error-supplier_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="supplier_phone">Số điện thoại</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="supplier_phone" name="supplier_phone" class="form-control"
                                           value="" placeholder="Số điện thoại">
                                    <span style="color: red; font-style: italic;" class="error error-supplier_phone"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="supplier_email">Email</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="supplier_email" name="supplier_email" class="form-control" value=""
                                           placeholder="Nhập email nhà cung cấp ( ví dụ: kh10@gmail.com )">
                                    <span style="color: red; font-style: italic;" class="error error-supplier_email"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="supplier_addr">Địa chỉ</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="address" name="address" class="form-control"
                                           value="" placeholder="">
                                    <span style="color: red; font-style: italic;" class="error error-supplier_addr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="ATM">ATM</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="ATM" name="ATM" class="form-control"
                                           value="" placeholder="">
                                    <span style="color: red; font-style: italic;" class="error error-supplier_addr"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="supplier_note">Ghi chú</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="supplier_note" name="supplier_note" class="form-control" value="" placeholder="">
                                    <span style="color: red; font-style: italic;" class="error error-supplier_notes"></span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm btn-crsup" id="btn-save"><i
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
    </div>
@endsection
