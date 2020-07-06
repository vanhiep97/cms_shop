<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', env('APP_NAME'))</title>
    <meta name="description" content="@yield('meta_description', 'CMS SHOP')">
    <meta name="author" content="@yield('meta_author', 'CMS SHOP')">
    <base href="{{ url('/') }}">
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/css/font-awesome.min.css" rel="stylesheet">
    <link href="templates/css/main.css" rel="stylesheet">
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
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body style="background-image: url('https://images.pexels.com/photos/1328545/pexels-photo-1328545.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'); background-size: cover; background-position: top center;background-repeat: no-repeat;">
<div class="background" style="background-color: #000; opacity: 0.9; min-height: 1280px">
    <header id="main-header" style="padding-top: 150px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <center style="    font-size: 40px;
    color: #fff;
    padding-top: 80px;">CMS SHOP</center>
                </div>
            </div>
        </div>
    </header>
    <section class="main" role="main">
        <div class="container">
            <div class="row">
                @yield('auth-content')
            </div>
        </div>
    </section>
</div>
<script src="templates/js/sweetalert2@9.js"></script>
<script src="templates/js/jquery.js"></script>
<script src="templates/js/jquery-ui.min.js"></script>
<script src="templates/js/jquery.validate.min.js"></script>
<script src="templates/js/bootstrap.min.js"></script>
<script src="backend/builds/base/baseajax.js"></script>
<script src="backend/builds/modules/auth/loginajax.js"></script>
</body>
</html>
