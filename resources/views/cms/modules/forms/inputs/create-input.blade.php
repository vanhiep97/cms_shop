@extends('cms.layouts.app')
@section('content')
<div class="breadcrumbs-fixed panel-action">
    <div class="row">
        <div class="orders-act">
            <div class="col-md-4 col-md-offset-2">
                <div class="left-action text-left clearfix">
                    <h2>Tạo phiếu nhập kho &raquo;</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-action text-right">
                    <div class="btn-groups">
                        <button type="button" id="btn-save-input" class="btn btn-primary"><i
                                class="fa fa-check"></i> Lưu
                        </button>
                        <a href="{{ route('forms.listInputs') }}" class="btn btn-default"><i
                                class="fa fa-arrow-left"></i> Hủy
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-space orders-space"></div>

<div class="order-search" style="margin: 20px 20px 20px 0; padding-top: 30px">
    <div class="row">
        <div class="col-md-12">
            <select id="search-pur-order" class="form-control">
                <option value="0">-- Theo đơn mua hàng số</option>
                    @if(!empty($listPurchaseOrders) && count($listPurchaseOrders) > 0)
                        @foreach ($listPurchaseOrders as $item)
                             <option value="{{ $item->id }}">{{ $item->pur_order_code }}</option>
                        @endforeach
                    @endif
            </select>
        </div>
    </div>
</div>
<div class="orders-content check-order" id="input">
    <div class="row">
        <div class="col-md-8">
            <div class="product-results">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th>Mã hàng</th>
                        <th>Tên hàng</th>
                        <th class="text-center">Số lượng giao</th>
                        <th class="text-center">Số lượng nhận</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Thành tiền</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="pro_on_pur_order">

                    </tbody>
                </table>
            </div>
            <div class="alert alert-success" style="margin-top: 30px;" role="alert">Gõ mã hoặc tên sản phẩm vào hộp
                tìm kiếm để thêm hàng vào đơn hàng
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="morder-info" style="padding: 4px;">
                        <div class="tab-contents" style="padding: 8px 6px;">
                            <div class="form-group marg-bot-10 clearfix">
                                <div style="padding:0px" class="col-md-4">
                                    <label>Nhà cung cấp</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="col-md-12 padd-0" style="position: relative;">
                                    <input id="search-box-mas" class="form-control" type="text"
                                               placeholder="Tìm nhà cung cấp"
                                               autocomplete="off"
                                               style="border-radius: 3px 0 0 3px !important;"><span
                                               style="color: red; position: absolute; right: 5px; top:5px;cursor: pointer; "
                                                                id="close-form-supplier" class="del-mas">x</span>

                                        <div id="mas-suggestion-box"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div style="padding:0px" class="col-md-4">
                                    <label>Ngày lập phiếu</label>
                                </div>
                                <div class="col-md-8">
                                    <input id="input-date"" class="form-control datepk" type="text" placeholder="YYYY/MM/DD"
                                           style="border-radius: 0 !important;">
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div style="padding:0px" class="col-md-4">
                                    <label>Người lập phiếu</label>
                                </div>
                                <div class="col-md-8">
                                    <select disabled="disabled" id="" class="form-control">
                                        <option
                                            value="1">{{ auth()->user()->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div style="padding:0px" class="col-md-4">
                                    <label>Ghi chú</label>
                                </div>
                                <div class="col-md-8">
    <textarea id="note-import" cols="" class="form-control" rows="3"
           style="border-radius: 0;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4 class="lighter" style="margin-top: 0;">
                        <i class="fa fa-info-circle blue"></i>
                        Thông tin phiếu nhập kho
                    </h4>

                    <div class="morder-info" style="padding: 4px;">
                        <div class="tab-contents" style="padding: 8px 6px;">
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Thành tiền</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="total-money" id="money">
                                        0
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Tổng tiền</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="total-after-discount">
                                        0
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="btn-groups pull-right" style="margin-bottom: 50px;">
                        <button type="button" id="btn-save-input" class="btn btn-primary"><i
                                class="fa fa-check"></i> Lưu
                        </button>
                        <a href="{{ route('forms.listInputs') }}" class="btn btn-default"><i
                                class="fa fa-arrow-left"></i> Hủy
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
