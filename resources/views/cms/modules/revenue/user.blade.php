<div class="quick-info report row" style="margin-bottom: 15px;">
    <div class="col-md-12 padd-0">
        <div class="col-md-3 padd-right-0">
            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-clock-o cgreen" style="font-size: 45px;" aria-hidden="true"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title cgreen"
                        style="font-size: 25px;"></h3>
                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Số thu ngân / Số lượng SP</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 padd-right-0">
            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-tag blue" style="font-size: 45px;" aria-hidden="true"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title blue"
                        style="font-size: 25px;"></h3>
                    <span class="infobox-data-number text-center"
                          style="font-size: 14px; color: #555;">Chiếc khấu</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 padd-right-0">
            <div class="report-box " style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-refresh orange" style="font-size: 45px;"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title orange"
                        style="font-size: 25px;"></h3>
                    <span class="infobox-data-number text-center"
                          style="font-size: 14px; color: #555;">Doanh số</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 padd-right-0">
            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-clock-o cred" style="font-size: 45px;"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title cred"
                        style="font-size: 25px;"></h3>
                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Khách nợ</span>
                </div>
            </div>
        </div>
    </div>
</div>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Tên thu ngân</th>
        <th class="text-center">Tổng số đơn</th>
        <th class="text-center">Tổng chiếc khấu</th>
        <th class="text-center">Tổng tiền</th>
        <th class="text-center">Tổng SP</th>
        <th class="text-center">Tổng nợ</th>
    </tr>
    </thead>
    <tbody>
            <tr>
                <td style="text-align: center;">
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                                                   class="fa fa-plus-circle i-list-order">

                    </i>
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                       class="fa fa-minus-circle i-hide i-list-order">
                    </i>
                </td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
            <tr class="tr-hide" id="tr-list-order">
                <td colspan="15">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab">
                                    <i class="green icon-reorder bigger-110"></i>
                                    Danh sách đơn hàng
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <table class="table table-striped table-bordered table-hover dataTable">
                                    <thead>
                                    <tr role="row">
                                        <th class="text-center">STT</th>
                                        <th class="text-left hidden-768">Mã đơn hàng</th>
                                        <th class="text-left">Kho xuất</th>
                                        <th class="text-center">Ngày bán</th>
                                        <th class="text-center">Thu ngân</th>
                                        <th class="text-center ">Số lượng</th>
                                        <th class="text-center ">Chiếc khấu</th>
                                        <th class="text-center ">Tổng tiền</th>
                                        <th class="text-center ">Nợ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center width-5 hidden-320 "></td>
                                            <td class="text-center" style="color: #2a6496; cursor: pointer;"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"
                                                style="background-color: #F2F2F2;"></td>
                                            <td class="text-center"
                                                style="background: #fff;"></td>
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
    <div class="pull-right ajax-pagination">
        pagination
    </div>
</div>
