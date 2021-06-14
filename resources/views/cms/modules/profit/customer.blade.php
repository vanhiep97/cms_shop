@extends('cms.layouts.app')
@section('content')
    <div class="orders">
        <div class="breadcrumbs-fixed col-md-offset-2 panel-action padding-left-10">
            <h5 style="float: left;">
                <label style="color: #428bca;font-size: 23px;">Báo cáo lợi nhuận</label>
                <label style="color: #307ecc; padding-left: 10px;">
                    <input type="radio" name="profit" id="profit-all" value="1">
                    <span class="lbl">Theo đơn hàng</span>
                </label>
                <label style="color: #307ecc;">
                    <input type="radio" name="profit" id="profit-customer" value="2" checked>
                    <span class="lbl">Theo khách hàng</span>
                </label>
                <label style="color: #307ecc;">
                    <input type="radio" name="profit" id="profit-sale" value="3">
                    <span class="lbl">Theo NV bán hàng</span>
                </label>
            </h5>
        </div>
        <div class="main-space orders-space"></div>
        <div class="orders-content">
            <div class="product-sear panel-sear">
                <div class="form-group col-md-12 padd-0" style="padding-left: 5px;">

                </div>
            </div>
            <div class="profit-main-body">
                 @if(!empty($orders) && count($orders) > 0)
                <div class="quick-info report row" style="margin-bottom: 15px;">
                    <div class="col-md-12 padd-0">
                        <div class="col-md-3 padd-right-0">
                            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                                <div class="infobox-icon">
                                    <i class="fa fa-tag blue" style="font-size: 45px;" aria-hidden="true"></i>
                                </div>
                                <div class="infobox-data">
                                    @php
                                    if(!empty($orders) && count($orders) > 0) {
                                        $totalCoupon = 0;
                                        $totalMoney = 0;
                                        $totalOriginPrice = 0;
                                        $totalLack = 0;
                                        foreach ($orders as $key => $value) {
                                            $totalCoupon += $value->coupon;
                                            $totalMoney += $value->total_money;
                                            $totalOriginPrice += $value->total_origin_price;
                                            $totalLack += $value->lack;
                                        }
                                    }
                                    @endphp
                                    <h3 class="infobox-title blue"
                                        style="font-size: 25px;">{{ $totalCoupon ? number_format($totalCoupon) : 0 }}</h3>
                                    <span class="infobox-data-number text-center"
                                        style="font-size: 14px; color: #555;">Chiếc khấu</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 padd-right-0">
                            <div class="report-box " style="border: 1px dotted #ddd; border-radius: 0">
                                <div class="infobox-icon">
                                    <i class="fa fa-refresh orange" style="font-size: 45px;"></i>
                                </div>
                                <div class="infobox-data">
                                    <h3 class="infobox-title orange"
                                        style="font-size: 25px;">{{ $totalMoney ? number_format($totalMoney) : 0 }}</h3>
                                    <span class="infobox-data-number text-center"
                                        style="font-size: 14px; color: #555;">Doanh số</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 padd-right-0">
                            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                                <div class="infobox-icon">
                                    <i class="fa fa-money cred" style="font-size: 45px;"></i>
                                </div>
                                <div class="infobox-data">
                                    <h3 class="infobox-title cred"
                                        style="font-size: 25px;">{{ $totalOriginPrice ? number_format($totalOriginPrice) : 0 }}</h3>
                                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Tiền vốn</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 padd-right-0">
                            <div class="report-box " style="border: 1px dotted #ddd; border-radius: 0">
                                <div class="infobox-icon">
                                    <i class="fa fa-dollar orange" style="font-size: 45px;"></i>
                                </div>
                                <div class="infobox-data">
                                    <h3 class="infobox-title orange"
                                        style="font-size: 25px;">{{ $totalMoney && $totalOriginPrice ? number_format($totalMoney - $totalOriginPrice) : 0 }}</h3>
                                    <span class="infobox-data-number text-center"
                                        style="font-size: 14px; color: #555;">Lợi nhuận</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="text-center">Tên khách hàng</th>
                        <th class="text-center">Tổng số đơn</th>
                        <th class="text-center">Tổng SP</th>
                        <th class="text-center">Tổng chiếc khấu</th>
                        <th class="text-center">Doanh số</th>
                        <th class="text-center">Tiền vốn</th>
                        <th class="text-center">Lợi nhuận</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(!empty($customers) && count($customers) > 0)
                        @foreach($customers as $key => $value)
                            @php
                                $couponCustomer = 0;
                                $totalMoneyCustomer = 0;
                                $totalOriginPrice = 0;
                                $totalMoneyLack = 0;
                                $totalQuantity = 0;
                                foreach($value->orders as $item) {
                                    $couponCustomer += $item->coupon;
                                    $totalMoneyCustomer += $item->total_money;
                                    $totalOriginPrice += $item->total_origin_price;
                                    $totalQuantity += $item->total_quantity;
                                    $totalMoneyLack += $item->lack;
                                }
                            @endphp
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
                                <td class="text-center">{{ $value->customer_name }}</td>
                                <td class="text-center">{{ $value->orders ? count($value->orders) : 0 }}</td>
                                <td class="text-center">{{ $totalQuantity ? $totalQuantity : 0 }}</td>
                                <td class="text-center">{{ $couponCustomer ? $couponCustomer : 0 }}</td>
                                <td class="text-center">{{ $totalMoneyCustomer ? number_format($totalMoneyCustomer) : 0 }}</td>
                                <td class="text-center">{{ $totalOriginPrice ? number_format($totalOriginPrice) : 0}}</td>
                                <td class="text-center">{{ $totalMoneyCustomer && $totalOriginPrice ? number_format($totalMoneyCustomer - $totalOriginPrice) : 0 }}</td>
                            </tr>
                            <tr class="tr-hide" id="tr-detail-order-{{ $value->id }}">
                                <td colspan="15">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a data-toggle="tab">
                                                    <i class="green icon-reorder bigger-110"></i>
                                                    Danh sách đơn hàng
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <table class="table table-striped table-bordered table-hover dataTable">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="text-center">STT</th>
                                                        <th class="text-left hidden-768">Mã đơn hàng</th>
                                                        <th class="text-center">Ngày bán</th>
                                                        <th class="text-center">Thu ngân</th>
                                                        <th class="text-center ">Số lượng</th>
                                                        <th class="text-center ">Chiếc khấu</th>
                                                        <th class="text-center ">Doanh số</th>
                                                        <th class="text-center ">Tiền vốn</th>
                                                        <th class="text-center ">Lợi nhuận</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(!empty($value->orders) && count($value->orders) > 0)
                                                        @foreach($value->orders as $key => $value)
                                                        <tr>
                                                            <td class="text-center width-5 hidden-320 ">{{ $key + 1 }}</td>
                                                            <td class="text-center" style="color: #2a6496; cursor: pointer;">{{ $value->order_code }}</td>
                                                            <td class="text-center">{{ $value->sell_date ? $value->sell_date : '' }}</td>
                                                            <td class="text-center">{{ $value->user_practise ? $value->user_practise : '' }}</td>
                                                            <td class="text-center">{{ $value->total_quantity ? $value->total_quantity : 0 }}</td>
                                                            <td class="text-center">{{ $value->coupon ? number_format($value->coupon) : 0 }}</td>
                                                            <td class="text-center"
                                                                style="background-color: #F2F2F2;">{{ $value->total_money? number_format($value->total_money) : 0 }}</td>
                                                            <td class="text-center"
                                                                style="background: #fff;">{{ $value->total_origin_price ? number_format($value->total_origin_price) : 0 }}</td>
                                                            <td class="text-center"
                                                                style="background: #fff;">{{ $value->total_money && $value->total_origin_price ? number_format($value->total_money - $value->total_origin_price) : 0 }}</td>
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
                    <div class="pull-right ajax-pagination">
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
