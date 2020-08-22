@extends('cms.layouts.app')
@section('content')
    <div class="products">
        <div class="breadcrumbs-fixed panel-action">
            <div class="row">
                <div class="products-act">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="left-action text-left clearfix">
                            <h2>Thương hiệu</h2>
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
                        Thêm Thương hiệu
                    </div>
                    <div class="card-body">
                        <div class="row form-horizontal">
                            <div class="col-md-12">
                                <form id="manufacture-form">
                                    <div class="form-group">
                                        <div class="col-md-4 text-right">
                                            <label>Tên Thương hiệu</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="manufacture_name" id="manufacture_name" class="form-control"
                                                   placeholder="Nhập tên nhà sản xuất.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4 text-right">
                                            <label>Mô tả</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea style="padding-left: 10px" name="manufacture_description" id="manufacture_description" cols="45" rows="5" placeholder="Mô tả"></textarea>
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
                        <div class="col-md-6" style="margin-left: -15px; margin-bottom: 10px">
                            <a href="javascript:void(0)" id="btn-delete-multi-manufacture" class="btn btn-danger" style="margin-left: 0">Xóa nhiều</a>
                        </div>
                        {{-- <div class="form-group col-md-4 padd-0">
                            <input type="text" class="form-control" placeholder="Nhập mã sản phẩm hoặc tên sản phẩm"
                                   id="product-search">
                        </div>
                        <div class="form-group col-md-2 ">
                            <button type="button" class="btn btn-primary btn-large btn-ssup"><i
                                    class="fa fa-search"></i> Tìm kiếm
                            </button>
                        </div> --}}
                    </div>
                </div>
                <div class="product-main-body" id="dataRaw">
                    @include('cms.modules.manufactures.list-manufacture')
                </div>
            </div>
        </div>
    </div>
@endsection

