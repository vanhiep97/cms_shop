<div class="row">
    <div class="col-md-8">
        <div class="product-results">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Mã hàng</th>
                    <th>Tên hàng</th>
                    <th class="text-center">Số lượng đặt</th>
                    <th class="text-center">Số lượng giao</th>
                    <th class="text-center">Số lượng nhận</th>
                    <th class="text-center">Đơn giá</th>
                    <th class="text-center">Thành tiền</th>
                </tr>
                </thead>
                <tbody id="pro_on_pur_order">
                    @if(!empty($productByPurchaseOrder))
                        @foreach (json_decode($productByPurchaseOrder->pur_order_detail) as $key => $item)
                            <tr id="product_pos_{{$item->id }}" data-id="{{$item->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td id="product-code" data-code="{{ $item->product_code }}">{{ $item->product_code ? $item->product_code : '' }}</td>
                                <td id="product-name" data-name="{{ $item->product_name }}">{{ $item->product_name ? $item->product_name : '' }}</td>
                                <td><input type="number" id="amount-get" data-amount-get="{{ $item->product_sell_amount }}" value="{{ $item->product_sell_amount }}" disabled style="width: 50px"/></td>
                                <td><input type="number" value="{{ $item->product_sell_amount }}" id="amount-ship" data-amount-ship="{{ $item->product_sell_amount }}" style="width: 50px"/></td>
                                <td><input type="number" value="{{ $item->product_sell_amount }}" id="amount-input" data-amount-input="{{ $item->product_sell_amount }}" style="width: 50px"/></td>
                                <td id="origin-price" data-price={{ $item->product_origin_price }}>{{ $item->product_origin_price ? number_format($item->product_origin_price) : 0 }}</td>
                                <td id="total-money-input" data-money-input="{{ $item->product_origin_price *  $item->product_sell_amount}}">{{ $item->product_origin_price *  $item->product_sell_amount}}</td>
                            </tr>
                        @endforeach
                    @endif
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
                                <label>Nhà cung cấp</label>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 padd-0" style="position: relative;">
                                <input id="search-box-mas" disabled value="{{ $productByPurchaseOrder->supplier->supplier_name }}" data-id="{{ $productByPurchaseOrder->supplier->id }}" class="form-control" type="text"
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
                    Thông tin phiếu yêu cầu
                </h4>

                <div class="morder-info" style="padding: 4px;">
                    <div class="tab-contents" style="padding: 8px 6px;">
                        <div class="form-group marg-bot-10 clearfix">
                            <div class="col-md-4">
                                <label>Thành tiền</label>
                            </div>
                            <div class="col-md-8">
                            <div class="total-money" id="money" data-money="{{ $productByPurchaseOrder->total_price }}">
                                    {{ $productByPurchaseOrder->total_price ? $productByPurchaseOrder->total_price : 0 }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group marg-bot-10 clearfix">
                            <div class="col-md-4">
                                <label>Tổng tiền</label>
                            </div>
                            <div class="col-md-8">
                                <div class="total-after-discount">
                                    {{ $productByPurchaseOrder->total_price ? $productByPurchaseOrder->total_price : 0 }}
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
                    <button type="button" class="btn btn-default btn-back"><i
                            class="fa fa-arrow-left"></i> Hủy
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

