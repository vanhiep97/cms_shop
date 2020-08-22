@extends('cms.layouts.app')
@section('content')
    <div class="customer-supplier">
        <div class="breadcrumbs-fixed panel-action">
            <div class="row">
                <div class="customer-act act">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="left-action text-left clearfix">
                            <h2>Khách hàng</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-space customer"></div>
        <div>
            <div class="cus-sear panel-sear">
                <div action="" class="">
                    {{-- <div class="form-group col-md-6 padd-0">
                        <input type="text" class="form-control txt-scustomer"
                               placeholder="Nhập tên, mã hoặc SDT khách hàng">
                    </div>
                    <div class="form-group col-md-6 ">
                        <div class="col-md-4 padd-0" style="margin-right: 10px;">
                            <select id="cus-option" class="form-control">
                                <option value="0">Tất cả</option>
                                <option value="1">KH từng mua hàng</option>
                                <option value="2">KH còn nợ</option>
                            </select>
                        </div>
                        <button type="button"
                                class="btn btn-primary btn-large btn-sCustomer"><i
                                class="fa fa-search"></i> Tìm kiếm
                        </button>
                    </div> --}}
                </div>
            </div>
            {{-- <button type="button" class="btn btn-danger" id="btn-send-notification">Send</button> --}}
            <div class="cus-body" id="data-customer">
                @include('cms.modules.customers.list-customer')
            </div>
        </div>
    </div>
@endsection
