@extends('cms.layouts.app')
@section('content')
<div class="breadcrumbs-fixed panel-action">
    <div class="row">
        <div class="orders-act">
            <div class="col-md-4 col-md-offset-2">
                <div class="left-action text-left clearfix">
                    <h2>Tạo phiếu nhập &raquo;</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-action text-right">
                    <div class="btn-groups">
                        <button type="button" id="btn-save-bill" class="btn btn-primary"><i
                                class="fa fa-check"></i> Lưu
                        </button>
                        <button type="button" class="btn btn-primary"><i
                                class="fa fa-print"></i> Lưu và in
                        </button>
                        <button type="button" class="btn btn-default"><i
                                class="fa fa-arrow-left"></i> Hủy
                        </button>
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
            <select id="search-input-ord" class="form-control">
                <option value="0">-- Theo phiếu nhập kho số</option>
                    @if(!empty($listOrders) && count($listOrders) > 0)
                        @foreach ($listOrders as $item)
                             <option value="{{ $item->id }}">{{ $item->order_code }}</option>
                        @endforeach
                    @endif
            </select>
        </div>
    </div>
</div>

<div class="orders-content check-order" id="exchange">
    <div class="row">
        <div class="col-md-8">
            <div class="product-results">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th>Mã hàng</th>
                        <th>Tên sản phẩm</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Giá nhập</th>
                        <th class="text-center">Thành tiền</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="pro_search_append">
                    </tbody>
                </table>
                <div class="alert alert-success" style="margin-top: 30px;" role="alert">Gõ mã hoặc tên sản phẩm vào hộp
                    tìm kiếm để thêm hàng vào đơn hàng
                </div>
            </div>
        </div>
       <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="morder-info" style="padding: 4px;">
                        <div class="tab-contents" style="padding: 8px 6px;">
                            <div class="form-group marg-bot-10 clearfix">
                                <div style="padding:0px" class="col-md-4">
                                    <label>Khách hàng</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="col-md-11 padd-0" style="position: relative;">
                                        <input id="search-box-customer" class="form-control"
                                                type="text"
                                                autocomplete="off"
                                                placeholder="Tìm khách hàng (F4)"
                                                style="border-radius: 3px 0 0 3px !important;"><span
                                            style="color: red; position: absolute; right: 5px; top:5px;cursor: pointer; "
                                            id="close-form-customer" class="del-cys">x</span>

                                        <div id="search-result-customer"></div>
                                    </div>
                                    <div class="col-md-1 padd-0">
                                        <button type="button" id="btn-create-customer"
                                                class="btn btn-primary"
                                                style="border-radius: 0 3px 3px 0; box-shadow: none; padding: 7px 11px;">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div style="padding:0px" class="col-md-4">
                                    <label>NV bán hàng</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="sale_id" disabled>
                                        <option value="0">{{ auth()->user()->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div style="padding:0px" class="col-md-4">
                                    <label>Ghi chú</label>
                                </div>
                                <div class="col-md-8">
                <textarea id="note-order" cols="" class="form-control" rows="3"
                            style="border-radius: 0;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4 class="lighter" style="margin-top: 0;">
                        <i class="fa fa-info-circle blue"></i>
                        Hình thức bán hàng
                    </h4>

                    <div class="morder-info" style="padding: 4px;">
                        <div class="tab-contents" style="padding: 8px 6px;">
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Hình thức</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="radio" id="sell_type" class="payment-method"
                                                name="method-pay" value="0" checked>
                                        Trực tiếp &nbsp;
                                        <input type="radio" id="sell_type" class="payment-method"
                                                name="method-pay" value="1"> Giao hàng
                                    </div>

                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Tiền hàng</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="total-money" id="money">
                                        0
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Giảm giá (F7)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text"
                                            class="form-control text-right txtMoney discount-order" id="discount-order"
                                            placeholder="0" style="border-radius: 0 !important;">
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Tổng cộng</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="total-after-discount">
                                        0
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4 padd-right-0">
                                    <label>Khách đưa (F8)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text"
                                            class="form-control text-right txtMoney customer-pay"
                                            placeholder="0" style="border-radius: 0 !important;">
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label class="debt">Hoàn trả khách</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="debt" id="lack">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="btn-groups pull-right" style="margin-bottom: 50px;">
                        <button type="button" class="btn btn-primary" id="btn-save-order"><i
                                class="fa fa-check"></i> Lưu (F9)
                        </button>
                        <button type="button" class="btn btn-primary" id="btn-save-print-order"><i class="fa fa-print"></i> In hóa đơn (F10)
                        </button>
                        <a href="{{ route('pos.index') }}" class="btn btn-default"><i
                                class="fa fa-arrow-left"></i> Hủy
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
