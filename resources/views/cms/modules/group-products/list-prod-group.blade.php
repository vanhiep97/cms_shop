<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                  class="checkbox chkAll"><span
                    style="width: 15px; height: 15px;"></span></label></th>
        <th class="text-center">Tên nhóm</th>
        <th class="text-center">Slug</th>
        <th class="text-center">Mô tả</th>
        <th class="text-center">Trạng thái</th>
        <th>Chức năng</th>
    </tr>
    </thead>
    <tbody>
    @if($productGroups && count($productGroups) > 0)
        @foreach($productGroups as $key => $value)
            <tr id="pro-group_{{ $value->id }}">
                <td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox" id="pro-group"
                                                                                          data-ids="{{ $value->id }}"
                                                                                          value=""
                                                                                          class="checkbox chk"><span
                            style="width: 15px; height: 15px;"></span></label>
                </td>
                <td class="text-left"
                    style="color: #2a6496; cursor: pointer;">{{ $value->pro_group_name ? $value->pro_group_name : '' }}
                </td>
                <td class="text-center">{{ $value->pro_group_slug ? $value->pro_group_slug : '' }}</td>
                <td class="text-right"
                    style="font-weight: bold;">{{ $value->pro_group_description ? $value->pro_group_description : '' }}
                </td>
                <td>{!! $value->pro_group_status == 1 ? '<span class="badge badge-success">Actived</span>' : '<span class="badge badge-danger">Locked</span>' !!}</td>

                <td class="text-center">
                    <i title="Copy" class="fa fa-files-o blue"
                       style="margin-right: 5px;"></i>
                    <i title="Sửa" data-id="{{ $value->id }}" class="fa fa-edit" id="edit-pro-group"
                       style="margin-right: 5px; color: #C6699F; cursor: pointer;"></i>
                    <i class="fa fa-trash-o" data-id="{{ $value->id }}" id="btn-delete" style="color: darkred;"
                       title="Xóa"></i>
                    <i title="Ngừng kinh doanh" class="fa fa-pause"
                       style="margin-right: 5px; color: #C6699F; cursor: pointer;"></i>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: center">Data Not Found</td>
            <td></td>
            <td></td>
        </tr>
    @endif
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0">SL nhóm sản phẩm hiển thị/SL nhóm sản phẩm:
        <span>{{ count($productGroups) }}/{{ count($totalProGroups) }}</span></div>
    <div class="pull-right ajax-pagination">
        {{ $productGroups->links() }}
    </div>
</div>

