@extends('cms.layouts.app')
@section('content')
    <div class="orders">
        <div class="breadcrumbs-fixed col-md-offset-2 panel-action padding-left-10">
            <h5 style="float: left;">
                <label style="color: #428bca;font-size: 23px;">Báo cáo doanh thu</label>
                <label style="color: #307ecc; padding-left: 10px;">
                    <input type="radio" name="revenue" id="revenue-all" value="1">
                    <span class="lbl">Báo cáo tổng hợp</span>
                </label>
                <label style="color: #307ecc;">
                    <input type="radio" name="revenue" id="revenue-customer" value="2">
                    <span class="lbl">Theo khách hàng</span>
                </label>
                <label style="color: #307ecc;">
                    <input type="radio" name="revenue" id="revenue-sale" value="3">
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
            <div class="revenue-main-body">
                 @if(!empty($orders) && count($orders) > 0)
                <div class="quick-info report row" style="margin-bottom: 15px;">
                    <div class="col-md-12 padd-0">
                        <div class="col-md-3 padd-right-0">
                            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                                <div class="infobox-icon">
                                    <i class="fa fa-clock-o cgreen" style="font-size: 45px;" aria-hidden="true"></i>
                                </div>
                                <div class="infobox-data">
                                    @php
                                    if(!empty($orders) && count($orders) > 0) {
                                        $totalProductOnOrder = 0;
                                        $totalCoupon = 0;
                                        $totalMoney = 0;
                                        $totalLack = 0;
                                        foreach ($orders as $key => $value) {
                                            $totalProductOnOrder += $value->total_quantity;
                                            $totalCoupon += $value->coupon;
                                            $totalMoney += $value->total_money;
                                            $totalLack += $value->lack;
                                        }
                                    }
                                    @endphp
                                    <h3 class="infobox-title cgreen"
                                        style="font-size: 25px;">{{ ($orders ? count($orders) : 0). '/' .($totalProductOnOrder ? $totalProductOnOrder : 0)}}</h3>
                                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Đơn hàng / Số lượng SP</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 padd-right-0">
                            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                                <div class="infobox-icon">
                                    <i class="fa fa-tag blue" style="font-size: 45px;" aria-hidden="true"></i>
                                </div>
                                <div class="infobox-data">
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
                                    <i class="fa fa-clock-o cred" style="font-size: 45px;"></i>
                                </div>
                                <div class="infobox-data">
                                    <h3 class="infobox-title cred"
                                        style="font-size: 25px;">{{ $totalLack ? number_format($totalLack) : 0 }}</h3>
                                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Hoàn trả khách</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Mã sản phẩm</th>
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">SL bán</th>
                        <th class="text-center">Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $orderDetail = [];
                            foreach($orders as $key => $value) {
                                array_push($orderDetail, json_decode($value->order_detail));
                            }
                        @endphp
                        @foreach($orderDetail as $order)
                        @foreach($order as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $item->product_code }}</td>
                            <td class="text-center">{{ $item->product_name }}</td>
                            <td class="text-center">{{ $item->product_amount }}</td>
                            <td class="text-center">{{ number_format($item->product_amount * $item->product_sell_price) }}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
                <div class="alert alert-info summany-info clearfix" role="alert">
                    <div class="pull-right ajax-pagination">
                    {{ $orderByEmp->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
