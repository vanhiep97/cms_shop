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
        </style>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
    <script src="backend/builds/modules/products/productajax.js"></script>
    <script src="backend/builds/modules/product-group/productgroupajax.js"></script>
    <script src="backend/builds/modules/manufactures/manufactureajax.js"></script>
    <script src="backend/builds/modules/customers/customerajax.js"></script>
    <script src="backend/builds/modules/users/userajax.js"></script>
    <script src="backend/builds/modules/orders/orderajax.js"></script>
    <script src="backend/builds/modules/suppliers/supplierajax.js"></script>
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
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-analytics.js"></script>
    <script>
        const config = {
            apiKey: "AIzaSyCV2fxL-D9pqeTGLjFiSP2iq5F91lI9Imo",
            authDomain: "send-verify-code.firebaseapp.com",
            databaseURL: "https://send-verify-code.firebaseio.com",
            projectId: "send-verify-code",
            storageBucket: "send-verify-code.appspot.com",
            messagingSenderId: "399055171985",
            appId: "1:399055171985:web:8159bbd7e280b4cab5aa30",
            measurementId: "G-Q3CNHQKM6Z"
        };
        firebase.initializeApp(config);

        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token)
                let urlResource = '{{ route('save-device-token') }}';
                callAjax(urlResource, 'POST', {
                    fcm_token: token
                })
            })
            .catch(function (err) {
                console.log("Unable to get permission to notify.", err);
            });

        messaging.onMessage(function(payload) {
            let amount = parseInt($('#bell_count').html()) + 1;
            $('#bell_count').html(amount);
            // const {title, ...options} = payload.data.notification;
            // navigator.serviceWorker.ready.then(registration => {
            //     registration.showNotification(title, options);
            // });
        });
    </script>
    </body>
</html>
@else
    <h1>Dăm 3 thằng hacker bố láo ăn cắp</h1>
@endif
