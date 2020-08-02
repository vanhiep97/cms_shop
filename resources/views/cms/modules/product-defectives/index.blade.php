@extends('cms.layouts.app')
@section('content')
    <div class="inventory">
        <div class="inventory-content">
            <div class="product-sear panel-sear">
                <div>
                    <div class="form-group col-md-4 padd-0">
                        <input type="text" class="form-control txt-sinventory"
                               placeholder="Nhập tên hoặc mã sản phẩm để tìm kiếm">
                    </div>
                    <div class="form-group col-md-8 padd-0" style="padding-left: 5px;">
                        <div class="col-md-12 padd-0">
                            <div class="col-md-9 padd-0">
                                <div class="col-md-4 padd-0">
                                    <select class="form-control" id="prd_group_id">
                                        <option value="-1" selected='selected'>-- Danh mục --</option>
                                        <optgroup label="Chọn danh mục">
                                            <option
                                                value="">dfggf
                                            </option>
                                        </optgroup>
                                        <optgroup label="------------------------">
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-4 padd-0">
                                    <select class="form-control search-option-3" id="prd_manufacture_id">
                                        <option value="-1" selected="selected">--Nhà sản xuất--</option>
                                        <optgroup label="Chọn nhà sản xuất">
                                            <option
                                                value="">eerwrew
                                            </option>
                                        </optgroup>
                                        <optgroup label="------------------------">
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-4 padd-0">
                                    <select class="form-control" id="option_inventory">
                                        <option value="0">--Tất cả--</option>
                                        <option value="1" selected="selected">Chỉ lấy hàng tồn</option>
                                        <option value="2">Hết Hàng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 padd-0" style="padding-left: 5px;">
                                <button style="box-shadow: none;" type="button" class="btn btn-primary btn-large"><i
                                        class="fa fa-search"></i> Xem
                                </button>
                            </div>
                        </div>
                        <div class="col-md-1 padd-0" style="padding-left: 1px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="tonkho hien-thi-bang-ajax">
                <div class="inventory-main-body-public_templates_js_ajax_js">
                    @include('cms.modules.inventory.list-product');
                </div>
            </div><!-- end .tonkho -->

        </div>
    </div>
@endsection
