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
                <span>Địa chỉ: </span>Cao Tho - Van Ninh - Gia Binh - Bac Ninh
            </div>
        </div>
        <div class="header-top1">
            <h1>HÓA ĐƠN BÁN HÀNG</h1>
            <span>Mã hóa đơn: </span>{{ $orders->order_code }}
        </div>
        <div class="header-main">
            <div class="sell_date">
                <span>Ngày bán: </span>{{ $orders->created_at }}
            </div>
            <div class="customer">
                <span>Khách hàng: </span>Nguyen Van Hiep
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
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>{{ $orders->order_code }}</td>
                <td>john@example.com</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div class="total">
            <p><span>Tổng tiền hàng: </span>{{ $orders->total_price }}</p>
            <p><span>Giảm giá: </span>{{ $orders->coupon }}</p>
            <p><span>Tổng thanh toán: </span>{{ $orders->total_money }}</p>
            <p><span>Khách hàng đã thanh toán: </span>{{ $orders->customer_pay }}</p>
            <p><span>Tiền trả lại khách: </span>{{ $orders->lack }}</p>
        </div>
        <div class="sell-user">
            <h3>NGƯỜI BÁN HÀNG</h3>
            <p>
                {{ $orders->user_practise }}
            </p>
        </div>
    </div>
</div>
</body>
</html>
