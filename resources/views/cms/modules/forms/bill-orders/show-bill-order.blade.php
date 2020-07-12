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
                    @if(!empty($productByInput))
                        @foreach (json_decode($productByInput->import_detail) as $key => $item)
                            <tr id="product_pos_{{$item->id }}" data-id="{{$item->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td id="product-code" data-code="{{ $item->product_code }}">{{ $item->product_code ? $item->product_code : '' }}</td>
                                <td id="product-name" data-name="{{ $item->product_name }}">{{ $item->product_name ? $item->product_name : '' }}</td>
                                <td><input type="number" value="{{ $item->product_sell_amount }}" id="amount-bill" disabled data-amount-bill="{{ $item->product_sell_amount }}" style="width: 50px"/></td>
                                <td id="origin-price" data-price={{ $item->origin_price }}>{{ $item->origin_price ? number_format($item->origin_price) : 0 }}</td>
                                <td id="total-money-bill" data-money-bill="{{ $item->origin_price *  $item->product_sell_amount}}">{{ $item->origin_price *  $item->product_sell_amount}}</td>
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
                                <label>Nhà cung cấp</label>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 padd-0" style="position: relative;">
                                    <input id="search-box-mas" class="form-control" type="text"
                                    disabled value="{{ $productByInput->supplier->supplier_name }}" data-id="{{ $productByInput->supplier->id }}"
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
                                <label>Ngày lập</label>
                            </div>
                            <div class="col-md-8">
                                <input id="bill-date"" class="form-control datepk" type="text" placeholder="YYYY/MM/DD"
                                       style="border-radius: 0 !important;">
                            </div>
                        </div>
                        <div class="form-group marg-bot-10 clearfix">
                            <div style="padding:0px" class="col-md-4">
                                <label>Người nhập</label>
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
                                <textarea id="note-bill" cols="" class="form-control" rows="3"
                                style="border-radius: 0;"></textarea>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <h4 class="lighter" style="margin-top: 0;">
                                             <i class="fa fa-info-circle blue"></i>
                                             Thông tin thanh toán
                                         </h4>

                                         <div class="morder-info" style="padding: 4px;">
                                             <div class="tab-contents" style="padding: 8px 6px;">
                                                 <div class="form-group marg-bot-10 clearfix">
                                                     <div class="col-md-4">
                                                         <label>Hình thức</label>
                                                     </div>
                                                     <div class="col-md-8">
                                                         <div class="input-group">
                                                             <input type="radio" class="payment-method" name="method-pay" id="sell_type" value="1" checked>
                                                             Tiền mặt &nbsp;
                                                             <input type="radio" class="payment-method" name="method-pay" id="sell_type" value="2"> Thẻ&nbsp;
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="form-group marg-bot-10 clearfix">
                                                     <div class="col-md-4">
                                                         <label>Tiền hàng</label>
                                                     </div>
                                                     <div class="col-md-8">
                                                        <div class="total-money" id="money" data-money="{{ $productByInput->total_price }}">
                                                            {{ $productByInput->total_price ? $productByInput->total_price : 0 }}
                                                        </div>
                                                     </div>
                                                 </div>
                                                 <div class="form-group marg-bot-10 clearfix">
                                                     <div class="col-md-4 padd-right-0">
                                                         <label>Chiết khấu</label>
                                                     </div>
                                                     <div class="col-md-8">
                                                         <input type="text"
                                                                class="form-control text-right txtMoney discount-import" id="discount-order"
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
                                                         <label>Thanh toán</label>
                                                     </div>
                                                     <div class="col-md-8">
                                                         <input type="text"
                                                                class="form-control text-right txtMoney customer-pay"
                                                                placeholder="0" style="border-radius: 0 !important;">
                                                     </div>
                                                 </div>
                                                 <div class="form-group marg-bot-10 clearfix">
                                                     <div class="col-md-4">
                                                         <label>Còn nợ</label>
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
                    <button type="button" class="btn btn-primary hidden">
                        <i class="fa fa-floppy-o"></i> Lưu tạm
                    </button>
                    <button type="button" class="btn btn-primary"><i
                            class="fa fa-check"></i> Lưu
                    </button>
                    <button type="button" class="btn btn-primary"><i
                            class="fa fa-print"></i> Lưu và in
                    </button>
                    <button type="button" class="btn btn-default btn-back"><i
                            class="fa fa-arrow-left"></i> Hủy
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

