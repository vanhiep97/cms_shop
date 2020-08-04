
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
    @php
        $supplier = App\Models\Supplier::where('id', $billOrder->input->supplier_id)->first();
    @endphp
    <div class="Thongtinkhachang">
     <p>Số hiệu hóa đơn: {{ $billOrder->bill_code }}</p>
    <p>HÓA ĐƠN MUA</p>
    <p>Ngày: {{ $billOrder->bill_date }}</p>
    <p>Cho phiếu nhập kho số: {{ $billOrder->input->input_code }}</p>
    <p>Tên nhà cung cấp: {{ $supplier->supplier_name }}</p>
    <p>Địa chỉ:  {{ $supplier->address }}</p>
    <p>Số điện thoại: {{ $supplier->supplier_phone }}</p>


</div>

<table>
    <tr>
      <td>STT</td>
      <td>Ma hang</td>
      <td>Tên hàng</td>
      <td>ĐVT</td>
      <td>Số lượng </td>
      <td>Đơn giá </td>
      <td>Thành tiền </td>
    </tr>
    @php
        $billDetail = json_decode($billOrder->bill_detail);
    @endphp
    @if(!empty($billDetail) && count($billDetail) > 0)
    @foreach ($billDetail as $key => $value) {
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $value->product_code }}</td>
            <td>{{ $value->product_name }}</td>
            <td>cai</td>
            <td>{{ $value->amount_bill }}</td>
            <td>{{ $value->product_origin_price }}</td>
            <td>{{ $value->total_money_bill }}</td>
        </tr>
    @endforeach
    @endif
     <tr class="tongtien">
        <td colspan = "7"> <span> TỔNG TIỀN: {{ $billOrder->total_price }}</span>   </td>
        <td colspan = "1"></td>
     </tr>
  </table>

   <table>
    <tr>
        <th>Đại diện nhà cung cấp </th>
        <th>Người lập </th>

      </tr>
      <tr>

        <td> </td>
        <td> </td>
      </tr>
   </table>



  <style>
     body {
        width: 100%;
        margin: 0 auto;
        }

   p:nth-child(2),p:nth-child(3),p:nth-child(4){
       text-align: center;
   }


table {
  border-collapse: collapse;
  width: 100%;
}

 td {
  border: 1px solid black;
  text-align: center;
}
th {
  height: 50px;
}

table, td, th {
  border: 1px solid black;
  margin-top: 20px;
}
span {
    float: right;
}
  </style>

</body>
</html>
