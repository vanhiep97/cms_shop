<table class="table table-bordered">
    <thead>
    <tr>
        <th class="text-center">Mã NCC</th>
        <th class="text-center">Tên NCC</th>
        <th class="text-center">Email</th>
        <th class="text-center">Điện thoại</th>
        <th class="text-center">Địa chỉ</th>
        <th class="text-center">ATM</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($suppliers) && count($suppliers) > 0)
        @foreach($suppliers as $key => $value)
            <tr>
                <td class="text-center"
                    style="cursor: pointer; color: #1b6aaa;">{{ $value->supplier_code ? $value->supplier_code : '' }}</td>
                <td class="text-center"
                    style="cursor: pointer; color: #1b6aaa;">{{ $value->supplier_name ? $value->supplier_name : '' }}</td>
                <td class="text-center">{{ $value->supplier_email ? $value->supplier_email : '' }}</td>
                <td class="text-left">{{ $value->supplier_phone ? $value->supplier_phone : '' }}</td>
                <td class="text-center">{{ $value->address ? $value->address : '' }}</td>
                <td class="text-center">{{ $value->ATM ? $value->ATM : '' }}</td>
                <td class="text-center">
                    <i class="fa fa-edit" id="edit-supplier" data-id="{{ $value->id }}" style="cursor:pointer;"></i>
                    <i class="fa fa-trash-o" id="delete-supplier" data-id="{{ $value->id }}" style="cursor:pointer;"></i>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0">
        Số NCC:<span></span>
        Tổng tiền: <span> đ</span>
        Tổng nợ: <span> đ</span>
    </div>
    <div class="pull-right ajax-pagination">
        {{ $suppliers->links() }}
    </div>
</div>
