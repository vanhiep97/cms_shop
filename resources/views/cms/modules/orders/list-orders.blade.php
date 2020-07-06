<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Mã đơn hàng</th>
        <th class="text-center">Ngày bán</th>
        <th class="text-center">Thu ngân</th>
        <th class="text-center" style="padding: 0px;">
            <select style="text-align:center;" id="customer-id">
                <option value="-1">Khách hàng</option>
            </select></th>
        <th class="text-center">Trạng thái</th>
        <th class="text-center" style="background-color: #fff;">Tổng tiền</th>
        <th class="text-center"><i class="fa fa-clock-o"></i> Nợ</th>
        <th></th>
        <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                  class="checkbox chkAll"><span
                    style="width: 15px; height: 15px;"></span></label></th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($orders) && count($orders) > 0)
        @foreach($orders as $key => $value)
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
                    style="color: #2a6496; cursor: pointer;">{{ $value->order_code ? $value->order_code : '' }}</td>
                <td class="text-center">{{ $value->sell_date ? $value->sell_date : '' }}</td>
                <td class="text-center">{{ $value->user_practise ? $value->user_practise : '' }}</td>
                <td class="text-center">{{ $value->customer_id ? $value->customer->customer_name : '' }}</td>
                <td class="text-center">{{ $value->order_status == 0 ? 'Đã thanh toán' : 'Chưa thanh toán'}}</td>
                <td class="text-center"
                    style="background-color: #F2F2F2;">{{ $value->total_money? $value->total_money : '' }}</td>
                <td class="text-center"
                    style="background: #fff;">{{ $value->lack ? $value->lack : '' }}</td>
                <td class="text-center" style="background: #fff;">
                    <i title="In"
                       class="fa fa-print blue"
                       style="margin-right: 5px;"></i>
                    <i class="fa fa-trash-o" style="color: darkred;"></i></td>
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
                                        <span
                                            class="hidden-768">Số lượng SP: 10
                                        </span>
                                        <label>
                                        </label>
                                    </div>
                                    <div class="padding-left-10">
                                        <i class="fa fa-dollar">
                                        </i>
                                        <span
                                            class="hidden-768">Tiền hàng: {{ $value->total_price ? $value->total_price : 0 }}
                                        </span>
                                        <label>
                                        </label>
                                    </div>
                                    <div class="padding-left-10">
                                        <i class="fa fa-dollar">
                                        </i>
                                        <span
                                            class="hidden-768">Giảm giá: {{ $value->coupon ? $value->coupon : 0 }}
                                        </span>
                                        <label>
                                        </label>
                                    </div>
                                    <div class="padding-left-10">
                                        <i class="fa fa-dollar">
                                        </i>
                                        <span
                                            class="hidden-768">Tổng tiền: {{ $value->total_money ? $value->total_money : 0 }}
                                        </span>
                                        <label>
                                        </label>
                                    </div>
                                    <div class="padding-left-10">
                                        <i class="fa fa-clock-o"></i>
                                        <span class="hidden-768">Còn nợ: </span>{{ $value->lack ? $value->lack : 0 }}
                                        <label
                                        >
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
                                        <th class="text-center">Giá bán</th>
                                        <th class="text-center ">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $orderDetail = json_decode($value->order_detail ? $value->order_detail : []);
                                    @endphp
                                    @if(!empty($orderDetail) && count($orderDetail) > 0)
                                        @foreach($orderDetail as $key => $value)
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
                                                    {{ $value->product_amount ? $value->product_amount : 0 }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $value->product_sell_price ? $value->product_sell_price : '' }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $value->product_sell_price * $value->product_amount }}
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
    <div class="sm-info pull-left padd-0">
        Tổng số hóa đơn: <span></span>
        Tổng tiền:
        <span></span>
        Tổng nợ:
        <span></span>
    </div>
    <div class="pull-right ajax-pagination">
        {{ $orders->links() }}
    </div>
</div>
