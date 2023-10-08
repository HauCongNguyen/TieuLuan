<?php
	if(isset($_POST['dangky'])) {
		$tenkhachhang = $_POST['hovaten'];
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		$matkhau = md5($_POST['matkhau']);
		$diachi = $_POST['diachi'];
		$query = "SELECT * FROM tbl_khachhang WHERE tenkhachhang='".$tenkhachhang."'";
		$row = mysqli_query($mysqli,$query);
		$count = mysqli_num_rows($row);
		$message ="Tên khách hàng đã tồn tại, vui lòng nhập tên khác.";
		if ($count!=0) {
			echo "<script type='text/javascript'>alert('$message');</script>";
		}else{
		$sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_khachhang(tenkhachhang,email,diachi,matkhau,dienthoai) 
		VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
			if($sql_dangky){
				echo'<p style="color:green">Bạn đã đăng ký thành công</p>';
				$_SESSION['dangky'] = $tenkhachhang;
				$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
				header('Location:index.php?quanly=giohang');
			}
		}
	}
?>
<p class="content">Đăng ký thành viên</p>
<div class="btn-btn">
    <form action="" method="POST">
        <div class="container">
            <h1>Xin hãy nhập biểu mẫu bên dưới để đăng ký.</p>
                <hr>
                <label for="Họ và tên"><b>Họ và tên</b></label>
                <input type="text" placeholder="Nhập họ và tên" name="hovaten" required>
                <label for="Email"><b>Email</b></label>
                <input type="email" placeholder="Nhập email" name="email" required>
                <label for="Điện thoại"><b>Điện thoại</b></label>
                <input type="text" placeholder="Điện thoại" name="dienthoai" required>
                <label for="Địa chỉ"><b>Địa chỉ</b></label>
                <input type="text" placeholder="Nhập địa chỉ" name="diachi" required>
                <label for="Mật khẩu"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Nhập mật khẩu" name="matkhau" required>
                <div class="clearfix">
                    <label><a href="index.php?quanly=dangnhap#main_list">Đăng nhập(nếu có tài khoản!!!)</a></label>
                    <button id="dangky" type="submit" name="dangky" class="btn">Đăng ký</button>
                </div>
        </div>
    </form>
</div>