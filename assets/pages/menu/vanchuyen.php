<p class="content">Thông tin vận chuyển</p>
<div class="container1">
    <!-- Responsive Arrow Progress Bar -->
    <div style="font-weight: 600;" class="arrow-steps clearfix">
        <div class="step"> <span> <a href="index.php?quanly=giohang#main_list">Giỏ hàng</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=vanchuyen#main_list">Vận chuyển</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan#main_list">Thông tin thanh toán</a><span>
        </div>
    </div>
    <h4> Thông tin vận chuyển</h4>
    <?php
        if(isset($_POST['themvanchuyen'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            $id_dangky = $_SESSION['id_khachhang'];
            $sql_insert_vanchuyen = "INSERT INTO tbl_vanchuyen(name,phone,address,note,id_dangky) VALUES('$name','$phone','$address','$note','$id_dangky')";
            mysqli_query($mysqli,$sql_insert_vanchuyen);
            if($sql_insert_vanchuyen){
                echo '<script>alert("Thêm vận chuyển thành công")</script>';
            }
        }elseif(isset($_POST['capnhatvanchuyen'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            $id_dangky = $_SESSION['id_khachhang'];
            $sql_update_vanchuyen = "UPDATE tbl_vanchuyen SET name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'";
            mysqli_query($mysqli,$sql_update_vanchuyen);
            if($sql_update_vanchuyen){
                echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
            }
        }
    ?>
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
        <div class="col-md-4" style="margin: 5px;font-weight:600;">
            <form action="" autocomplete="off" method="POST">
                <div class="form-group">
                    <label for="email">Họ và tên</label>
                    <input type="text" name="name" value="<?php echo $name ?>" class="form-control" placeholder="...">
                </div>
                <div class="form-group">
                    <label for="email">Điện thoại</label>
                    <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control" placeholder="...">
                </div>
                <div class="form-group">
                    <label for="email">Địa chỉ</label>
                    <input type="text" name="address" value="<?php echo $address ?>" class="form-control"
                        placeholder="...">
                </div>
                <div class="form-group">
                    <label for="email">Ghi chú</label>
                    <input type="text" name="note" value="<?php echo $note ?>" class="form-control" placeholder="...">
                </div>
                <?php
                if($name=='' && $phone==''){
                ?>
                <button type="submit" name="themvanchuyen" class="btn btn-success">Thêm vận chuyển</button>
                <?php
                }else{
                ?>
                <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập nhật vận chuyển</button>
                <?php
                }
                ?>
            </form>
        </div>
        <!------------------------------Giỏ hàng------------------------------->
        <?php
            if(!isset($_SESSION['cart'])){
                echo "<script>alert('Vui lòng thêm sản phẩm vào giỏ hàng')
                window.location.replace('index.php?quanly=giohang#main_list');
                </script>";
            }
        ?>
        <table class="table table-hover table-dark" style="width:100%;text-align: center;border-collapse: collapse;font-weight:600;"
            border="5">
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
                <td><img style="border-radius: 30%;" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px">
                </td>
                <td><?php echo $cart_item['soluong']; ?></td>
                <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'; ?></td>
                <td><?php echo number_format($cart_item['sale']).'%' ?> (Còn: <?php echo number_format($cart_item['giasp']-$cart_item['giasp']*$cart_item['sale']/100,0,',','.').'đ'?>)</td>
                <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
            </tr>
            <?php
  	}
  ?>
            <tr>
                <td colspan="8">
                    <p style="float: left;color:lightgreen;"><b>Tổng tiền: </b><?php echo number_format($tongtien,0,',','.').'vnđ' ?>
                    </p>
                    <br />
                    <div style="clear: both;"></div>
                    <?php
        if(isset($_SESSION['dangky'])){
          ?>
                    <p><a href="index.php?quanly=thongtinthanhtoan#main_list"><i class="ti-credit-card"></i> <b>Hình thức thanh toán</b></a></p>
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
    </div>
</div>