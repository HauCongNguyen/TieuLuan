<?php
	if(isset($_POST['doimatkhau'])){
		$taikhoan = $_POST['email'];
		$id = $_SESSION['id_khachhang'];
		$tenkhachhang = $_POST['tenkhachhang'];
		$old_password = md5($_POST['old_password']);
		$new_password = md5($_POST['new_password']);
		$sql = "SELECT * FROM tbl_khachhang WHERE tenkhachhang='".$tenkhachhang."' AND email='".$taikhoan."' AND matkhau='".$old_password.
		"' AND id_khachhang = $id LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		$message1 ="Đổi mật khẩu thành công";
		$message2 ="Tên khách hàng, email hoặc mật khẩu cũ không đúng,vui lòng nhập lại";
		if($count>0){
			$sql_update = mysqli_query($mysqli,"UPDATE tbl_khachhang SET matkhau='".$new_password."' WHERE tenkhachhang='".$tenkhachhang."'");
			echo "<script type='text/javascript'>alert('$message1');
			window.location.replace('index.php?quanly=giohang#main_list');</script>";	
		}else{
			echo "<script type='text/javascript'>alert('$message2');</script>";
		}
	} 
?>
<p class="content">Đổi mật khẩu
<div class="col-md-8">
           <?php
    if(isset($_SESSION['id_khachhang'])){
        $id=$_SESSION['id_khachhang'];
        $sql = "SELECT * FROM tbl_khachhang WHERE id_khachhang=$id";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
     ?>   
        <table class="table table-responsive">
                <thead>
                     <th>Tên khách hàng</th>
                     <th>Email</th>
                </thead>
                <tbody>
                       <tr>
                                <th><?php echo $row['tenkhachhang']?></th>
                                <th><?php echo $row['email']?></th>
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
</p>
<div class="btn-btn">
    <form action="" autocomplete="off" method="POST">
        <div class="container">
		<h1>Xin hãy nhập biểu mẫu bên dưới để đăng ký.</p>
            <hr>
            <label for="Tên khách hàng"><b>Tên khách hàng</b></label>
            <input type="text" placeholder="Nhập tên" name="tenkhachhang" required>
            <label for="Email"><b>Email</b></label>
            <input type="email" placeholder="Nhập email" name="email" required>
            <label for="Mật khẩu"><b>Mật khẩu cũ</b></label>
            <input type="password" placeholder="Nhập mật khẩu cũ" name="old_password" required>
            <label for="Mật khẩu"><b>Mật khẩu mới</b></label>
            <input type="password" placeholder="Nhập mật khẩu mới" name="new_password" required>
            <div class="clearfix">
                <button type="submit" name="doimatkhau" class="btn">Change</button>
            </div>
        </div>
    </form>
</div>