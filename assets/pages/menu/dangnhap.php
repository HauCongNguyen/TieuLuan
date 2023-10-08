<?php
	if(isset($_POST['dangnhap'])){
		$email = $_POST['email'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_khachhang WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		$message ="Mật khẩu hoặc email không đúng,vui lòng nhập lại.";
		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['dangky'] = $row_data['tenkhachhang'];
			$_SESSION['id_khachhang'] = $row_data['id_khachhang'];
			unset($_SESSION['cart']);
			header("Location:index.php?quanly=giohang");
		}else{
			echo "<script type='text/javascript'>alert('$message');</script>";	
		}
	} 
?>
<p class="content">Đăng nhập thành viên</p>
<div class="btn-btn">
    <form action="" autocomplete="off" method="POST">
        <div class="container">
            <hr>
            <label for="Email"><b>Email</b></label>
            <input type="email" placeholder="Nhập email" name="email" required>
            <label for="Mật khẩu"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" name="password" required>
            <div class="clearfix">
                <button type="submit" name="dangnhap" class="btn">Đăng nhập</button>
            </div>
        </div>
    </form>
</div>