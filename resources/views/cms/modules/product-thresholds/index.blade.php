@extends('cms.layouts.app')
@section('content')
    <div class="inventory">
        <div class="inventory-content">
            <div class="product-sear panel-sear" style="margin-bottom: -55px">
                <div class="breadcrumbs-fixed panel-action">
                    <div class="row">
                        <div class="products-act">
                            <div class="col-md-4 col-md-offset-2">
                                <div class="left-action text-left clearfix">
                                    <h2>Danh sách sản phẩm</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-space orders-space"></div>
            </div>

            <div class="tonkho hien-thi-bang-ajax">
                <div class="inventory-main-body-public_templates_js_ajax_js">
                    @include('cms.modules.product-thresholds.list-threshold');
                </div>
            </div><!-- end .tonkho -->

        </div>
    </div>
@endsection
