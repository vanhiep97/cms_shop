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
                <tbody id="pro_on_input">
                    @if(!empty($productByOrder))
                        @foreach (json_decode($productByOrder->order_detail) as $key => $item)
                            <tr id="product_pos_{{$item->id }}" data-id="{{$item->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td id="product-code" data-code="{{ $item->product_code }}">{{ $item->product_code ? $item->product_code : '' }}</td>
                                <td id="product-name" data-name="{{ $item->product_name }}">{{ $item->product_name ? $item->product_name : '' }}</td>
                                <td><input type="number" value="{{ $item->product_sell_amount }}" id="amount-bill" data-amount-bill="{{ $item->product_sell_amount }}" style="width: 50px"/></td>
                                <td id="sell-price" data-price={{ $item->product_sell_price }}>{{ $item->product_sell_price ? number_format($item->product_sell_price) : 0 }}</td>
                                <td id="total-money-bill" data-money-bill="{{ $item->product_sell_price *  $item->product_sell_amount}}">{{ $item->product_sell_price *  $item->product_sell_amount}}</td>
                                <td class="text-center">
                                    <i class="fa fa-trash-o" style="color: darkred;" id="delete-product-pos" data-id="" title="Xóa"></i>
                                </td>
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
                                <label>Khách hàng</label>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-11 padd-0" style="position: relative;">
                                    <input id="search-box-customer" class="form-control"
                                            type="text"
                                            value="{{ $productByOrder->customer->customer_name }}"
                                            data-id="{{ $productByOrder->customer->id }}"
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
                                <label>Ngày lập</label>
                            </div>
                            <div class="col-md-8">
                                <input id="bill-exchange-date" class="form-control datepk" type="text" placeholder="YYYY/MM/DD"
                                       style="border-radius: 0 !important;">
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
                                <label>Lý do đổi trả</label>
                            </div>
                            <div class="col-md-8">
            <textarea id="note-exchange" cols="" class="form-control" rows="3"
                        style="border-radius: 0;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h4 class="lighter" style="margin-top: 0;">
                    <i class="fa fa-info-circle blue"></i>
                    Thông tin đổi trả
                </h4>

                <div class="morder-info" style="padding: 4px;">
                    <div class="tab-contents" style="padding: 8px 6px;">
                        <div class="form-group marg-bot-10 clearfix">
                            <div class="col-md-4">
                                <label>Tiền hàng</label>
                            </div>
                            <div class="col-md-8">
                                <div class="total-money" id="money" data-money="{{ $productByOrder->total_price }}">
                                    {{ $productByOrder->total_price ? number_format($productByOrder->total_price) : 0 }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group marg-bot-10 clearfix">
                            <div class="col-md-4">
                                <label class="debt">Hoàn trả khách</label>
                            </div>
                            <div class="col-md-8">
                                <div class="debt" id="money-refund" data-refund="{{ $productByOrder->total_price }}">
                                    {{ $productByOrder->total_price ? number_format($productByOrder->total_price) : 0 }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="btn-groups pull-right" style="margin-bottom: 50px;">
                    <button type="button" class="btn btn-primary" id="btn-save-bill-exchange"><i
                            class="fa fa-check"></i> Lưu
                    </button>
                    <a href="{{ route('forms.listBillExchanges') }}" class="btn btn-default"><i
                            class="fa fa-arrow-left"></i> Hủy
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

