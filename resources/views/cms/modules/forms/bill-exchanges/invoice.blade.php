
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
     <h1 align="center">NHÃN ĐỔI/TRẢ</h1>
     <table>
        <tr>
          <td style="width: 425px;">Thông tin khách hàng</td>
          <td>Thông tin nhận hàng</td>

        </tr>
        <tr>

          <td>
              <p align="left">Họ tên : {{ $billExchange->customer->customer_name }}</p>
              <p align="left">Địa chỉ : {{ $billExchange->customer->customer_address }}</p>
              <p align="left">Mã đơn hàng : {{ $billExchange->order->order_code }}</p>
          </td>
          <td>
              <p>Địa chỉ : <span>SHOP FASHION</span></p>
              <p>Địa chỉ chuyển hoàn : Vạn Ninh - Gia Bình - Bắc Ninh</p>
          </td>
        </tr>

      </table>

       <h1 align="center">PHIẾU YÊU CẦU ĐỔI/TRẢ</h1>
       <div  align="center" style="font-weight: 100; opacity: 0.6;">(
        Quý khách vui lòng đọc kỹ Hướng dẫn đổi/trả hàng (mặt sau) trước khi điền thông tin bên dưới
        )</div>

       <div align="center">
           <p style="font-weight: normal;">Mã đơn hàng : .....</p>
           <p style="font-weight: normal;">Ngày yêu cầu đổi/trả : ..... </p>
       </div>
        <br>


       <table>
        <tr>
            <th>Tên sản phẩm</th>
            <th><div>Số</div>
                <div>lượng</div>
            </th>
            <th><p>Lý do đổi/trả</p>
                <div style="font-weight: normal;">(mã lý do như bên dưới)</div>
            </th>
            <th><p>Yêu cầu</p>
            </th>
          </tr>
          <tr>
            <td ></td>
            <td ></td>
            <td ></td>
            <td  >
                <div class="checkbox">
             <input type="checkbox" value="Đổi" >
              <label for="vehicle1" style="font-weight: normal;"> Đổi </label>
               <input type="checkbox" >
                 <label for="vehicle2" value="Tr" style="font-weight: normal;"> Trả</label><br>
                </div>

            </td>

          </tr>



          <tr  >
            <td  class="rules" colspan = "5">
            <span style="margin: 6px 0; display: block;"> <span style=" font-weight: bold;">1.</span> <span> Lỗi kỹ thuật |
                <span style=" font-weight: bold;">2.</span> <span> Hư hại , bể vỡ |
                    <span style=" font-weight: bold;">3.</span> <span> Giao không đúng |
                        <span style=" font-weight: bold;">4.</span> <span> Không giống trên website |
                            <span style=" font-weight: bold;">5.</span> <span> Không thích , đặt nhầm |
                                <span style=" font-weight: bold;">6.</span> <span> Lý do khác



            </span>
            <span style="display: block; padding: 4px 0;">* Khi Quý khách đã chọn 01 trong 02 hình thức nhận hoàn trả trên , Cdiscount.vn sẽ không hỗ trợ nếu có bất kì thay đổi nào </span>


         </tr>

       </table>

       <p>
          <u>  Ghi chú </u>
          </p>

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
   tr:nth-child(2) td p {
      padding-left: 5px;

   }
   table tr ,  p {
       font-weight: bold;
   }
   span{
       font-weight: normal;
   }
   div > p {
       float: left;
       padding:2px 15%;

   }
    .checkbox{
        margin: 10px 0;
    }
    .checkbox > label {
        padding: 5px;
    }
    .rules {
       text-align: start;
       padding-left: 4px;
    }



     </style>


</body>
</html>
