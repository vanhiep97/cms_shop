<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
    <style>
      body {
        font-family: DejaVu Sans, sans-serif;
      }
    </style>
</head>
<body>
    <div class="Thongtinkhachang">
    <div class="shop-info">
      <p>SHOP FASHION</p>
      <p>Số điện thoại: 0985940019</p>
      <p>Email: nguyentranhiep96@gmail.com</p>
      <p>Địa chỉ: Vạn Ninh - Gia Bình - Bắc Ninh</p>
    </div>
    <div class="donhang">HÓA ĐƠN BÁN HÀNG</div>
    <p>Mã hóa đơn: {{ $orders->order_code }}</p>
    <p>Ngày bán: {{ $orders->created_at }}</p>
    <p>Tên khách hàng: {{ $orders->customer->customer_name }}</p>
    <p>Email: {{ $orders->customer->customer_email }}</p>
    <p>Điện thoại: {{ $orders->customer->customer_phone }}</p>
    <p>Địa chỉ: {{ $orders->customer->customer_address }} </p>
    <p>Hình thức: {{ $orders->sell_type === 0 ? 'Trực tiếp' : 'Giao hàng' }}</p>
    <p>Trạng thái: {{ $orders->order_status === 1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>

</div>

<table>
    <tr>
      <td>STT</td>
      <td>Tên hàng</td>
      <td>ĐVT</td>
      <td>Số lượng </td>
      <td>Đơn giá </td>
      <td>Thành tiền </td>
    </tr>
    @php
    $orderDetail = json_decode($orders->order_detail);
    @endphp
    @if (!empty($orderDetail) && count($orderDetail))
    @foreach ($orderDetail ?? '' as $key => $value)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ $value->product_name }}</td>
      <td>cái</td>
      <td>{{ $value->product_sell_amount }}</td>
      <td>{{ number_format($value->product_origin_price) }}</td>
      <td>{{ number_format($value->product_origin_price * $value->product_sell_amount) }}</td>
    </tr>
    @endforeach
    @endif
    <tr class="tongtien">
      <td colspan="5">Tổng tiền: <span> {{ number_format($orders->total_price) }}</span> </td>
      <td colspan="1"></td>
    </tr>
  </table>

  <div class="pair shop-info">
    <p>Tổng tiền hàng: {{ $orders->total_price ? number_format($orders->total_price) : 0 }}</p>
    <p>Giảm giá: {{ $orders->coupon ? number_format($orders->coupon) : 0 }}</p>
    <p>Tổng thanh toán: </span>{{ $orders->total_money ? number_format($orders->total_money) : 0 }}</p>
    <p>Khách hàng đã thanh toán: {{ $orders->customer_pay ? number_format($orders->customer_pay) : 0 }}</p>
    <p>Tiền trả lại khách: {{ $orders->lack ? number_format($orders->lack) : 0 }}</p>
  </div>

  <div class="nguoilap">Người lập</div>
  <style>
     body {
        width: 100%;
        margin: 0 auto;
        }

   p:nth-child(2),p:nth-child(3){
       text-align: center;
   }

   .donhang{
       text-align: center;
       padding-bottom: 8px;
   }

th {
  height: 50px;
}

table, td, th {
  border: 1px solid black;
  margin-top: 20px;
  border-collapse: collapse;
  width: 100%;
}
td {

  text-align: center;
}
span {
    float: right;
}
.nguoilap{
    float: right;
    margin-top: 10px;
}
.pair {
  float: left;
}
.shop-info p {
  text-align: left;
}
  </style>

</body>
</html>
