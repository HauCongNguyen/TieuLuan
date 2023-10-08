<?php
	session_start();
	include('config/config.php');
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['username'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 2";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
        $message ="Tài khoản hoặc mật khẩu không đúng,vui lòng nhập lại.";
		if($count>0){
			$_SESSION['dangnhap'] = $taikhoan;
			header("Location:index.php");
		}else{
            echo "<script type='text/javascript'>alert('$message');</script>";
		}
	} 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập CTU VEGETABLES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styleadmincp.css" rel="stylesheet">
    <link rel="icon"
        href="https://as2.ftcdn.net/v2/jpg/01/89/93/15/500_F_189931538_5U6zWS544KbTAWHCf2TbKvCEoOcWjHqe.jpg"
        type="image/x-icon" />
</head>

<body>
    <form action="" autocomplete="off" method="POST">
        <header>
            <div class="container">
            </div>
        </header>
        <main>
            <div class="container">
                <div class="login-form">
                    <form action="" method="post">
                        <h1>Đăng nhập CTU VEGETABLES</h1>
                        <div class="input-box">
                            <i></i>
                            <input type="text" name="username" placeholder="Nhập username">
                        </div>
                        <div class="input-box">
                            <i></i>
                            <input type="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="btn-box">
                            <button type="submit" name="dangnhap">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <div class="container">
            </div>
        </footer>
    </form>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>