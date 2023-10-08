<p class="content">Lịch sử đơn hàng</p>
<?php
  // $id_khachhang = $_SESSION['id_khachhang'];
	// $sql_lietke_dh = "SELECT * FROM tbl_donhang,tbl_khachhang WHERE tbl_donhang.id_khachhang='$id_khachhang' AND tbl_donhang.id_khachhang=tbl_khachhang.id_khachhang 
  // ORDER BY tbl_donhang.id_donhang DESC";
	// $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
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
$id_khachhang = $_SESSION['id_khachhang'];
$sql_pro = "SELECT * FROM tbl_donhang,tbl_khachhang WHERE tbl_donhang.id_khachhang='$id_khachhang' AND tbl_donhang.id_khachhang=tbl_khachhang.id_khachhang 
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
$sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_donhang,tbl_khachhang WHERE tbl_donhang.id_khachhang='$id_khachhang' AND tbl_donhang.id_khachhang=tbl_khachhang.id_khachhang");
$row_count = mysqli_num_rows($sql_trang);  
$trang = ceil($row_count/10);
?>
<p style="font-weight: 600;">Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>

<ul class="list_trang">

  <?php
        
for($i=1;$i<=$trang;$i++){ 
?>
  <li <?php if($i==$page){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a
          href="index.php?quanly=lichsudonhang&trang=<?php echo $i ?>#main_list"><?php echo $i ?></a></li>
  <?php
} 
?>

</ul>
<table style="text-align:center" class="table hover table-dark" style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Ngày đặt hàng</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
        <th>Hình thức thanh toán</th>
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
        <td><?php echo $row['diachi'] ?></td>
        <td><?php echo $row['ngaydh'] ?></td>
        <td>
            <?php if($row['donhang_tinhtrang']==1){
    		echo '<label style="
        padding: 10px 15px;
        border-radius: 4px;
        background-color: white;
        color:blue;">Đơn hàng mới</label>';
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
            <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_donhang'] ?>#main_list">Xem đơn hàng</a>
        </td>
        <td>
          <?php
            if($row['donhang_thanhtoan']=='VNPay' || $row['donhang_thanhtoan']=='MoMo'){
          ?>
          <a href="index.php?quanly=lichsudonhang&congthanhtoan=<?php echo $row['donhang_thanhtoan']?>&code_donhang=<?php echo $row['code_donhang'] ?>&trang=<?php 
            if(isset($_GET['trang'])){
              echo $_GET['trang'];
            }else{
              echo $_GET['trang']=1;
            }
            ?>#tt"><?php echo $row['donhang_thanhtoan'] ?></a>
          <?php
            }else{
          ?>
          <?php echo $row['donhang_thanhtoan'] ?>
          <?php
            }
          ?>
      </td>
    </tr>
    <?php
  } 
  ?>

</table>
<?php
  if(isset($_GET['congthanhtoan'])){
    $congthanhtoan = $_GET['congthanhtoan'];
    $code_donhang = $_GET['code_donhang'];
    echo '<p class="content">Chi tiết thanh toán qua cổng: '.$congthanhtoan.'</p>';
    if($congthanhtoan=='MoMo'){
      $sql_momo = mysqli_query($mysqli,"SELECT * FROM tbl_momo WHERE code_donhang = '$code_donhang' LIMIT 1");
      $row_momo = mysqli_fetch_array($sql_momo);
  ?>
  <div class="col-md-8">
           <?php
    if(isset($_SESSION['id_khachhang'])){
        $id=$_SESSION['id_khachhang'];
        $sql = "SELECT * FROM tbl_khachhang WHERE id_khachhang=$id";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
     ?>   
        <h1 style="font-weight:700;font-size:24px;color:#009999">Thông Tin Khách Hàng</h1>
        <table class="table table-striped">
                <thead>
                     <th>Tên khách hàng</th>
                     <th>Email</th>
                     <th>Địa Chỉ</th>
                     <th>Số Điện Thoại</th>
                </thead>
                <tbody>
                       <tr>
                                <th><?php echo $row['tenkhachhang']?></th>
                                <th><?php echo $row['email']?></th>
                                <th><?php echo $row['diachi']?></th>
                                <th><?php echo '0'.$row['dienthoai']?></th>
                        </tr>
                       <?php
        }
                       ?>
                </tbody>
        </table> 
    <?php
    }
    ?>
           </div>
     <table id="tt" class="table table-dark">
                <thead>
                     <th>PARTNERCODE</th>
                     <th>ORDERID</th>
                     <th>AMOUNT</th>
                     <th>ORDERINFO</th>
                     <th>ORDERTYPE</th>
                     <th>TRANSID</th>
                     <th>PAYTYPE</th>
                     <th>CODE_DONHANG</th>
                </thead>
                <tbody>
                       <tr>
                                <td><?php echo $row_momo['partnercode']?></td>
                                <td><?php echo $row_momo['orderid']?></td>
                                <td><?php echo $row_momo['amount']?></td>
                                <td><?php echo $row_momo['orderinfo']?></td>
                                <td><?php echo $row_momo['ordertype']?></td>
                                <td><?php echo $row_momo['transid']?></td>
                                <td><?php echo $row_momo['paytype']?></td>
                                <td><?php echo $row_momo['code_donhang']?></td>
                        </tr>
                </tbody>
        </table>
  <?php
    }elseif($congthanhtoan=='VNPay'){
      $sql_vnpay = mysqli_query($mysqli,"SELECT * FROM tbl_vnpay WHERE code_donhang = '$code_donhang' LIMIT 1");
      $row_vnpay = mysqli_fetch_array($sql_vnpay);
  ?>
  <div class="col-md-8">
           <?php
    if(isset($_SESSION['id_khachhang'])){
        $id=$_SESSION['id_khachhang'];
        $sql = "SELECT * FROM tbl_khachhang WHERE id_khachhang=$id";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
     ?>   
        <h1 style="font-weight:700;font-size:24px;color:#009999">Thông Tin Khách Hàng</h1>
        <table class="table table-striped">
                <thead>
                     <th>Tên khách hàng</th>
                     <th>Email</th>
                     <th>Địa Chỉ</th>
                     <th>Số Điện Thoại</th>
                </thead>
                <tbody>
                       <tr>
                                <th><?php echo $row['tenkhachhang']?></th>
                                <th><?php echo $row['email']?></th>
                                <th><?php echo $row['diachi']?></th>
                                <th><?php echo '0'.$row['dienthoai']?></th>
                        </tr>
                       <?php
        }
                       ?>
                </tbody>
        </table> 
    <?php
    }
    ?>
           </div>
   <table id="tt" class="table table-dark">
                <thead>
                     <th>VNP_AMOUNT</th>
                     <th>VNP_BANKCODE</th>
                     <th>VNP_BANKTRANNO</th>
                     <th>VNP_CARDTYPE</th>
                     <th>VNP_ORDERINFO</th>
                     <th>VNP_PAYDATE</th>
                     <th>VNP_TMNCODE</th>
                     <th>VNP_TRANSACTIONNO</th>
                     <th>CODE_DONHANG</th>
                </thead>
                <tbody>
                       <tr>
                                <td><?php echo $row_vnpay['vnp_amount']?></td>
                                <td><?php echo $row_vnpay['vnp_bankcode']?></td>
                                <td><?php echo $row_vnpay['vnp_banktranno']?></td>
                                <td><?php echo $row_vnpay['vnp_cardtype']?></td>
                                <td><?php echo $row_vnpay['vnp_orderinfo']?></td>
                                <td><?php echo $row_vnpay['vnp_paydate']?></td>
                                <td><?php echo $row_vnpay['vnp_tmncode']?></td>
                                <td><?php echo $row_vnpay['vnp_transactionno']?></td>
                                <td><?php echo $row_vnpay['code_donhang']?></td>
                        </tr>
                </tbody>
        </table>
  <?php
  }
}
  ?>
