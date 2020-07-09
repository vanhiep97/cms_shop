@if(!empty($products) && count($products) > 0)
    <ul style="margin: 0;padding: 5px;border: 1px solid #ccc;border-top: none;height: 160px; overflow-y: scroll;">
        @foreach($products as $product)
            <li style="list-style: none;padding: 0 5px" id="product-on-pos" data-id="{{ $product->id }}">
                <a href="javascript:void(0)" style="color: #0f0f6f;font-size: 15px;">{{ $product->product_code }} - {{ $product->product_name }} - {{ $product->product_origin_price }} VND</a>
            </li>
        @endforeach
    </ul>
@endif
