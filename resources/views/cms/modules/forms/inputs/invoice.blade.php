
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
     <p>Nhà cung cấp: {{ $input->supplier->supplier_name }}</p>
     <p class="sdt">Số điện thoại: {{ $input->supplier->supplier_phone }}</p>
    <p>Địa chỉ: {{ $input->supplier->address }}</p>
    <p>PHIẾU GIAO NHẬN HÀNG</p>
    <p>Số: {{ $input->input_code }}</p>
    <p>Ngày: {{ $input->input_date }}</p>
    <p>Theo đơn mua hàng số: {{ $input->purchaseOrder->pur_order_code }} </p>
    <div class="congty">
    <p>Tên shop: Shop Fashion</p>
    <p>Số điện thoại: 0985940019</p>
    <p>Địa chỉ: Vạn Ninh - Gia Bình - Bắc Ninh</p>
    </div>

</div>

<table>
    <tr>
      <th>STT</th>
      <th>Mã hàng</th>
      <th>Tên hàng</th>
      <th>Số lượng giao</th>
      <th>Số lượng nhận</th>
      <th>Đơn giá</th>
      <th>Số lượng</th>
      <th>Thành tiền</th>
    </tr>
    @if(!empty(json_decode($input->import_detail)) && count(json_decode($input->import_detail)) > 0)
    @foreach(json_decode($input->import_detail) as $key => $value)
    <tr>
      <td> {{ $key + 1 }}</td>
      <td>{{ $value->product_code }}</td>
      <td>{{ $value->product_name }}</td>
      <td>{{ $value->amount_ship }}</td>
      <td>{{ $value->amount_input }}</td>
      <td>{{ $value->origin_price }}</td>
      <td>{{ $value->product_sell_amount }}</td>
      <td>{{ $value->total_money_input }}</td>
    </tr>
    @endforeach
    @endif
    <tr class="tongtien">
        <td colspan = "5">Tổng tiền: <span> {{ number_format($input->total_price) }}</span>   </td>
        <td colspan = "1"></td>
     </tr>
  </table>
  <div class="nguoilap" style="float: right; margin-top: 10px">Người lập</div>
  <style>
     body {
        position: relative;
        width: 100%;
        margin: 0 auto;
        }
   p:nth-child(4),p:nth-child(5),p:nth-child(6),p:nth-child(7){
       text-align: center;
   }
   .congty{
       margin-top: -14px;
   }
   .congty p{
    border-bottom:none;
    margin-bottom: 0px;
}
   p:nth-child(9){
       margin-top: 13px;
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


  </style>

</body>
</html>
