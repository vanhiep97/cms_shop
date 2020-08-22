<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{ url('/') }}"/>
    <link rel="shortcut icon" type="image/png" href="templates/images/check.png"/>
    <title>@yield('title', env('APP_NAME'))</title>
    <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/css/font-awesome.min.css" rel="stylesheet">
    <link href="templates/css/style.css" rel="stylesheet">
    <link href="templates/css/jquery-ui.min.css" rel="stylesheet">
    <style>
        label.error {
            display: inline-block;
            color: #d71212;
            width: 100%;
            font-size: 12px;
            font-weight: 600;
            font-family: Sans-serif;
            text-transform: capitalize;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<header>
    <nav id="navbar-container" class="navbar navbar- navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle menu-toggler pull-left"
                        onclick="$('#sidebar').toggleClass('hidden-xs hidden-sm hidden-md')">
                    <span class="sr-only">Toggle sidebar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul style="color: #fff;font-size: 15px;position: absolute;top: 10px;">
                    <li style="list-style: none; margin-left: -38px;">
                        <a href="{{ route('orders.index') }}" class="btn btn-success">=> Xem Đơn hàng ( {{ count($orders) }} )</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="height: 50px; width: 400px;">
                    <li class="dropdown user-profile" style="height: 50px; display: flex; align-items: center; float: right; color: #fff; margin-right: 50px">
                        <div class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false" style="display: flex;align-items: center;justify-content: center">
                            <span style="border: 2px solid #fff; border-radius: 50%; width: 30px; height: 30px;
                                            display: flex;align-items: center;justify-content: center; margin-right: 10px">
                                <img src="https://png.pngtree.com/png-clipart/20190520/original/pngtree-user-vector-icon-png-image_3788518.jpg" width="30px" style="border-radius: 50%;" alt="">
                            </span>
                            {{ auth()->guard('web')->user()->name }}
                            <span class="caret"></span>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i>Tài khoản</a></li>
                            <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section id="pos" class="main" role="main" style="position: relative;min-height: 940px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 padd-left-0">
                <div class="main-content">
                    <div class="row">
                        <div class="orders-act">
                            <div class="col-md-8">
                                <div class="order-search" style="margin: 10px 0px; position: relative;">
                                    <input type="text" class="form-control"
                                           placeholder="Nhập mã sản phẩm hoặc tên sản phẩm (F2)"
                                           id="search-pro-box" autocomplete="off">
                                    <div id="search-result-product"></div>
                                </div>
                                <div class="product-results">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center">STT</th>
                                            <th>Mã hàng</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>

                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Giá bán</th>
                                            <th class="text-center">Thành tiền</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="pro_search_append">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="alert alert-success" style="margin-top: 30px;" role="alert">Gõ mã
                                    hoặc tên sản phẩm vào hộp
                                    tìm kiếm để thêm hàng vào đơn hàng
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="morder-info" style="padding: 4px;">
                                            <div class="tab-contents" style="padding: 8px 6px;">
                                                <div class="form-group marg-bot-10 clearfix">
                                                    <div style="padding:0px" class="col-md-4">
                                                        <label>Khách hàng</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="col-md-11 padd-0" style="position: relative;">
                                                            <input id="search-box-customer" class="form-control"
                                                                   type="text"
                                                                   autocomplete="off"
                                                                   placeholder="Tìm khách hàng (F4)"
                                                                   style="border-radius: 3px 0 0 3px !important;"><span
                                                                style="color: red; position: absolute; right: 5px; top:5px;cursor: pointer; "
                                                                id="close-form-customer" class="del-cys">x</span>

                                                            <div id="search-result-customer"></div>
                                                        </div>
                                                        <div class="col-md-1 padd-0">
                                                            <button type="button" id="btn-create-customer"
                                                                    class="btn btn-primary"
                                                                    style="border-radius: 0 3px 3px 0; box-shadow: none; padding: 7px 11px;">
                                                                +
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group marg-bot-10 clearfix">
                                                    <div style="padding:0px" class="col-md-4">
                                                        <label>NV bán hàng</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select class="form-control" id="sale_id" disabled>
                                                            <option value="0">{{ auth()->user()->name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group marg-bot-10 clearfix">
                                                    <div style="padding:0px" class="col-md-4">
                                                        <label>Ghi chú</label>
                                                    </div>
                                                    <div class="col-md-8">
                                    <textarea id="note-order" cols="" class="form-control" rows="3"
                                              style="border-radius: 0;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="lighter" style="margin-top: 0;">
                                            <i class="fa fa-info-circle blue"></i>
                                            Hình thức bán hàng
                                        </h4>

                                        <div class="morder-info" style="padding: 4px;">
                                            <div class="tab-contents" style="padding: 8px 6px;">
                                                <div class="form-group marg-bot-10 clearfix">
                                                    <div class="col-md-4">
                                                        <label>Hình thức</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="radio" id="sell_type" class="payment-method"
                                                                   name="method-pay" value="0" checked>
                                                            Trực tiếp &nbsp;
                                                            <input type="radio" id="sell_type" class="payment-method"
                                                                   name="method-pay" value="1"> Giao hàng
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group marg-bot-10 clearfix">
                                                    <div class="col-md-4">
                                                        <label>Tiền hàng</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="total-money" id="money">
                                                            0
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group marg-bot-10 clearfix">
                                                    <div class="col-md-4">
                                                        <label>Giảm giá (F7)</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text"
                                                               class="form-control text-right txtMoney discount-order" id="discount-order"
                                                               placeholder="0" style="border-radius: 0 !important;">
                                                    </div>
                                                </div>
                                                <div class="form-group marg-bot-10 clearfix">
                                                    <div class="col-md-4">
                                                        <label>Tổng cộng</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="total-after-discount">
                                                            0
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group marg-bot-10 clearfix">
                                                    <div class="col-md-4 padd-right-0">
                                                        <label>Khách đưa (F8)</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text"
                                                               class="form-control text-right txtMoney customer-pay" id="customer-pay"
                                                               placeholder="0" style="border-radius: 0 !important;">
                                                    </div>
                                                </div>
                                                <div class="form-group marg-bot-10 clearfix">
                                                    <div class="col-md-4">
                                                        <label class="debt">Hoàn trả khách</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="debt" id="lack">0</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="btn-groups pull-right" style="margin-bottom: 50px;">
                                            <button type="button" class="btn btn-primary" id="btn-save-order"><i
                                                    class="fa fa-check"></i> Lưu (F9)
                                            </button>
                                            <button type="button" class="btn btn-primary" id="btn-save-print-order"><i class="fa fa-print"></i> In hóa đơn (F10)
                                            </button>
                                            <a href="{{ route('pos.index') }}" class="btn btn-default"><i
                                                    class="fa fa-arrow-left"></i> Hủy
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div id="alert-cms-success" style="width: 300px; display: none; position: absolute; bottom: 10px; right: 10px;">
            <div class="alert alert-success" role="alert" style="background: #5a821c; color: #fff; font-size: 16px">
                <i class="fa fa-check fa-fw"></i> <span id="text-alert-success"></span>
            </div>
        </div>
        <div id="alert-cms-error" style="width: 300px;display: none; position: absolute; bottom: 10px; right: 10px;">
            <div class="alert alert-danger" role="alert" style="background: #d21212; color: #fff; font-size: 16px">
                <i class="fa fa-exclamation-circle fa-fw"></i> <span id="text-alert-error"></span>
            </div>
        </div>
    </div>
    @include('cms.includes.modal')
</section>
</body>
<script src="templates/js/sweetalert2@9.js"></script>
<script src="templates/js/jquery.js"></script>
<script src="templates/js/jquery-ui.min.js"></script>
<script src="templates/js/jquery.validate.min.js"></script>
<script src="templates/js/html5shiv.min.js"></script>
<script src="templates/js/respond.min.js"></script>
<script src="templates/js/bootstrap.min.js"></script>
<script src="backend/builds/base/baseajax.js"></script>
<script src="backend/builds/modules/pos/posajax.js"></script>
<script src="backend/builds/modules/customers/customerajax.js"></script>
</html>
