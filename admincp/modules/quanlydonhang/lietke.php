<p class="content1" style="width:98.8%; height:40px; background-color:rgb(235, 231, 231);text-align:center;font-size:30px;font-weight:600;line-height:40px;margin: 20px 10px;">Liệt kê đơn hàng</p>
<!-- <?php
	$sql_lietke_dh = "SELECT * FROM tbl_donhang,tbl_khachhang WHERE tbl_donhang.id_khachhang=tbl_khachhang.id_khachhang 
  ORDER BY tbl_donhang.id_donhang DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?> -->
<?php
if(isset($_GET['trang'])){
  $page = $_GET['trang'];
}else{
  $page = 1;
}
if($page == '' || $page == 1){
  $begin = 0;
}else{
  $begin = ($page-1)* 10;
}
$sql_pro = "SELECT * FROM tbl_donhang,tbl_khachhang WHERE tbl_donhang.id_khachhang=tbl_khachhang.id_khachhang 
ORDER BY tbl_donhang.id_donhang DESC LIMIT $begin,10";
$query_pro = mysqli_query($mysqli,$sql_pro);

?>
<div style="clear:both;"></div>
<style type="text/css">
ul.list_trang {
  padding: 0;
  margin: 0;
  list-style: none;
}

ul.list_trang li {
  float: left;
  padding: 5px 13px;
  margin: 5px;
  background: burlywood;
  display: block;
  border-radius: 50%
}

ul.list_trang li:hover {
  background-color: gray;
}

ul.list_trang li a {
  color: #000;
  text-align: center;
  text-decoration: none;
  font-size: 20px;
}
</style>
<?php
$sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_donhang,tbl_khachhang WHERE tbl_donhang.id_khachhang=tbl_khachhang.id_khachhang");
$row_count = mysqli_num_rows($sql_trang);  
$trang = ceil($row_count/10);
?>
<p style="font-weight: 600;">Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>

<ul class="list_trang">

  <?php
        
for($i=1;$i<=$trang;$i++){ 
?>
  <li <?php if($i==$page){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a
          href="index.php?action=quanlydonhang&query=lietke&trang=<?php echo $i ?>#list2"><?php echo $i ?></a></li>
  <?php
} 
?>

</ul>
<table id="list2" style="text-align:center" class="table table-hover table-dark" style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Ngày đặt hàng</th>
        <th>Hình thức thanh toán</th>
        <th>Tình trạng</th>
        <th>Xem đơn hàng</th>
        <th>In đơn hàng</th>
    </tr>
    <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_pro)){
  	$i++;
  ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['code_donhang'] ?></td>
        <td><?php echo $row['tenkhachhang'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo '0'.number_format($row['dienthoai'],0,',','.')?></td>
        <td><?php echo $row['ngaydh'] ?></td>
        <td><p style="text-align:center ;padding: 10px 15px; border-radius: 4px; background-color: #0062cc; color:aliceblue;"><?php echo $row['donhang_thanhtoan'] ?></p></td>
        <td>
            <?php if($row['donhang_tinhtrang']==1){
    		echo '<a style="
          padding: 10px 15px;
          border-radius: 4px;
          background-color: white; " href="modules/quanlydonhang/xuly.php?code='.$row['code_donhang'].'">Đơn hàng mới</a>';
    	}else{
    		echo '<label style="
        padding: 10px 15px;
        border-radius: 4px;
        background-color: green;
    ">Đã xử lý</label>';
    	}
    	?>
        </td>
        <td>
            <a style="padding: 10px 15px; border-radius: 4px; background-color: orange; color:aliceblue;" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_donhang'] ?>"><i class="ti-bookmark"></i></a>
        </td>
        <td>
            <a style="padding: 10px 15px; border-radius: 4px; background-color: orange; color:aliceblue;" href="modules/quanlydonhang/indonhang.php?code=<?php echo $row['code_donhang'] ?>"><i class="ti-printer"></i></a>
        </td>
    </tr>
    <?php
  } 
  ?>

</table>