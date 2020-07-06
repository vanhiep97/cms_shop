<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-left">Tên danh mục</th>
        <th style="width: 80px;"></th>
    </tr>
    </thead>
    <tbody>
    @if ($prodGroup ?? '' && count($prodGroup ?? '') > 0)
        @foreach ($prodGroup ?? '' as $key => $item)
            <tr class='tr-item-{{ $item->id  }}'>
                <td class="text-edit">{{  $item->pro_group_name }}</td>
                <td class="text-center"><i class="fa fa-pencil-square-o edit-item" title="Sửa"
                                           onclick="cms_edit_prd('group', {{ $item->id }})"
                                           style="margin-right: 10px; cursor: pointer;"></i><i title="Xóa"
                        class="fa fa-trash-o delete-item" style="cursor: pointer;"></i></td>
            </tr>
            <tr class='edit-tr-item' style='display: none;'>
                <td class="text-edit"><input type="text"
                                             class="form-control edit_prd_group_name"
                                             value="">
                </td>
                <td class="text-center"><i class='fa fa-floppy-o' title='Lưu'
                                           style='color: #EC971F; cursor: pointer; margin-right: 10px;'></i><i title='Hủy' class='fa fa-undo'
                        style='color: green; cursor: pointer; margin-right: 5px;'></i></td>
            </tr>
        @endforeach;
    @else
        <tr>
            <td colspan="2" class="text-center">Không có dữ liệu</td>
        </tr>
    @endif
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert"
     style="background: #fff; margin-bottom: 0; border: none;">
    <div class="pull-right ajax-pagination">
        paginate
    </div>
</div>
