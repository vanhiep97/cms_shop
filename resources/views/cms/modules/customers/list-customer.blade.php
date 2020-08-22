<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                  class="checkbox chkAll"><span
                    style="width: 15px; height: 15px;"></span></label></th>
        <th class="text-center">Mã KH</th>
        <th class="text-center">Tên KH</th>
        <th class="text-center">Điện thoại</th>
        <th class="text-center">Email</th>
        <th class="text-center">Ngày sinh</th>
        <th class="text-center">Giới tính</th>
        <th class="text-center">Địa chỉ</th>
        <th class="text-center">Lần cuối mua hàng</th>
        <th>Chức năng</th>
    </tr>
    </thead>
    <tbody class="ajax-loadlist-customer">
    @if(!empty($customers) && count($customers) > 0)
        @foreach($customers as $key => $value)
            <tr id="customer_{{ $value->id }}">
                <td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                          id="customer_ids"
                                                                                          data-ids="{{ $value->id }}"
                                                                                          data-emails="{{ $value->customer_email }}"
                                                                                          value=""
                                                                                          class="checkbox chk"><span
                            style="width: 15px; height: 15px;"></span></label>
                </td>
                <td
                    class="text-center tr-detail-item"
                    style="cursor: pointer; color: #1b6aaa;">{{ $value->customer_code ? $value->customer_code : '' }}</td>
                <td
                    class="text-center tr-detail-item"
                    style="cursor: pointer; color: #1b6aaa;">{{ $value->customer_name ? $value->customer_name : '' }}</td>
                <td class="text-center">{{ $value->customer_phone ? $value->customer_phone : '' }}</td>
                <td class="text-center">{{ $value->customer_email ? $value->customer_email : '' }}</td>
                <td class="text-center">{{ $value->customer_birthday ? $value->customer_birthday : '' }}</td>
                <td class="text-center">
                    @if($value->customer_gender == 1)
                    {{ 'Nam' }}
                    @elseif($value->customer_gender == 0)
                    {{ 'Nữ' }}
                    @endif
                </td>
                <td class="text-center">{{ $value->customer_address ? $value->customer_address : '' }}</td>
                <td class="text-center">{{ $value->created_at ? $value->created_at : '' }}</td>
                <td class="text-center">
                    <i id="delete-customer" data-id="{{ $value->id }}" class="fa fa-trash-o" style="margin-right: 5px;cursor:pointer;"></i>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="ajax-loadlist-total sm-info pull-left padd-0">Số khách hàng:
        <span></span>
        Tổng tiền:
        <span> đ</span>
        Tổng nợ:
        <span> đ</span>
    </div>
    <div class="pull-right">
        {{ $customers->links() }}
    </div>
</div>
