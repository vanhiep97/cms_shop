@if(auth()->guard('web')->check() === true)
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('/templates/images/check.png') }}"/>
        <title>@yield('title', env('APP_NAME'))</title>
        <meta name="description" content="@yield('meta_description', 'CMS SHOP')">
        <meta name="author" content="@yield('meta_author', 'CMS SHOP')">
        <base href="{{ url('/') }}">
        <link href="templates/css/bootstrap.min.css" rel="stylesheet">
        <link href="templates/css/bootstrap-datepicker.css" rel="stylesheet">
        <link href="templates/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="templates/css/font-awesome.min.css" rel="stylesheet">
        <link href="templates/css/style.css" rel="stylesheet">
        <link href="templates/css/jquery-ui.min.css" rel="stylesheet">
        <link href="templates/css/jquery.datetimepicker.css" rel="stylesheet">
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
            #avatar img {
                width: 240px;
                height: 240px !important;
                border: 2px solid #ccc;
                margin: 4px;
            }

            .btn-groups {
                margin-right: 15px;
            }

            .sidebar-submenu {
                background-color: #fff;
            }

            .sidebar-submenu ul {
                padding-left: 0;
            }

            .sidebar-submenu ul li {
                border-bottom: none !important;
                padding: 0 10px 0 25px;
            }

            .sidebar-submenu ul li a {
                border: none !important;
                background: none !important;
            }

            .sidebar-dropdown a#parent::before {
                content: "\f107";
                display: inline-block;
                font: normal normal normal 15px/1 FontAwesome;
                font-size: inherit;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
                margin-top: 6px;
                float: right;
            }

            .sidebar-submenu ul li a:hover {
                border: none !important;
            }

            .table-responsive {
                overflow-x: inherit;
            }

            .product-results {
                max-height: 500px;
                overflow-y: scroll;
                border: 2px solid #ddd;
            }
        </style>
    </head>
    <body>
    <header>
        @include('cms.includes.header')
    </header>
    <section class="main" role="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 padd-0">
                    @include('cms.includes.sidebar')
                </div>
                <div class="col-md-10 padd-left-0">
                    <div class="main-content">
                        @include('cms.includes.modal')
                        @yield('content')
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
    </section>
    @include('cms.includes.lib_custom_tinycme')
    <script src="templates/js/sweetalert2@9.js"></script>
    <script src="templates/js/jquery.js"></script>
    <script src="templates/js/jquery-ui.min.js"></script>
    <script src="templates/js/jquery.validate.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="templates/js/html5shiv.min.js"></script>
    <script src="templates/js/respond.min.js"></script>
    <script src="templates/js/bootstrap.min.js"></script>
    <script src="templates/js/jquery.datetimepicker.full.js"></script>
    <script src="templates/js/bootstrap-datepicker.min.js"></script>
    <script src="templates/js/bootstrap-datepicker.vi.min.js"></script>
    <script src="backend/builds/base/baseajax.js"></script>
    @yield('ajax')
    <script src="backend/builds/modules/products/productajax.js"></script>
    <script src="backend/builds/modules/product-group/productgroupajax.js"></script>
    <script src="backend/builds/modules/manufactures/manufactureajax.js"></script>
    <script src="backend/builds/modules/customers/customerajax.js"></script>
    <script src="backend/builds/modules/users/userajax.js"></script>
    <script src="backend/builds/modules/orders/orderajax.js"></script>
    <script src="backend/builds/modules/suppliers/supplierajax.js"></script>
    <script src="backend/builds/modules/forms/formajax.js"></script>
    <script src="backend/builds/modules/revenue/revenueajax.js"></script>
    <script src="backend/builds/modules/profit/profitajax.js"></script>
    <script>
        $(document).ready(function () {
            $('#lfm').filemanager('image');
        })
    </script>
    <script>
        $(function () {
            $('#datepicker1').datetimepicker();
            $('#datepicker2').datetimepicker();
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".sidebar-submenu").css('display', 'none');
            $(".sidebar-dropdown > a").click(function() {
                $(".sidebar-submenu").slideUp(500);
                if ($(this)
                    .parent()
                    .hasClass("active")) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                    .parent()
                    .removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                    .next(".sidebar-submenu")
                    .slideDown(500);
                    $(this)
                    .parent()
                    .addClass("active");
                }
            });
        })
    </script>
    </body>
</html>
@else
    <h1>Dăm 3 thằng hacker bố láo ăn cắp</h1>
@endif
