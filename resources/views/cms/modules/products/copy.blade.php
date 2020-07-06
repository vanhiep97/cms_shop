@extends('cms.layouts.app')
@section('content')
    <div class="products">
        <form id="form-product">
            <div class="breadcrumbs-fixed panel-action">
                <div class="row">
                    <div class="products-act">
                        <div class="col-md-4 col-md-offset-2">
                            <div class="left-action text-left clearfix">
                                <h2><i class="fa fa-refresh fa-fw" style="font-size: 14px; cursor: pointer;"></i> Tạo
                                    sản
                                    phẩm</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right-action text-right">
                                <div class="btn-groups">
                                    <button type="submit" id="btn-save" class="btn btn-primary"><i
                                            class="fa fa-check"></i> Lưu
                                    </button>
                                    <button type="submit" id="btn-save-continue" class="btn btn-primary"><i
                                            class="fa fa-floppy-o"></i> Lưu
                                        và tiếp tục
                                    </button>
                                    <a href="{{ URL::previous() }}" class="btn btn-default"><i
                                            class="fa fa-arrow-left"></i> Trở về
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-space customer"></div>
            <div class="products-content" style="margin-bottom: 25px;">
                <div class="basic-info">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4 padd-0">
                                <h4>Thông tin cơ bản</h4>
                                <small>Nhập tên và các thông tin cơ bản của sản phẩm</small>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="form-group clearfix">
                                        <div class="col-md-12 padd-left-0 padd-right-0">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" name="product_name" value="{{ old('product_name', $product->product_name.'(copy)') }}" id="product_name"
                                                   class="form-control"
                                                   placeholder="Nhập tên sản phẩm"/>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-6 padd-left-0">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" name="product_code" value="{{ old('product_code', $product->product_code.'(copy)') }}" id="product_code" class="form-control "
                                                   placeholder="Nếu không nhập, hệ thống sẽ tự sinh."/>
                                        </div>
                                        <div class="col-md-6 padd-right-0">
                                            <label>Số lượng</label>
                                            <input type="text" name="product_amount" value="{{ old('product_amount', $product->product_amount) }}" id="product_amount" placeholder="0"
                                                   class="form-control text-right txtNumber"/>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-6 padd-left-0">
                                            <label>Giá vốn</label>
                                            <input type="text" name="product_origin_price" value="{{ old('product_origin_price', $product->product_origin_price) }}" id="product_origin_price"
                                                   class="form-control text-right" placeholder="Nhập giá vốn"/>
                                        </div>
                                        <div class="col-md-6 padd-right-0">
                                            <label>Giá bán</label>
                                            <input type="text" name="product_sell_price" value="{{ old('product_sell_price', $product->product_sell_price) }}" id="product_sell_price"
                                                   class="form-control text-right" placeholder="Nhập giá bán"/>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-6 padd-left-0">
                                            <label>Danh mục</label>
                                            <div class="col-md-11 padd-0">
                                                <select class="form-control" name="product_group_id" id="product_group_id">
                                                    <optgroup label="Chọn danh mục">
                                                        {{ CustomHelpers::menu($prodGroup, '', '', $product->product_group_id) }}
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="col-md-1 padd-0">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#list-prd-group"
                                                        style="border-radius: 0 3px 3px 0; box-shadow: none;">...
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 padd-right-0">
                                            <label>Nhà sản xuất</label>
                                            <div class="col-md-11 padd-0">
                                                <select class="form-control" name="product_manufacture_id" value="{{ old('product_manufacture_id', $product->product_manufacture_id) }}" id="product_manufacture_id">
                                                    <optgroup label="Chọn nhà sản xuất">
                                                        @if($manufactures && count($manufactures) > 0)
                                                            @foreach($manufactures as $key => $value)
                                                                <option
                                                                    value="{{ $value->id }}" {{ $value->id == $product->product_manufacture_id ? 'selected' : '' }}>{{ $value->manufacture_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="col-md-1 padd-0">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#list-prd-manufacture"
                                                        style="border-radius: 0 3px 3px 0; box-shadow: none;">...
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 padd-20">
                            <div class="jumbotron text-center" id="img_upload"
                                 style="border-radius: 0; margin-bottom: 10px; padding: 15px 20px;">
                                <h3>Upload hình ảnh sản phẩm</h3>
                                <small style="font-size: 14px; margin-bottom: 5px; display: inline-block;">(Để
                                    tải và hiện thị nhanh, mỗi ảnh lên có dung lượng 500KB. Tải tối đa 10MB.)
                                </small>
                                <input type="hidden" name="product_image_url" value="{{ old('product_image_url', $product->product_image_url) }}" id="thumbnail"/>
                                <div id="avatar" style="border: 2px dashed #ccc;height: 255px;width: 100%;position: relative;">
                                    <img src="{{ $product->product_image_url ? $product->product_image_url : '' }}"/>
                                    <p style="margin-bottom: 5px;position: absolute;left: 48%;top: 40%;border: 2px solid #ccc;">
                                        <button id="lfm" data-input="thumbnail" data-preview="avatar" class="btn" style="background-color: #337ab7; "><i
                                                class="fa fa-picture-o" style="font-size: 40px;color: #fff; "></i>
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="expand-info">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="border-bottom: 1px solid #0B87C9; padding-bottom: 10px;"><i
                                    class="fa fa-th-large blue"></i> <a style="color: #0B87C9; text-decoration: none;"
                                                                        data-toggle="collapse"
                                                                        href="#collapseproductinfo"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseExample">Thông
                                    tin mở rộng(
                                    <small> Nhấn để thêm các thông tin cho thuộc tính web</small>
                                    )</a></h4>
                        </div>
                        <div class="col-md-12">
                            <div style="margin-top: 5px;"></div>
                            <div class="collapse" id="collapseproductinfo">
                                <div class="col-md-12 padd-20">
                                    <h4 style="margin-top: 0;">Mô tả
                                        <small style="font-style: italic;">(Nhập thông tin mô tả chi tiết hơn để khách
                                            hàng hiểu hàng hoá của bạn)
                                        </small>
                                    </h4>
                                    <textarea name="product_description" id="product_description">{{ old('product_description', $product->product_description) }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <div class="btn-groups pull-right" style="margin-top: 15px;">
                                        <button id="btn-save" type="submit" value="update-product" data-id="{{ $product->id }}" class="btn btn-primary">
                                            <i
                                                class="fa fa-check"></i> Lưu
                                        </button>
                                        <button id="btn-save-continue" type="submit" value="update-product" data-id="{{ $product->id }}" class="btn btn-primary "><i
                                                class="fa fa-floppy-o"></i>
                                            Lưu và tiếp tục
                                        </button>
                                        <a href="{{ URL::previous() }}" class="btn btn-default"><i
                                                class="fa fa-arrow-left"></i> Trở về
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
