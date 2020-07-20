<div class="quick-info report row" style="margin-bottom: 15px;">
    <div class="col-md-12 padd-0">
        <div class="col-md-3 padd-right-0">
            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-clock-o cgreen" style="font-size: 45px;" aria-hidden="true"></i>
                </div>
                <div class="infobox-data">
                    @php

                    @endphp
                    <h3 class="infobox-title cgreen"
                        style="font-size: 25px;"></h3>
                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Số đơn / Số lượng SP</span>
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
        <th class="text-center">Mã đơn hàng</th>
        <th class="text-center">Kho xuất</th>
        <th class="text-center">Ngày bán</th>
        <th class="text-center">Thu ngân</th>
        <th class="text-center">Khách hàng</th>
        <th class="text-center">Số lượng</th>
        <th class="text-center">Chiếc khấu</th>
        <th class="text-center" style="background-color: #fff;">Tổng tiền</th>
        <th class="text-center"><i class="fa fa-clock-o"></i> Nợ</th>
    </tr>
    </thead>
    <tbody>
        <tr>
                <td style="text-align: center;">
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                                                   class="fa fa-plus-circle i-detail-order">
                    </i>
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                       class="fa fa-minus-circle i-hide i-detail-order">

                    </i>
                </td>
                <td class="text-center" style="color: #2a6496; cursor: pointer;"></td>
                <td class="text-center"></td>
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
            <tr class="tr-hide">
                <td colspan="15">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab">
                                    <i class="green icon-reorder bigger-110"></i>
                                    Chi tiết đơn hàng
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
                                        <label>

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
                                        <th class="text-center">Giá bán</th>
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
    <div class="pull-right ajax-pagination">
        panigation
    </div>
</div>
