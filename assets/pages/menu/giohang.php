<p class="content">CTU VEGETABLES
    <?php
  if(isset($_SESSION['dangky'])){
    echo 'xin chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span>'; 
  } 
  ?>
</p>
<?php
	if(isset($_SESSION['cart'])){
		
	}
?>
<?php
  if(isset($_SESSION['id_khachhang'])){
?>
<div class="container1">
    <!-- Responsive Arrow Progress Bar -->
    <div style="font-weight: 600;" class="arrow-steps clearfix">
        <div class="step current"> <span> <a href="index.php?quanly=giohang#main_list">Giỏ hàng</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=vanchuyen#main_list">Vận chuyển</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan#main_list">Thông tin thanh toán</a><span>
        </div>
    </div>
</div>
<p></p>
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
<?php
  }
?>
<form action="" method="POST">
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
        <th>Quản lý</th>
    </tr>
    <?php
  if(isset($_SESSION['cart'])){
  	$i = 0;
  	$tongtien = 0;
  	foreach($_SESSION['cart'] as $cart_item){
      // if(isset($_POST['capnhatsoluong'])){
      //   for($i=0;$i<count($_POST['product_id']);$i++){  
      //       $product_id = $_POST['product_id'][$i];
      //       $soluong = $_POST['soluong'][$i];
      //       if($cart_item['id']==$product_id){
      //         $cart_item['soluong'] = $soluong;
      //       }
      //   }
      // }
      // print_r($cart_item['soluong']);
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
            <a href="assets/pages/menu/themgiohang.php?cong=<?php echo $cart_item['id'] ?>#main_list"><i
                    class="fa fa-plus fa-style" aria-hidden="true"></i></a>   
            <input style="width: 40px;text-align:center;" type="number" min="1" name="soluong[]" value="<?php echo $cart_item['soluong']?>">        
            <input type="hidden" name="product_id[]" value="<?php echo $cart_item['id']?>">        
            <a href="assets/pages/menu/themgiohang.php?tru=<?php echo $cart_item['id'] ?>#main_list"><i
                    class="fa fa-minus fa-style" aria-hidden="true"></i></a>
        </td>
        <td><?php echo number_format($cart_item['giasp'],0,',','.').'đ'; ?></td>
        <td><?php echo number_format($cart_item['sale']).'%' ?> (Còn: <?php echo number_format($cart_item['giasp']-$cart_item['giasp']*$cart_item['sale']/100,0,',','.').'đ'?>)</td>
        <td><?php echo number_format($thanhtien,0,',','.').'đ' ?></td>
        <td><a href="assets/pages/menu/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>#main_list"><i class="ti-close"></i></a></td>
    </tr>
    <?php
  	}
  ?>
    <tr>
        <td colspan="8">
            <p style="float: left;color:lightgreen;"><b>Tổng tiền: </b><?php echo number_format($tongtien,0,',','.').'đ' ?></p><br />
            <p style="float: right;"><a href="assets/pages/menu/themgiohang.php?xoatatca=1#main_list"><b><i class="ti-trash"></i></b></a></p>
            <div style="clear: both;"></div>
            <?php
        if(isset($_SESSION['dangky'])){
          ?>
            <p><a href="index.php?quanly=vanchuyen#main_list"><b><i class="ti-truck"></i> Hình thức vận chuyển</b></a></p>
            <!-- <input type="submit" class="btn btn-success" value="Cập nhật giỏ hàng" name="capnhatsoluong"> -->
            <?php
        }else{
      ?>
            <p><a href="index.php?quanly=dangky#main_list"><b>Đăng ký đặt hàng</b></a></p>
            <?php
        }
      ?>
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
</form>