@if(!empty($customers) && count($customers) > 0)
    <ul style="margin: 0;padding: 5px;border: 1px solid #ccc;border-top: none;height: 150px; overflow-y: scroll;">
        @foreach($customers as $customer)
            <li style="list-style: none;padding: 0 5px" id="customer-on-pos" data-id="{{ $customer->id }}" data-code="{{ $customer->customer_code }}" data-name="{{ $customer->customer_name }}">
                <a href="javascript:void(0)" style="color: #0f0f6f;font-size: 13px;">{{ $customer->customer_code }} - {{ $customer->customer_name }} - {{ $customer->customer_phone }}</a>
            </li>
        @endforeach
    </ul>
@endif
