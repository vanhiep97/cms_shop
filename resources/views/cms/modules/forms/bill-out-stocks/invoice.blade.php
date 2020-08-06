
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
      <td rowspan="2" >STT</td>
      <td rowspan="2" >
          <div>Tên , nhãn hiệu , quy cách ,</div>
          <div>phẩm chất vật tư , dụng cụ </div>
          <div> sản phẩm , hàng hóa</div> </td>

          <td rowspan="2">
              <div>Mã</div>
            <div>số</div>
        </td>
        <td  rowspan="2" >
            <div>Đơn</div>
            <div>vị tính</div>
        </td>

        <td colspan="2" style="padding: 13px 0;" >
            Số lượng
        </td>

        <td rowspan="2" >
            Đơn giá
        </td>


        <td rowspan="2" >
            Thành tiền
        </td>


    </tr>

    <tr>

      <td>
       Yêu cầu
      </td>
      <td>
      <div>Thực</div>
      <div>nhập</div>
      </td>

    </tr>

    <tr>

        <td>
       <p>A</p>
        </td>
        <td>
            <p>A</p>
        </td>
        <td>
            <p>A</p>
            </td>
            <td>
                <p>A</p>
                </td>
                <td>
                    <p>A</p>
                    </td>
                    <td>
                        <p>A</p>
                        </td>
                        <td>
                            <p>A</p>
                            </td>
                            <td>
                                <p>A</p>
                                </td>

      </tr>



      <tr>

        <td>
       <p>A</p>
        </td>
        <td>
            <p></p>
        </td>
        <td>
            <p></p>
            </td>
            <td>
                <p></p>
                </td>
                <td>
                    <p></p>
                    </td>
                    <td>
                        <p></p>
                        </td>
                        <td>
                            <p></p>
                            </td>
                            <td>
                                <p></p>
                                </td>

      </tr>







      <tr>

        <td>

        </td>
        <td style="font-weight: bold;">
        Cộng
        </td>
        <td style="font-weight: bold;">
            <p>A</p>
            </td>
            <td style="font-weight: bold;">
                <p>A</p>
                </td>
                <td style="font-weight: bold;">
                    <p>A</p>
                    </td>
                    <td style="font-weight: bold;">
                        <p>A</p>
                        </td>
                        <td style="font-weight: bold;">
                            <p>A</p>
                            </td>
                            <td>

                                </td>

      </tr>








  </table>


 <p>-Tổng số tiền (viết bằng chữ ): ...............</p>
 <p>-Số chứng từ gốc làm theo: ...............</p>

 <p  align="right">Ngày:........... tháng :....... năm :..........</p>

  <div style="display: flex;" align="center">
      <div style=" margin-right: 75px; font-weight: bold;">Người lập phiếu <p align="center" style="font-weight: normal;">(Ký , họ tên )</p></div>
      <div style=" margin-right: 75px; font-weight: bold;">Người nhận <div align="center" style="font-weight: bold;">hàng</div></div>
      <div style=" margin-right: 75px; font-weight: bold;">Thủ kho <p align="center" style="font-weight: normal;">(Ký , họ tên )</p></div>
      <div style=" margin-right: 75px; font-weight: bold;">Kế toán trưởng <p align="center" style="font-weight: normal;">(Ký , họ tên )</p></div>
      <div style=" margin-right: 75px; font-weight: bold;">Giám đốc <p align="center" style="font-weight: normal;">(Ký , họ tên )</p></div>
  </div>

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
   th {
     height: 50px;
   }

   table, td, th {
     border: 1px solid black;
     margin-top: 20px;
   }
    </style>
</body>
</html>
