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
                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Khách nợ</span>
                </div>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">Mã sản phẩm</th>
        <th class="text-center">Tên sản phẩm</th>
        <th class="text-center">SL bán</th>
        <th class="text-center">Chiếc khấu</th>
        <th class="text-center">Tổng tiền</th>
    </tr>
    </thead>
    <tbody>
        @foreach($orders as $key => $value)
        @php
            $orderDetail = [];
            foreach(json_decode($value->order_detail) as $order) {
                $orderDetail['product_code'] = $order->product_code;
            }
            dd($value->order_detail);
        @endphp
        @foreach(json_decode($value->order_detail) as $order)
        <tr>
            <td class="text-center">{{ $order }}</td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
            <td class="text-center"></td>
        </tr>
        @endforeach
        @endforeach
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="pull-right ajax-pagination">
       pagination
    </div>
</div>
