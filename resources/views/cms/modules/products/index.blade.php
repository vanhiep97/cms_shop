@extends('cms.layouts.app')
@section('content')
    <div class="products">
        <div class="breadcrumbs-fixed panel-action">
            <div class="row">
                <div class="products-act">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="left-action text-left clearfix">
                            <h2>Danh sách sản phẩm</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right-action text-right">
                            <div class="btn-groups">
                                <a href="{{ route('products.create') }}" class="btn btn-primary"><i
                                        class="fa fa-plus"></i> Tạo sản phẩm
                                </a>
                                <a href="{{ route('products.export') }}" class="btn btn-success"><i class="fa fa-download"></i> Xuất
                                    Excel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-space orders-space"></div>

        <div class="products-content">
            <div class="product-sear panel-sear">
                <div class="">
                    <div class="form-group col-md-5 padd-0">
                        <input type="text" class="form-control" placeholder="Nhập mã sản phẩm hoặc tên sản phẩm"
                               id="product-search">
                    </div>
                    <div class="form-group col-md-7 ">
                        <div class="col-md-3 padd-0" style="margin-right: 10px;">
                            <select class="form-control" id="search-option-1">
                                <option value="1">Đang kinh doanh</option>
                                <option value="2">Đã ngừng kinh doanh</option>
                                <option value="3">Đã xóa</option>
                            </select>
                        </div>
                        <div class="col-md-3 padd-0" style="margin-right: 10px;">
                            <select class="form-control search-option-2" id="prd_group_id">
                                <option value="-1" selected="selected">--Danh mục--</option>
                            </select>
                        </div>
                        <div class="col-md-3 padd-0" style="margin-right: 10px;">
                            <select class="form-control search-option-3" id="prd_manufacture_id">
                                <option value="-1" selected="selected">--Nhà sản xuất--</option>
                                <optgroup label="Chọn nhà sản xuất">

                                </optgroup>
                                <optgroup label="------------------------">
                                    <option value="product_manufacture" data-toggle="modal"
                                            data-target="#list-prd-manufacture">Tạo mới
                                        Nhà sản xuất
                                    </option>
                                </optgroup>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary btn-large btn-ssup"><i
                                class="fa fa-search"></i> Tìm kiếm
                        </button>
                    </div>
                </div>
            </div>
            <div class="delete-multi" style="margin-bottom: 10px">
                <button type="button" id="delete-multi" class="btn btn-danger btn-large btn-ssup"><i
                        class="fa fa-trash-o"></i> Xóa nhiều
                </button>
            </div>
            <div class="product-main-body" id="product-list">
                @include('cms.modules.products.list-product')
            </div>
        </div>
    </div>
@endsection

