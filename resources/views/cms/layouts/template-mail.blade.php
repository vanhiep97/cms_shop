<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password Template</title>
    <style>
        .logo_text {
            font-family: 'Roboto Slab', serif;
            font-size: 50px;
            font-weight: 700;
            line-height: 0.75;
            /* color: #384158; */
            color: #6d1369;
            vertical-align: middle;
            margin-left: 7px;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
            text-transform: uppercase;
        }
        .logo_text span {
            color: #f26b23;
        }
        .template-mail__inner {
            padding: 30px 0;
        }
        .template-mail__content {
            padding: 0 15px;
        }
    </style>
</head>
<body>
<div class="template-mail">
    <div class="template-mail__inner">
        <div class="template-mail__head logo_text">
            Ecommerce <span>System</span>
        </div>
        <div class="template-mail__content">
            <h3>Mã code reset Password:</h3>
            <h1 style="font-weight: bold; color: black; font-size: 60px">{!! $e_message !!}</h1>
        </div>
    </div>
</div>
</body>
</html>
