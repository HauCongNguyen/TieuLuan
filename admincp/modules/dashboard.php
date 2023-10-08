<div id="slider_admincp">
    <div class="text-content">
        <h2 class="text-heading"  style="color: black;">CTU VEGETABLES</h2>
        <div class="text-discription" style="color: black;">Nguyễn Lê Đoan Thùy</div>
    </div>
</div>
<p class="content">Thống kê</p>

<p><div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span style="background-color: #d39e00;" class="input-group-text" id="inputGroup-sizing-sm">Thống kê theo</span>
    <span class="input-group-text" id="inputGroup-sizing-sm"><span style="font-weight: 700;" id="text-date"></span></span>
  </div>
</div></p>
<p>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label style="background-color: #d39e00;" class="input-group-text" for="inputGroupSelect01">Options</label>
  </div>
    <select class="custom-select">
    <option>--Select date--</option>
    <option value="1ngay">Hôm nay</option>
        <option value="7ngay">7 ngày qua</option>
        <option value="28ngay">28 ngày qua</option>
        <option value="90ngay">90 ngày qua</option>
        <option value="365ngay">365 ngày qua</option>
    </select>
</div>
</p>
<?php
     $sql_khachhang = "SELECT * FROM tbl_khachhang";
     $query_khachhang = mysqli_query($mysqli,$sql_khachhang);
     $count = mysqli_num_rows($query_khachhang);
     $sql_donhang = "SELECT * FROM tbl_donhang WHERE donhang_tinhtrang=0";
     $query_donhang = mysqli_query($mysqli,$sql_donhang);
     $count1 = mysqli_num_rows($query_donhang);
     $sql_donhang1 = "SELECT * FROM tbl_donhang";
     $query_donhang1 = mysqli_query($mysqli,$sql_donhang1);
     $count2 = mysqli_num_rows($query_donhang1);
?>
<div class="thongke" style="margin-top:60px; margin-bottom:60px;">
    <i style="font-size: 80px;font-weight:500;margin: 80px 80px;" class="ti-bag"><a href="index.php?action=quanlydonhang&query=lietke" style="font-size:20px;background-color: lightgreen;border-radius: 80%; padding: 15px;"><?php echo $count2?> Đơn hàng</a></i>
    <i style="font-size: 80px;font-weight:500; margin: 80px 80px;" class="ti-truck"><a style="font-size:20px;background-color: lightgreen; margin-left: 5px; border-radius: 80%; padding: 15px;"><?php echo $count1?> Đã giao</a></i>
    <i style="font-size: 80px;font-weight:500; margin: 80px 80px;" class="ti-user"><a href="index.php?action=quanlythanhvien&query=them" style="font-size:20px;background-color: lightgreen; margin-left: 5px; border-radius: 80%; padding: 15px;"><?php echo $count?> Thành viên</a></i>
</div>
<div id="chart" style="height: 250px;background-color: white"></div>
