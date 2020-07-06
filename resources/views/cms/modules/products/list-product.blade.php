<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                  class="checkbox chkAll"><span
                    style="width: 15px; height: 15px;"></span></label></th>
        <th class="text-center">Hình ảnh</th>
        <th class="text-center">Mã sản phẩm</th>
        <th class="text-center">Tên sản phẩm</th>
        <th class="text-center">Số lượng</th>
        <th class="text-center" style="background-color: #fff;">Giá bán</th>
        <th class="text-center">Danh mục</th>
        <th class="text-center">Nhà sản xuất</th>
        <th class="text-center">Trạng thái</th>
        <th>Chức năng</th>
    </tr>
    </thead>
    <tbody>
    @if($products && count($products) > 0)
        @foreach($products as $key => $value)
            <tr id="product_{{ $value->id }}">
                <td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                          id="product_ids"
                                                                                          data-ids="{{ $value->id }}"
                                                                                          value=""
                                                                                          class="checkbox chk"><span
                            style="width: 15px; height: 15px;"></span></label>
                </td>
                <td class="text-center">
                    <img src="{{ $value->product_image_url ? $value->product_image_url : '' }}"
                         alt="{{ $value->product_name ? $value->product_name : '' }}" width="50" height="50"/>
                </td>
                <td class="text-center">{{ $value->product_code ? $value->product_code : '' }}</td>
                <td class="text-left prd_name"
                    style="color: #2a6496; cursor: pointer;">{{ $value->product_name ? $value->product_name : '' }}
                </td>
                <td class="text-center">{{ $value->product_amount ? $value->product_amount : '' }}</td>
                <td class="text-right"
                    style="font-weight: bold;">{{ $value->product_sell_price ? $value->product_sell_price : '' }}
                </td>
                <td>{{ $value->product_group_id ? $value->productGroup->pro_group_name : '' }}</td>
                <td>{{ $value->product_manufacture_id ? $value->manufacture->manufacture_name : '' }}</td>
                <td>{!! $value->product_status == 1 ? '<span class="badge badge-success">Đang kinh doanh</span>' : '<span class="badge badge-danger">Ngừng kinh doanh</span>' !!}</td>

                <td class="text-center">
                    <a href="{{ route('products.copy', ['id' => $value->id]) }}">
                        <i title="Copy" class="fa fa-files-o blue"
                           style="margin-right: 5px; color: #C6699F; cursor: pointer;"></i>
                    </a>
                    <a href="{{ route('products.edit', ['id' => $value->id]) }}"><i title="Sửa" class="fa fa-edit"
                                                                                    style="margin-right: 5px; color: #C6699F; cursor: pointer;"></i></a>
                    <i class="fa fa-trash-o" style="color: darkred;" id="delete-product" data-id="{{ $value->id }}"
                       title="Xóa"></i>
                    <i title="Ngừng kinh doanh" id="change-status-product" data-id="{{ $value->id }}" class="fa fa-pause"
                       style="margin-right: 5px; color: #C6699F; cursor: pointer;"></i>
                </td>
            </tr>
        @endforeach
    @else
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: center">Data Not Found</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    @endif
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0">SL sản phẩm hiển thị/SL sản phẩm:
        <span>{{ count($products) }}/{{ count($totalProducts) }}</span></div>
    <div class="pull-right ajax-pagination">
        {{ $products->links() }}
    </div>
</div>

