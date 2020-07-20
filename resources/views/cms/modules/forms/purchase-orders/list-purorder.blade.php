<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Mã đơn mua hàng</th>
        <th class="text-center">Ngày lập</th>
        <th class="text-center">Người lập</th>
        <th class="text-center" style="padding: 0px;">
            <select style="text-align:center;" id="customer-id">
                <option value="-1">Nhà cung cấp</option>
            </select></th>
        <th class="text-center">Tình trạng</th>
        <th class="text-center" style="background-color: #fff;">Tổng tiền</th>
        <th></th>
        <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                  class="checkbox chkAll"><span
                    style="width: 15px; height: 15px;"></span></label></th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($listPurchaseOrders) && count($listPurchaseOrders) > 0)
        @foreach($listPurchaseOrders as $key => $value)
            <tr>
                <td style="text-align: center;">
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                       class="fa fa-plus-circle i-detail-order-{{ $value->id }}"
                       onclick="cms_show_detail_order({{ $value->id }})">
                    </i>
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                       class="fa fa-minus-circle i-hide i-detail-order-{{ $value->id }}"
                       onclick="cms_show_detail_order({{ $value->id }})">
                    </i>
                </td>
                <td class="text-center"
                    style="color: #2a6496; cursor: pointer;">{{ $value->pur_order_code ? $value->pur_order_code : '' }}</td>
                <td class="text-center">{{ $value->pur_order_date ? $value->pur_order_date : '' }}</td>
                <td class="text-center">{{ $value->user_practise ? $value->user_practise : '' }}</td>
                <td class="text-center">{{ $value->supplier_id ? $value->supplier->supplier_name : '' }}</td>
                <td class="text-center">{{ $value->pur_order_status == 0 ? 'Chưa gửi NCC' : 'Đã gửi NCC' }}</td>
                <td class="text-center"
                    style="background-color: #F2F2F2;">{{ $value->total_price ? number_format($value->total_price) : 0 }}</td>
                <td class="text-center" style="background: #fff;">
                    <a href="{{ route('form.printPurchaseOrder', ['id' => $value->id]) }}">
                        <i title="In"
                        class="fa fa-print blue"
                        style="margin-right: 5px;"></i>
                        <i class="fa fa-trash-o" style="color: darkred;"></i>
                    </a>
                </td>
                <td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                          value=""
                                                                                          class="checkbox chk"><span
                            style="width: 15px; height: 15px;"></span></label>
            </tr>
            <tr class="tr-hide" id="tr-detail-order-{{ $value->id }}">
                <td colspan="15">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab">
                                    <i class="green icon-reorder bigger-110"></i>
                                    Chi tiết đơn hàng
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="alert alert-success clearfix" style="display: flex;">
                                    <div>
                                        <i class="fa fa-cart-arrow-down">
                                        </i>
                                        @php
                                            $purOrderDetail = json_decode($value->pur_order_detail ? $value->pur_order_detail : []);
                                            $countProduct = 0;
                                            foreach ($purOrderDetail as $key => $prd) {
                                                $countProduct += $prd->product_sell_amount;
                                            }
                                        @endphp
                                        <span
                                            class="hidden-768">Số lượng SP: {{ $countProduct ? $countProduct : 0}}
                                        </span>
                                        <label>
                                        </label>
                                    </div>
                                    <div class="padding-left-10">
                                        <i class="fa fa-dollar">
                                        </i>
                                        <span
                                            class="hidden-768">Tiền hàng: {{ $value->total_price ? number_format($value->total_price) : 0 }}
                                        </span>
                                        <label>
                                        </label>
                                    </div>
                                    <div class="padding-left-10">
                                        <i class="fa fa-dollar">
                                        </i>
                                        <span
                                            class="hidden-768">Tổng tiền: {{ $value->total_money ? number_format($value->total_money) : 0 }}
                                        </span>
                                        <label>
                                        </label>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover dataTable">
                                    <thead>
                                    <tr role="row">
                                        <th class="text-center">STT</th>
                                        <th class="text-left hidden-768">Mã sản phẩm</th>
                                        <th class="text-left">Tên sản phẩm</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Đơn giá</th>
                                        <th class="text-center ">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $purOrderDetail = json_decode($value->pur_order_detail ? $value->pur_order_detail : []);
                                    @endphp
                                    @if(!empty($purOrderDetail) && count($purOrderDetail) > 0)
                                        @foreach($purOrderDetail as $key => $value)
                                            <tr>
                                                <td class="text-center width-5 hidden-320 ">
                                                    {{ $key + 1 }}
                                                </td>
                                                <td class="text-left hidden-768">
                                                    {{ $value->product_code ? $value->product_code : '' }}
                                                </td>
                                                <td class="text-left ">
                                                    {{ $value->product_name ? $value->product_name : '' }}
                                                </td>
                                                <td class="text-center ">
                                                    {{ $value->product_sell_amount ? $value->product_sell_amount : 0 }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $value->product_origin_price ? number_format($value->product_origin_price) : 0 }}
                                                </td>
                                                <td class="text-center">
                                                    {{ number_format($value->product_origin_price * $value->product_sell_amount) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    @php
       if(!empty($listPurchaseOrders) && count($listPurchaseOrders) > 0) {
           $totalMoney = 0;
           foreach ($listPurchaseOrders as $key => $value) {
               $totalMoney += $value->total_money;
           }
       }
    @endphp
    <div class="sm-info pull-left padd-0">
        Tổng số hóa đơn: <span>{{ count($listPurchaseOrders) }}</span>
        Tổng tiền:
        <span>{{ $totalMoney ? number_format($totalMoney) : 0 }}</span>
    </div>
    <div class="pull-right ajax-pagination">
        {{ $listPurchaseOrders->links() }}
    </div>
</div>

