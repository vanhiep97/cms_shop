@php
    $user = auth()->user()->level;
@endphp
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Mã hóa đơn</th>
        <th class="text-center">Theo chứng từ</th>
        <th class="text-center">Ngày lập</th>
        <th class="text-center">Người lập</th>
        <th class="text-center">Nhà cung cấp</th>
        <th class="text-center">Trạng thái</th>
        <th class="text-center" style="background-color: #fff;">Tổng tiền</th>
        <th></th>
        @if($user === 0 || $user === 1 || $user === 2)
        <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                  class="checkbox chkAll"><span
                    style="width: 15px; height: 15px;"></span></label></th>
        @endif
    </tr>
    </thead>
    <tbody>
    @if(!empty($listBillOrders) && count($listBillOrders) > 0)
    @foreach ($listBillOrders as $key => $value)
        <tr id="bill-order_{{ $value->id }}">
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
            <td class="text-center" style="color: #2a6496; cursor: pointer;">
                {{ $value->bill_code }}
            </td>
            <td class="text-center">{{ $value->input->input_code ? $value->input->input_code : '' }}</td>
            <td class="text-center">{{ $value->bill_date }}</td>
            <td class="text-center">{{ $value->user_practise }}</td>
            @php
                $supplierName = App\Models\Supplier::select('supplier_name')->where('id', $value->input->supplier_id)->first();
            @endphp
            <td class="text-center">
                @if($value->bill_status == 1)
                    <span class="badge badge-success" id="bag-bill-order">{{ 'Đã thanh toán' }}</span> <i id="update-status-bill-order" data-id="{{ $value->id }}" class="fa fa-edit"></i>
                @elseif($value->bill_status == 0)
                    <span class="badge badge-danger" id="bag-bill-order">{{ 'Chưa thanh toán' }}</span> <i id="update-status-bill-order" data-id="{{ $value->id }}" class="fa fa-edit"></i>
                @endif
            </td>
            <td class="text-center">{{ $supplierName->supplier_name }}</td>
            <td class="text-center"
                style="background-color: #F2F2F2;">{{ $value->total_money }}</td>
            <td class="text-center" style="background: #fff;">
                <a href="{{ route('forms.printBillOrder', ['id' => $value->id]) }}" target="blank">
                    <i title="In"
                    class="fa fa-print blue"
                    style="margin-right: 5px;"></i>
                </a>
                @if($user === 0 || $user === 1 || $user === 2)
                <a href="javascript:void(0)">
                    <i class="fa fa-trash-o" data-id="{{ $value->id }}" id="btn-delete-bill-order" style="color: darkred;" title=""></i>
                </a>
                @endif
            </td>
            @if($user === 0 || $user === 1 || $user === 2)
            <td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                    id="bill_order_ids"
                                                                                    data-ids="{{ $value->id }}"
                                                                                    value=""
                                                                                    class="checkbox chk"><span
                        style="width: 15px; height: 15px;"></span></label>
            </td>
            @endif
        </tr>
        <tr class="tr-hide" id="tr-detail-order-{{ $value->id }}">
            <td colspan="15">
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab">
                                <i class="green icon-reorder bigger-110"></i>
                                Chi tiết hóa đơn mua
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
                                        $billOrderDetail = json_decode($value->bill_detail ? $value->bill_detail : []);
                                        $countProduct = 0;
                                        foreach ($billOrderDetail as $key => $prd) {
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
                                        class="hidden-768">Giảm giá: {{ $value->coupon ? number_format($value->coupon) : 0 }}
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
                                <div class="padding-left-10">
                                    <i class="fa fa-clock-o"></i>
                                    <span class="hidden-768">Còn nợ: {{ $value->lack ? number_format($value->lack) : 0 }}</span>
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
                                    <th class="text-center">Giá nhập</th>
                                    <th class="text-center ">Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $billOrderDetail = json_decode($value->bill_detail ? $value->bill_detail : []);
                                    @endphp
                                    @if(!empty($billOrderDetail) && count($billOrderDetail) > 0)
                                        @foreach($billOrderDetail as $key => $value)
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
       if(!empty($listBillOrders) && count($listBillOrders) > 0) {
           $totalMoney = 0;
           $lack = 0;
           foreach ($listBillOrders as $key => $value) {
               $totalMoney += $value->total_price;
               $lack += $value->lack;
           }
       }
    @endphp
    @if(!empty($listBillOrders) && count($listBillOrders) > 0)
    <div class="sm-info pull-left padd-0">
        Tổng số hóa đơn mua:
        <span>{{ count($listBillOrders) }}</span>
        Tổng tiền:
        <span>{{ $totalMoney ? number_format($totalMoney) : 0 }}</span>
        Tổng nợ:
        <span>{{ $lack ? number_format($lack) : 0 }}</span>
    </div>
    @endif
    <div class="pull-right ajax-pagination">
        {{ $listBillOrders->links() }}
    </div>
</div>

