@extends('cms.layouts.app')
@section('content')
    <div class="orders">
        <div class="breadcrumbs-fixed col-md-offset-2 panel-action padding-left-10">
            <h5 style="float: left;">
                <label style="color: #428bca;font-size: 23px;">Báo cáo lợi nhuận</label>
                <label style="color: #307ecc; padding-left: 10px;">
                    <input type="radio" name="profit" id="profit-all" value="1">
                    <span class="lbl">Theo đơn hàng</span>
                </label>
                <label style="color: #307ecc;">
                    <input type="radio" name="profit" id="profit-customer" value="2">
                    <span class="lbl">Theo khách hàng</span>
                </label>
                <label style="color: #307ecc;">
                    <input type="radio" name="profit" id="profit-sale" value="3">
                    <span class="lbl">Theo thu ngân</span>
                </label>
                <label style="color: #307ecc;">
                    <input type="radio" name="profit" id="profit-user" value="4" checked>
                    <span class="lbl">Theo NV bán hàng</span>
                </label>
                <label style="color: #307ecc;">
                    <input type="radio" name="profit" id="profit-product" value="5">
                    <span class="lbl">Theo hàng hóa</span>
                </label>
            </h5>
        </div>
        <div class="main-space orders-space"></div>
        <div class="orders-content">
            <div class="product-sear panel-sear">
                <div class="form-group col-md-12 padd-0" style="padding-left: 5px;">
                    <div class="col-md-10 padd-0">
                        <div class="col-md-9 padd-0">
                            <div class="col-md-3 padd-0">
                                <select id="search-option-1" class="form-control">
                                    <option value="-1">-Khách Hàng-</option>
                                    <option value="0">Không nhập</option>
                                    <option
                                        value="">aaa
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 padd-0">
                                <select id="search-option-2" class="form-control">
                                    <option value="-1">-Thu ngân-</option>
                                    <option value="">aaa</option>
                                </select>
                            </div>
                            <div class="col-md-3 padd-0">
                                <select id="search-option-4" class="form-control">
                                    <option value="-1">-NV bán hàng-</option>
                                    <option value="0">Không nhập</option>
                                    <option value="">aaa</option>
                                </select>
                            </div>
                            <div class="col-md-3 padd-0">
                                <select id="search-option-3" class="form-control">
                                    <option value="-1">-Cửa hàng-</option>
                                    <option
                                        value="">aaa
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 padd-0" style="padding-left: 5px;">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" id="search-date-from"
                                       placeholder="Từ ngày"
                                       name="start"/>
                                <span class="input-group-addon">to</span>
                                <input type="text" class="input-sm form-control" id="search-date-to"
                                       placeholder="Đến ngày"
                                       name="end"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 padd-0">
                        <div class="btn-group order-btn-calendar">
                            <button type="button" class="btn btn-default">Tuần</button>
                            <button type="button" class="btn btn-default">Tháng</button>
                            <button type="button" class="btn btn-default">Quý</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profit-main-body">
                <div class="quick-info report row" style="margin-bottom: 15px;">
                    <div class="col-md-12 padd-0">
                        <div class="col-md-3 padd-right-0">
                            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                                <div class="infobox-icon">
                                    <i class="fa fa-tag blue" style="font-size: 45px;" aria-hidden="true"></i>
                                </div>
                                <div class="infobox-data">
                                    @php
                                    if(!empty($orders) && count($orders) > 0) {
                                        $totalCoupon = 0;
                                        $totalMoney = 0;
                                        $totalOriginPrice = 0;
                                        $totalLack = 0;
                                        foreach ($orders as $key => $value) {
                                            $totalCoupon += $value->coupon;
                                            $totalMoney += $value->total_money;
                                            $totalOriginPrice += $value->total_origin_price;
                                            $totalLack += $value->lack;
                                        }
                                    }
                                    @endphp
                                    <h3 class="infobox-title blue"
                                        style="font-size: 25px;">{{ $totalCoupon ? number_format($totalCoupon) : 0 }}</h3>
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
                                        style="font-size: 25px;">{{ $totalMoney ? number_format($totalMoney) : 0 }}</h3>
                                    <span class="infobox-data-number text-center"
                                        style="font-size: 14px; color: #555;">Doanh số</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 padd-right-0">
                            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                                <div class="infobox-icon">
                                    <i class="fa fa-money cred" style="font-size: 45px;"></i>
                                </div>
                                <div class="infobox-data">
                                    <h3 class="infobox-title cred"
                                        style="font-size: 25px;">{{ $totalOriginPrice ? number_format($totalOriginPrice) : 0 }}</h3>
                                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Tiền vốn</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 padd-right-0">
                            <div class="report-box " style="border: 1px dotted #ddd; border-radius: 0">
                                <div class="infobox-icon">
                                    <i class="fa fa-dollar orange" style="font-size: 45px;"></i>
                                </div>
                                <div class="infobox-data">
                                    <h3 class="infobox-title orange"
                                        style="font-size: 25px;">{{ $totalMoney && $totalOriginPrice ? number_format($totalMoney - $totalOriginPrice) : 0 }}</h3>
                                    <span class="infobox-data-number text-center"
                                        style="font-size: 14px; color: #555;">Lợi nhuận</span>
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
                        <th class="text-center">Tổng SP</th>
                        <th class="text-center">Tổng chiếc khấu</th>
                        <th class="text-center">Tổng tiền</th>
                        <th class="text-center">Tiền vốn</th>
                        <th class="text-center">Lợi nhuận</th>
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
                                <td class="text-center"></td>
                            </tr>
                            <tr class="tr-hide" id="tr-list-order-">
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
                                                        <th class="text-center ">Doanh số</th>
                                                        <th class="text-center ">Tiền vốn</th>
                                                        <th class="text-center ">Lợi nhuận</th>
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
            </div>
        </div>
    </div>
@endsection
