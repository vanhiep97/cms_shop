<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Mã phiếu nhập</th>
        <th class="text-center">Kho nhập</th>
        <th class="text-center">Tình trạng</th>
        <th class="text-center">Ngày nhập</th>
        <th class="text-center">Người nhập</th>
        <th class="text-center" style="background-color: #fff;">Tổng tiền</th>
        <th class="text-center"><i class="fa fa-clock-o"></i> Nợ</th>
        <th></th>
        <th class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                  class="checkbox chkAll"><span
                    style="width: 15px; height: 15px;"></span></label></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="text-align: center;">
            <i style="color: #478fca!important;" title="Chi tiết phiếu nhập"
               class="fa fa-plus-circle i-detail-input-">
            </i>
            <i style="color: #478fca!important;" title="Chi tiết phiếu nhập"
               class="fa fa-minus-circle i-hide i-detail-input-">

            </i>
        </td>
        <td class="text-center" style="color: #2a6496; cursor: pointer;"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"></td>
        <td class="text-center"
            style="background-color: #F2F2F2;"></td>
        <td class="text-center" style="background: #fff;"></td>
        <td class="text-center" style="background: #fff;">
            <i title="In"
               class="fa fa-print blue"
               style="margin-right: 5px;"></i>
            <i class="fa fa-trash-o" style="color: darkred;" title=""></i></td>
        <td class="text-center"><label class="checkbox" style="margin: 0;"><input type="checkbox"
                                                                                  value=""
                                                                                  class="checkbox chk"><span
                    style="width: 15px; height: 15px;"></span></label>
    </tr>
    <tr class="tr-hide" id="tr-detail-input-">
        <td colspan="15">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab">
                            <i class="green icon-reorder bigger-110"></i>
                            Chi tiết phiếu nhập
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="alert alert-success clearfix" style="display: flex;">
                            <div>
                                <i class="fa fa-cart-arrow-down">
                                </i>
                                <span
                                    class="hidden-768">Số lượng SP:
                                        </span>
                                <label>
                                </label>
                            </div>
                            <div class="padding-left-10">
                                <i class="fa fa-dollar">
                                </i>
                                <span
                                    class="hidden-768">Tiền hàng:
                                        </span>
                                <label>
                                </label>
                            </div>
                            <div class="padding-left-10">
                                <i class="fa fa-dollar">
                                </i>
                                <span
                                    class="hidden-768">Giảm giá:
                                        </span>
                                <label>
                                </label>
                            </div>
                            <div class="padding-left-10">
                                <i class="fa fa-dollar">
                                </i>
                                <span
                                    class="hidden-768">Tổng tiền:
                                        </span>
                                <label>
                                </label>
                            </div>
                            <div class="padding-left-10">
                                <i class="fa fa-clock-o"></i>
                                <span class="hidden-768">Còn nợ: </span>
                                <label
                                >
                                </label>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover dataTable">
                            <thead>
                            <tr role="row">
                                <th class="text-center">STT</th>
                                <th class="text-left hidden-768">Mã sản phẩm</th>
                                <th class="text-left">Tên sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Giá nhập</th>
                                <th class="text-center ">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center width-5 hidden-320 ">

                                </td>
                                <td class="text-left hidden-768">

                                </td>
                                <td class="text-left ">

                                </td>
                                <td class="text-center ">

                                </td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0">
        Tổng số phiếu nhập:
        <span></span>
        Tổng tiền:
        <span></span>
        Tổng nợ:
        <span></span>
    </div>
    <div class="pull-right ajax-pagination">
        pagination
    </div>
</div>

