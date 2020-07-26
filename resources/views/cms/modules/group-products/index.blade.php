@extends('cms.layouts.app')
@section('content')
    <div class="products">
        <div class="breadcrumbs-fixed panel-action">
            <div class="row">
                <div class="products-act">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="left-action text-left clearfix">
                            <h2>Nhóm sản phẩm</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-space orders-space"></div>
        <div class="products-content" style="display: flex; justify-content: space-between;">
            <div class="product-create" style="width: 40%;margin-right: 40px;background-color: #fff;margin-top: 10px;">
                <div class="card">
                    <div class="card-header" style="background-color: #f2f2f2;padding: 8px 15px;margin-bottom: 20px;border: 1px solid #ddd;font-weight: 600;">
                        Thêm nhóm sản phẩm
                    </div>
                    <div class="card-body">
                        <div class="row form-horizontal">
                            <div class="col-md-12">
                                <form id="product-group">
                                    <div class="form-group">
                                        <div class="col-md-4 text-right">
                                            <label>Danh mục cấp cha</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="pro_group_parent_id" id="pro_group_parent_id" class="form-control">
                                                <option value="0">-- Chọn danh mục cha</option>
                                                {{ CustomHelpers::menu($totalProGroups) }}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4 text-right">
                                            <label>Tên danh mục</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="pro_group_name" id="pro_group_name" class="form-control"
                                                   placeholder="Nhập tên danh mục.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4 text-right">
                                            <label>Mô tả</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea style="padding-left: 10px" name="pro_group_description" id="pro_group_description" cols="45" rows="5" placeholder="Mô tả"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" id="btn-save" class="btn btn-primary"
                                                    style="border-radius: 0 3px 3px 0;"><i
                                                    class="fa fa-floppy-o"></i> Lưu
                                            </button>
                                            <button type="reset" class="btn btn-primary"><i class="fa fa-close"></i> Hủy bỏ
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-main" style="width: 60%">
                <div class="product-sear panel-sear">
                    <div class="">
                        <div class="col-md-4">
                            <a href="javascript:void(0)" id="btn-delete-multi" class="btn btn-danger" style="margin-left: 0">Xóa nhiều</a>
                        </div>
                        <div class="form-group col-md-6 padd-0">
                            <input type="text" class="form-control" placeholder="Nhập vào tên danh mục"
                                   id="product-search">
                        </div>
                        <div class="form-group col-md-2 ">
                            <button type="button" class="btn btn-primary btn-large btn-ssup"><i
                                    class="fa fa-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product-main-body" id="dataRaw">
                    @include('cms.modules.group-products.list-prod-group')
                </div>
            </div>
        </div>
    </div>
@endsection

