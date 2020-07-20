
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
    <style>
         body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>
    <div class="Thongtinkhachang">
    <p>Số đơn mua hàng: {{ $purchaseOrder->pur_order_code }}</p>
    <div class="donhang">ĐƠN MUA HÀNG</div>
    <p>Ngày: {{ $purchaseOrder->pur_order_date }}</p>
    <p>Tên Nhà cung cấp: {{ $purchaseOrder->supplier->supplier_name }}</p>
    <p>Địa chỉ: {{ $purchaseOrder->supplier->address }}</p>
    <p>Điện thoại: {{ $purchaseOrder->supplier->supplier_phone }}</p>
    <p>ATM: {{ $purchaseOrder->supplier->ATM }}</p>

</div>
@php
    $purOrderDetail = json_decode($purchaseOrder->pur_order_detail);
@endphp
<table>
    <tr>
      <td>STT</td>
      <td>Tên hàng</td>
      <td>ĐVT</td>
      <td>Số lượng </td>
      <td>Đơn giá </td>
      <td>Thành tiền </td>
    </tr>
    @if (!empty($purOrderDetail) && count($purOrderDetail))
        @foreach ($purOrderDetail ?? '' as $key => $value)
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
        <td colspan = "5">Tổng tiền: <span> {{ number_format($purchaseOrder->total_price) }}</span>   </td>
        <td colspan = "1"></td>
     </tr>
  </table>

  <div class="nguoilap">Người lập</div>
  <style>
     body {
        width: 100%;
        margin: 0 auto;
        }

     p:nth-child(1) , p:nth-child(2),p:nth-child(3), p:nth-child(4),p:nth-child(5),p:nth-child(6){

    }
   p:nth-child(2),p:nth-child(3){
       text-align: center;
   }

   .donhang{
       margin-top: 50px;
       text-align: center;
       padding-bottom: -10px;
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
    margin-right: 100px;
    margin-top: 10px;
}
p {
    margin-bottom: 0px;
}
  </style>

</body>
</html>
