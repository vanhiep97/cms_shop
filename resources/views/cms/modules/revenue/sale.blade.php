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
                        style="font-size: 25px;">{{ $numberSale .'/' .($totalProductOnOrder ? $totalProductOnOrder : 0)}}</h3>
                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">NV bán hàng / Số lượng SP</span>
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
                        style="font-size: 25px;"></h3>
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
                        style="font-size: 25px;"></h3>
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
                        style="font-size: 25px;"></h3>
                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Khách nợ</span>
                </div>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Tên NV bán hàng</th>
        <th class="text-center">Tổng số đơn</th>
        <th class="text-center">Tổng chiếc khấu</th>
        <th class="text-center">Tổng SP</th>
        <th class="text-center">Tổng tiền</th>
        <th class="text-center">Tổng nợ</th>
    </tr>
    </thead>
    <tbody>
        @if(!empty($orderByEmp) && count($orderByEmp) > 0)
        @foreach($orderByEmp as $key => $value)
            <tr>
                <td style="text-align: center;">
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                       class="fa fa-plus-circle i-detail-order-{{ $key }}"
                       onclick="cms_show_detail_order({{ $key }})">
                    </i>
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                       class="fa fa-minus-circle i-hide i-detail-order-{{ $key }}"
                       onclick="cms_show_detail_order({{ $key }})">
                    </i>
                </td>
                <td class="text-center">{{ $value['employee']->user_practise }}</td>
                <td class="text-center">{{ $value['employee']->total_order ? $value['employee']->total_order : 0 }}</td>
                <td class="text-center">{{ $value['employee']->total_coupon ? $value['employee']->total_coupon : 0 }}</td>
                <td class="text-center">{{ $value['employee']->total_quantity ? $value['employee']->total_quantity : 0 }}</td>
                <td class="text-center">{{ $value['employee']->total_money ? number_format($value['employee']->total_money) : 0 }}</td>
                <td class="text-center">{{ $value['employee']->total_lack ? number_format($value['employee']->total_lack) : 0 }}</td>
            </tr>
            <tr class="tr-hide" id="tr-detail-order-{{ $key }}">
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
                                        <th class="text-center ">Tổng tiền</th>
                                        <th class="text-center ">Nợ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($value['orderByEmp'] as $key => $item)
                                        <tr>
                                            <td class="text-center width-5 hidden-320 ">{{ $key + 1 }}</td>
                                            <td class="text-center" style="color: #2a6496; cursor: pointer;">{{ $item['order_code'] }}</td>
                                            <td class="text-center">{{ $item['sell_date'] }}</td>
                                            <td class="text-center">{{ $item['user_practise'] }}</td>
                                            <td class="text-center">{{ $item['total_quantity'] ? $item['total_quantity'] : 0 }}</td>
                                            <td class="text-center">{{ $item['coupon'] ? number_format($item['coupon']) : 0 }}</td>
                                            <td class="text-center"
                                                style="background-color: #F2F2F2;">{{ $item['total_money'] ? number_format($item['total_money']) : 0 }}</td>
                                            <td class="text-center"
                                                style="background: #fff;">{{ $item['lack'] ? number_format($item['lack']) : 0 }}</td>
                                        </tr>
                                        @endforeach
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
       pagination
    </div>
</div>
