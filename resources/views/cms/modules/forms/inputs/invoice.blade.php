
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
     <p>Nhà cung cấp: .......</p>
     <p class="sdt">Số điện thoại:.........</p>
    <p>Địa chỉ:.....</p>
    <p>PHIẾU GIAO NHẬN HÀNG</p>
    <p>Số:....</p>
    <p>Ngày:.../.../...</p>
    <p>Theo đơn mua hàng số:..... </p>
    <div class="congty">
    <p>Công ty:....</p>
    <p class="sdt1">Số điện thoại:.........</p>
    </div>
    <p>Địa chỉ:.....</p>


</div>

<table>
    <tr>
      <td>STT</td>
      <td>Tên hàng</td>
      <td>Số lượng giao</td>
      <td>Số lượng nhận</td>
    </tr>
    <tr>
      <td>1</td>
      <td>2</td>
      <td>3</td>
      <td>4</td>

    </tr>
  </table>

   <table>
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Savings</th>
      </tr>
      <tr>
        <td >5</td>
        <td >5</td>
        <td >5</td>
      </tr>
   </table>
  <style>
     body {
        position: relative;
        width: 600px;
        margin: 0 auto;
        }

     .sdt   {
    float: right;
    position: absolute;
    left: 70%;
    top: -16px;
    }
     p:nth-child(1) , p:nth-child(2),p:nth-child(3), p:nth-child(4),p:nth-child(5),p:nth-child(6),p:nth-child(7),p:nth-child(9){
    border-bottom:1px solid gray;
   }
   p:nth-child(4),p:nth-child(5),p:nth-child(6),p:nth-child(7){
       text-align: center;
   }
   .congty{
       display: flex;
       border-bottom:1px solid gray;
       margin-top: -14px;

   }
   .congty .sdt1{
       position: absolute;
       left: 70%;

   }
   .congty p{
    border-bottom:none;
    margin-bottom: 0px;
}
   p:nth-child(9){
       margin-top: 13px;
   }

th {
  height: 50px;
}

table, td, th {
  border: 1px solid black;
  margin-top: 20px;
  border-collapse: collapse;
  width: 600px;
}
td {

  text-align: center;
}


  </style>

</body>
</html>
