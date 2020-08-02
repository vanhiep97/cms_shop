<div class="quick-info report row" style="margin-bottom: 15px;">
    <div class="col-md-12 padd-0">
        <div class="col-md-3 padd-right-0">
            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-clock-o cgreen" style="font-size: 45px;" aria-hidden="true"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title cgreen"
                        style="font-size: 25px;">{{ gmdate("d/m/Y", time() + 7 * 3600) }}</h3>
                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Ngày lập</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 padd-right-0">
            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-tag blue" style="font-size: 45px;" aria-hidden="true"></i>
                </div>
                <div class="infobox-data">
                    @php
                        $totalInventory = 0;
                        $totalOriginPrice = 0;
                        $totalSellPrice = 0;
                        foreach($inventories as $key => $value) {
                            $totalInventory += $value->quantity;
                            $totalOriginPrice += ($value->product->product_origin_price * $value->quantity);
                            $totalSellPrice += ($value->product->product_sell_price * $value->quantity);
                        }
                    @endphp
                    <h3 class="infobox-title blue"
                        style="font-size: 25px;">{{ $totalInventory ? $totalInventory : 0 }}</h3>
                    <span class="infobox-data-number text-center"
                          style="font-size: 14px; color: #555;">SL tồn kho</span>
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
                        style="font-size: 25px;">{{ $totalOriginPrice ? number_format($totalOriginPrice) : 0 }}
                    <span class="infobox-data-number text-center"
                          style="font-size: 14px; color: #555;">Tổng vốn tồn kho</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 padd-right-0">
            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-shopping-cart cred" style="font-size: 45px;"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title cred"
                        style="font-size: 25px;">{{ $totalSellPrice ? number_format($totalSellPrice) : 0 }}</h3>
                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Tổng giá trị tồn kho</span>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">STT</th>
        <th class="text-center">Mã hàng</th>
        <th class="text-center">Tên sản phẩm</th>
        <th class="text-center">SL</th>
        <th class="text-center">Vốn tồn kho</th>
        <th class="text-center">Giá trị tồn</th>
    </tr>
    </thead>
    <tbody>
        @if(!empty($inventories) && count($inventories) > 0)
        @foreach($inventories as $key => $value)
        <tr>
            <td class="text-center">{{ $key + 1 }}</td>
            <td
                style="color: #2a6496; cursor: pointer;">{{ $value->product->product_code }}</td>
            <td class="text-center">{{ $value->product->product_name }}</td>
            <td class="text-center">{{ $value->quantity ? $value->quantity : 0 }}</td>
            <td class="text-center">{{ number_format($value->product->product_origin_price * $value->quantity)  }}</td>
            <td class="text-center">{{ number_format($value->product->product_sell_price * $value->quantity)  }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0"></div>
    <div class="pull-right ajax-pagination codefly.vn_pagination_link">
        {{ $inventories->links() }}
    </div>
</div>
