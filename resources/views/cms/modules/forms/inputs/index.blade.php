@extends('cms.layouts.app')
@section('content')
@php
    $user = auth()->user()->level;
@endphp
    <div class="orders imports">
        <div class="breadcrumbs-fixed panel-action">
            <div class="row">
                <div class="orders-act">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="left-action text-left clearfix">
                            <h2>Danh sách phiếu nhập kho</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if($user === 0 || $user === 1 || $user === 2)
                        <div class="right-action text-right">
                            <div class="btn-groups">
                                <a href="{{ route('forms.createInput') }}" class="btn btn-primary"><i
                                        class="fa fa-plus"></i> Tạo phiếu nhập kho
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="main-space orders-space"></div>
        <div class="orders-content">
            <div class="product-sear panel-sear">
                <div class="form-group col-md-3 padd-0">
                    <input type="text" class="form-control" id="input-search-code"
                           placeholder="Nhập mã phiếu nhập để tìm kiếm">
                </div>
                <div class="form-group col-md-9 padd-0" style="padding-left: 5px;">
                    <div class="col-md-9 padd-0">
                        <div class="col-md-7 padd-0" style="padding-left: 5px;">
                            <div class="input-daterange input-group" id="datepicker">
                                <input id="datepicker1" type="text" class="input-sm form-control" placeholder="Từ ngày"
                                   name="start"/>
                                <span class="input-group-addon">to</span>
                                <input id="datepicker2" type="text" class="input-sm form-control" placeholder="Đến ngày"
                                    name="end"/>
                            </div>
                        </div>
                        <div class="col-md-5 padd-0" style="padding-left: 5px;">
                            <button style="box-shadow: none;" id="btn-search-input" type="button" class="btn btn-primary btn-large"><i
                                    class="fa fa-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                    {{-- <div class="col-md-3 padd-0" style="padding-left: 5px;">
                        <div class="btn-group order-btn-calendar">
                            <button type="button" class="btn btn-default">Tuần</button>
                            <button type="button" class="btn btn-default">Tháng</button>
                            <button type="button" class="btn btn-default">Quý</button>
                        </div>
                    </div> --}}
                </div>
            </div>
            @if($user === 0 || $user === 1 || $user === 2)
            <div class="delete-multi" style="margin-bottom: 10px">
                <button type="button" id="delete-multi-input" class="btn btn-danger btn-large btn-ssup"><i
                        class="fa fa-trash-o"></i> Xóa nhiều
                </button>
            </div>
            @endif
            <div class="imports-main-body" id="list-inputs">
                @include('cms.modules.forms.inputs.list-input')
            </div>
        </div>
    </div>
@endsection
