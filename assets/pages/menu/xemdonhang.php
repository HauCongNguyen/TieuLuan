<p class="content">Xem đơn hàng</p>
<?php
	$code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham,tbl_donhang,tbl_khachhang WHERE tbl_chitietdonhang.id_sanpham=tbl_sanpham.id_sanpham 
    AND tbl_chitietdonhang.code_donhang='".$code."' AND tbl_chitietdonhang.code_donhang=tbl_donhang.code_donhang AND tbl_donhang.id_khachhang=tbl_khachhang.id_khachhang ORDER BY tbl_chitietdonhang.id_chitietdonhang DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
    
?>
          <div class="col-md-8">
           <?php
        $code = $_GET['code'];
        $sql = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham,tbl_donhang,tbl_khachhang,tbl_vanchuyen WHERE tbl_chitietdonhang.id_sanpham=tbl_sanpham.id_sanpham 
        AND tbl_chitietdonhang.code_donhang='".$code."' AND tbl_chitietdonhang.code_donhang=tbl_donhang.code_donhang AND tbl_donhang.id_khachhang=tbl_khachhang.id_khachhang AND tbl_khachhang.id_khachhang=tbl_vanchuyen.id_dangky ORDER BY tbl_chitietdonhang.id_chitietdonhang DESC LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
     ?>   
        <h1 style="font-weight:700;font-size:24px;color:#009999">Thông Tin Vận Chuyển</h1>
        <table class="table table-striped">
                <thead>
                     <th>Tên khách hàng</th>
                     <th>Số điện thoại</th>
                     <th>Địa Chỉ</th>
                     <th>Ghi chú</th>
                </thead>
                <tbody>
                       <tr>
                                <th><?php echo $row['name']?></th>
                                <th><?php echo $row['phone']?></th>
                                <th><?php echo $row['address']?></th>
                                <th><?php echo $row['note']?></th>
                        </tr>
                       <?php
        }
                       ?>
                </tbody>
        </table> 
           </div>
           <h1 style="font-weight:700;margin-left:15px;font-size:24px;color:#009999">Chi tiết đơn hàng</h1>
<table style="text-align:center" class="table table-hover table-dark" style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Giảm giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
  $i = 0;
  $tongtien = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  	$thanhtien = ($row['giasp']-$row['giasp']*$row['sale']/100)*$row['SoLuong'];
  	$tongtien += $thanhtien ;
  ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['code_donhang'] ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><?php echo $row['SoLuong'] ?></td>
        <td><?php echo number_format($row['giasp'],0,',','.').'đ' ?></td>
        <td><?php echo number_format($row['giasp']-$row['giasp']*$row['sale']/100,0,',','.').'đ'?> ( <?php echo number_format($row['sale']).'%'?> )</td>
        <td><?php echo number_format($thanhtien,0,',','.').'đ' ?></td>
    </tr>
    <?php
  } 
  ?>
    <tr>
        <td style="text-align:right;font-weight:700;color:lightgreen" colspan="9">
            <p>Tổng tiền : <?php echo number_format($tongtien,0,',','.').'đ' ?></p>
        </td>
    </tr>
</table>