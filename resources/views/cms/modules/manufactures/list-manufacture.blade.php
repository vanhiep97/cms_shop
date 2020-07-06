<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                  class="checkbox chkAll"><span
                    style="width: 15px; height: 15px;"></span></label></th>
        <th class="text-center">Tên nhà sản xuất</th>
        <th class="text-center">Slug</th>
        <th class="text-center">Mô tả</th>
        <th class="text-center">Trạng thái</th>
        <th>Chức năng</th>
    </tr>
    </thead>
    <tbody>
    @if($manufactures && count($manufactures) > 0)
        @foreach($manufactures as $key => $value)
            <tr id="manufacture_{{ $value->id }}">
                <td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox" id="manufacture"
                                                                                          data-ids="{{ $value->id }}"
                                                                                          value=""
                                                                                          class="checkbox chk"><span
                            style="width: 15px; height: 15px;"></span></label>
                </td>
                <td class="text-left"
                    style="color: #2a6496; cursor: pointer;">{{ $value->manufacture_name ? $value->manufacture_name : '' }}
                </td>
                <td class="text-center">{{ $value->manufacture_slug ? $value->manufacture_slug : '' }}</td>
                <td class="text-right"
                    style="font-weight: bold;">{{ $value->manufacture_description ? $value->manufacture_description : '' }}
                </td>
                <td>{!! $value->manufacture_status == 1 ? '<span class="badge badge-success">Actived</span>' : '<span class="badge badge-danger">Locked</span>' !!}</td>

                <td class="text-center">
                    <i title="Copy" class="fa fa-files-o blue"
                       style="margin-right: 5px;"></i>
                    <i title="Sửa" data-id="{{ $value->id }}" class="fa fa-edit" id="edit-manufacture"
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
    <div class="sm-info pull-left padd-0">SL nhà sản xuất hiển thị/SL nhà sản xuất:
        <span>{{ count($manufactures) }}/{{ count($totalManufactures) }}</span></div>
    <div class="pull-right ajax-pagination">
        {{ $manufactures->links() }}
    </div>
</div>

