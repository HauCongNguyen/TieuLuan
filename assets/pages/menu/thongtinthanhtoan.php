<p class="content">Hình thức thanh toán</p>
<div class="container1">
    <!-- Responsive Arrow Progress Bar -->
    <div style="font-weight: 600;" class="arrow-steps clearfix">
        <div class="step"> <span> <a href="index.php?quanly=giohang#main_list">Giỏ hàng</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=vanchuyen#main_list">Vận chuyển</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan#main_list">Thông tin thanh
                    toán</a><span>
        </div>
    </div>
<form action="assets/pages/menu/xulythanhtoan.php" method="POST">
    <div class="row"> 
        <?php 
                $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_vanchuyen WHERE id_dangky =  $_SESSION[id_khachhang] LIMIT 1");
                $count = mysqli_num_rows($sql_get_vanchuyen);
                if($count>0){
                    $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
                    $name = $row_get_vanchuyen['name'];
                    $phone = $row_get_vanchuyen['phone'];
                    $address = $row_get_vanchuyen['address'];
                    $note = $row_get_vanchuyen['note'];
                }else{
                    $name = '';
                    $phone = '';
                    $address = '';
                    $note = '';
                }
                
            ?>
        <div class="col-md-8">
            <h4 style="font-weight: 600;">Thông tin vận chuyển và giỏ hàng</h4>
            <ul>
                <li style="margin: 8px;">Họ và tên : <b><?php echo $name ?></b></li>
                <li style="margin: 8px;">Số điện thoại : <b><?php echo $phone ?></b></li>
                <li style="margin: 8px;">Địa chỉ : <b><?php echo $address ?></b></li>
                <li style="margin: 8px;">Ghi chú : <b><?php echo $note ?></b></li>
            </ul>
            <table class="table table-hover table-dark" style="width:100%;text-align: center;border-collapse: collapse;font-weight:600;" border="5">
    <tr>
        <th>Id</th>
        <th>Mã sp</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Giảm giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
  if(isset($_SESSION['cart'])){
  	$i = 0;
  	$tongtien = 0;
  	foreach($_SESSION['cart'] as $cart_item){
  		$thanhtien = $cart_item['soluong']*($cart_item['giasp']-$cart_item['giasp']*$cart_item['sale']/100);
  		$tongtien+=$thanhtien;
  		$i++;
  ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $cart_item['masp']; ?></td>
        <td><?php echo $cart_item['tensanpham']; ?></td>
        <td><img style="border-radius: 30%;" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
        <td>
            <?php echo $cart_item['soluong']; ?>
        </td>
        <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'; ?></td>
        <td><?php echo number_format($cart_item['sale']).'%' ?> (Còn: <?php echo number_format($cart_item['giasp']-$cart_item['giasp']*$cart_item['sale']/100,0,',','.').'đ'?>)</td>
        <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
    </tr>
    <?php
  	}
  ?>
    <tr>
        <td colspan="8">
            <p style="float: left;color:lightgreen;"><b>Tổng tiền: </b><?php echo number_format($tongtien,0,',','.').'vnđ' ?></p><br />
            <div style="clear: both;"></div>
        </td>
    </tr>
    <?php	
  }else{ 
  ?>
    <tr>
        <td colspan="8">
            <p><b>Hiện tại giỏ hàng trống</b></p>
        </td>

    </tr>
    <?php
  } 
  ?>
</table>
        </div>
        <style type="text/css">
            .col-md-4 .form-check {
                 margin: 11px;
}
        </style>
        <div style="font-weight: 600;" class="col-md-4 hinhthucthanhtoan">
            <h4>Phương thức thanh toán</h4>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="thanhtoan" id="exampleRadios1" value="Cash" checked>
            <label class="form-check-label" for="exampleRadios1">
            <i class="ti-money"></i> Tiền mặt
            </label>
        </div>
        <?php
            if(!isset($_SESSION['cart']) || $tongtien==0){
        ?>
        <input disabled type="submit" value="Thanh toán ngây" name="redirect" class="btn btn-danger">
        <?php
            }else{
        ?>
        <input type="submit" value="Thanh toán ngây" name="redirect" class="btn btn-danger">
        <?php
            }
        ?>
</form>
        </div>
        </div>
