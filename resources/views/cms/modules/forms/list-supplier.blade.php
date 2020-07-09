@if(!empty($suppliers) && count($suppliers) > 0)
    <ul style="margin: 0;padding: 5px;border: 1px solid #ccc;border-top: none;height: 150px; overflow-y: scroll;">
        @foreach($suppliers as $supplier)
            <li style="list-style: none;padding: 0 5px" id="supplier-on-import" data-id="{{ $supplier->id }}" data-code="{{ $supplier->supplier_code }}" data-name="{{ $supplier->supplier_name }}">
                <a href="javascript:void(0)" style="color: #0f0f6f;font-size: 13px;">{{ $supplier->supplier_code }} - {{ $supplier->supplier_name }} - {{ $supplier->supplier_phone }}</a>
            </li>
        @endforeach
    </ul>
@endif
