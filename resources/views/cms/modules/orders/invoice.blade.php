<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Shop Fashion</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
         body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>
<div class="container">
    <header>
        <div class="header-top">
            <div class="logo">
                <span>Tên shop: </span>SHOP FASHION
            </div>
            <div class="phone">
                <span>Số điện thoại: </span>0985940019
            </div>
            <div class="email">
                <span>Email: </span>nguyentranhiep96@gmail.com
            </div>
            <div class="address">
                <span>Địa chỉ: </span>Cao Tho - Van Ninh - Gia Binh - Bắc Ninh
            </div>
        </div>
        <div class="header-top1" style="display: flex; justify-content: center;">
            <h1 style="font-weight: 600;"><p>HÓA ĐƠN BÁN HÀNG</p></h1>
            <span>Mã hóa đơn: </span>{{ $orders->order_code }}
        </div>
        <div class="header-main">
            <div class="sell_date">
                <span>Ngày bán: </span>{{ $orders->created_at }}
            </div>
            <div class="customer">
                <span>Khách hàng: </span>Nguyễn Văn Hiệp
            </div>
            <div class="customer-email">
                <span>Email: </span>customer@gmail.com
            </div>
            <div class="customer-phone">
                <span>Số điện thoại: </span>0985940019
            </div>
        </div>
    </header>
    <div class="main">
        <table class="table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Tổng tiền</th>
            </tr>
            </thead>
            <tbody>
                @php
                   $orderDetail = json_decode($orders->order_detail);
                @endphp
               @if(!empty($orderDetail) && count($orderDetail) > 0)
                    @foreach($orderDetail as $key => $value)
                        <tr>
                            <td class="text-center width-5 hidden-320 ">
                                {{ $key + 1 }}
                            </td>
                            <td class="text-left hidden-768">
                                {{ $value->product_code ? $value->product_code : '' }}
                            </td>
                            <td class="text-left ">
                                {{ $value->product_name ? $value->product_name : '' }}
                            </td>
                            <td class="text-center ">
                                {{ $value->product_sell_amount ? $value->product_sell_amount : 0 }}
                            </td>
                            <td class="text-center">
                                {{ $value->product_sell_price ? number_format($value->product_sell_price) : 0 }}
                            </td>
                            <td class="text-center">
                                {{ number_format($value->product_sell_price * $value->product_sell_amount) }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div class="total">
            <p><span>Tổng tiền hàng: </span>{{ $orders->total_price ? number_format($orders->total_price) : 0 }}</p>
            <p><span>Giảm giá: </span>{{ $orders->coupon ? number_format($orders->coupon) : 0 }}</p>
            <p><span>Tổng thanh toán: </span>{{ $orders->total_money ? number_format($orders->total_money) : 0 }}</p>
            <p><span>Khách hàng đã thanh toán: </span>{{ $orders->customer_pay ? number_format($orders->customer_pay) : 0 }}</p>
            <p><span>Tiền trả lại khách: </span>{{ $orders->lack ? number_format($orders->lack) : 0 }}</p>
        </div>
        <div class="sell-user">
            <h3><p>NGƯỜI BÁN HÀNG</p></h3>
            <p>
                {{ $orders->user_practise }}
            </p>
        </div>
    </div>
</div>
</body>
</html>
