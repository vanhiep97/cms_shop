
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>
   <h1 align="center">PHIẾU XUẤT KHO</h1>

   <div style="display: flex; ">
    <p style="width: 100%; padding-left: 30%;">Ngày: {{ $billOutStock->bill_out_stock_date }}</p>
    <br />
    <p style="width: 100%; padding-left: 30%;margin-top: 25px;">Số: {{ $billOutStock->bill_out_stock_code }}</p>
   </div>


  <div>
    <p  style="width:100% ;"> - Họ và tên người nhận hàng : {{ $billOutStock->supplier->supplier_name }}  </p>
    <span style="width:100% ;"> - Địa chỉ người nhận: {{ $billOutStock->supplier->address }}</span>
  </div>

  <p> - Lý do xuất kho : {{ $billOutStock->bill_out_stock_reason }}</p>

  <div>
    <span style="width:100% ; "> - Địa chỉ xuất kho: Cao Thọ - Vạn Ninh - Gia Bình - Bắc Ninh</span>
  </div>


  <table>
    <tr>
      <th>STT</th>
      <th>Mã sản phẩm</th>
      <th>Tên sản phẩm</th>
      <th>Đơn vị tính</th>
      <th>Số lượng</th>
      <th>Đơn giá</th>
      <th>Thành tiền</th>
    </tr>
    @php
       if(!empty($billOutStock)) {
           $billOutStockDetail = json_decode($billOutStock->bill_out_stock_detail);
       }
    @endphp
    @if(!empty($billOutStockDetail) && count($billOutStockDetail) > 0)
    @foreach($billOutStockDetail as $key => $value)
    <tr>
        <td>
            <p>{{ $key + 1 }}</p>
        </td>
        <td>
            <p>{{ $value->product_code }}</p>
        </td>
        <td>
            <p>{{ $value->product_name }}</p>
        </td>
        <td>Chiec</td>
        <td>{{ $value->product_sell_amount}}</td>
        <td>{{ number_format($value->product_origin_price) }}</td>
        <td>{{ number_format($value->product_sell_amount * $value->product_origin_price) }}</td>
      </tr>
      @endforeach
      @endif
      @if(!empty($billOutStockDetail))
      <tr>
        <td>
        </td>
        <td style="font-weight: bold;">
        Tổng tiền
        </td>
        <td style="font-weight: bold;" colspan="6">
            <p>{{ number_format($billOutStock->total_price) }}</p>
        </td>
      </tr>
      @endif
  </table>


 <p>-Tổng số tiền (viết bằng chữ ): ...............</p>
 <p>-Số chứng từ gốc làm theo: ...............</p>

 <p  align="right">Ngày:........... tháng :....... năm :..........</p>

  {{-- <div>
      <div style=" margin-right: 75px; font-weight: bold;">Người lập phiếu <p align="center" style="font-weight: normal;">(Ký , họ tên )</p></div>
      <div style=" margin-right: 75px; font-weight: bold;">Người nhận <div align="center" style="font-weight: bold;">hàng</div></div>
      <div style=" margin-right: 75px; font-weight: bold;">Thủ kho <p align="center" style="font-weight: normal;">(Ký , họ tên )</p></div>
      <div style=" margin-right: 75px; font-weight: bold;">Kế toán trưởng <p align="center" style="font-weight: normal;">(Ký , họ tên )</p></div>
      <div style=" margin-right: 75px; font-weight: bold;">Giám đốc <p align="center" style="font-weight: normal;">(Ký , họ tên )</p></div>
  </div> --}}

    <style>
          body {
           width: 100%;
           margin: 0 auto;

           }
           table {
                border-collapse: collapse;
                width: 100%;
            }

    td {
     border: 1px solid black;
     text-align: center;
   }
   table, td, th {
     border: 1px solid black;
     margin-top: 20px;
   }
    </style>
</body>
</html>
