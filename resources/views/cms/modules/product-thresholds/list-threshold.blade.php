<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">STT</th>
        <th class="text-center">Mã hàng</th>
        <th class="text-center">Tên sản phẩm</th>
        <th class="text-center">SL</th>
        <th class="text-center">Vốn</th>
        <th class="text-center">Giá</th>
    </tr>
    </thead>
    <tbody>
        @if(!empty($products) && count($products) > 0)
        @foreach($products as $key => $value)
        <tr>
            <td class="text-center">{{ $key + 1 }}</td>
            <td
                style="color: #2a6496; cursor: pointer;">{{ $value->product_code }}</td>
            <td class="text-center">{{ $value->product_name }}</td>
            <td class="text-center">{{ $value->product_amount ? $value->product_amount : 0 }}</td>
            <td class="text-center">{{ number_format($value->product_origin_price * $value->product_amount)  }}</td>
            <td class="text-center">{{ number_format($value->product_sell_price * $value->product_amount)  }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0"></div>
    <div class="pull-right ajax-pagination codefly.vn_pagination_link">
        {{ $products->links() }}
    </div>
</div>
