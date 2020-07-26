@extends('cms.layouts.app')
@section('content')
<div class="orders">
    <div class="breadcrumbs-fixed panel-action">
        <div class="row">
            <div class="orders-act">
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-action text-left clearfix">
                        <h2>Danh sách đơn hàng</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-action text-right">
                        <div class="btn-groups">
                        <a href="{{ route('pos.index') }}" type="button" class="btn btn-primary"><i
                                    class="fa fa-desktop"></i> Bán hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-space orders-space"></div>
    <div class="orders-content">
        <div class="product-sear panel-sear">
            <div class="form-group col-md-4 padd-0">
                <input type="text" class="form-control" id="order-search"
                       placeholder="Nhập mã đơn hàng để tìm kiếm">
            </div>
            <div class="form-group col-md-8 padd-0" style="padding-left: 5px;">
                <div class="col-md-9 padd-0">
                    <div class="col-md-7 padd-0" style="padding-left: 5px;">
                        <div class="input-daterange input-group">
                            <input id="datepicker1" type="text" class="input-sm form-control" id="search-date-from" placeholder="Từ ngày"
                                   name="start"/>
                            <span class="input-group-addon">to</span>
                            <input id="datepicker2" type="text" class="input-sm form-control" id="search-date-to" placeholder="Đến ngày"
                                   name="end"/>
                        </div>
                    </div>
                    <div class="col-md-5 padd-0" style="padding-left: 5px;">
                        <button style="box-shadow: none;" type="button" class="btn btn-primary btn-large"><i class="fa fa-search"></i> Tìm kiếm
                        </button>
                    </div>
                </div>
                <div class="col-md-3 padd-0" style="padding-left: 5px;">
                    <div class="btn-group order-btn-calendar">
                        <button type="button" class="btn btn-default">Tuần</button>
                        <button type="button" class="btn btn-default">Tháng</button>
                        <button type="button" class="btn btn-default">Quý</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="delete-multi" style="margin-bottom: 10px">
            <button type="button" id="delete-multi-order" class="btn btn-danger btn-large btn-ssup"><i
                    class="fa fa-trash-o"></i> Xóa nhiều
            </button>
            <div class="col-md-3 padd-0" style="margin-right: 10px;">
                <select id="search-option-1" class="form-control">
                    <option value="0">Đơn hàng</option>
                    <option value="1">Đơn hàng đã xóa</option>
                    <option value="2">Đơn hàng còn nợ</option>
                </select>
            </div>
        </div>
        <div class="orders-main-body">
            @include('cms.modules.orders.list-orders')
        </div>
    </div>
</div>
@endsection
