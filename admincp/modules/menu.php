<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangnhap']);
		header('Location:login.php');
	}
?>
<div id="header_admincp">
    <ul id="menu_admincp">
        <li><a href="index.php#chart"><b>Thống kê</b></a></li>
        <li><a href="index.php?action=quanlydanhmucsanpham&query=them"><b>Danh mục sản phẩm</b></a></li>
        <li><a href="index.php?action=quanlynhacungcap&query=them"><b>Nhà cung cấp</b></a></li>
        <li><a href="index.php?action=quanlynhaphang&query=them"><b>Nhập hàng</b></a></li>
        <li><a href="index.php?action=quanlysp&query=them"><b>Sản phẩm</b></a></li>
        <li><a href="index.php?action=quanlythanhvien&query=them"><b>Thành viên</b></a></li>
        <li>
        <a>
            More
            <i class="nav-arrow-down ti-angle-double-down"></i>
        </a>
        <ul class="submenu">
            <li><a href="index.php?action=quanlydonhang&query=lietke">Đơn hàng</a></li>
            <li>
                <a style="color: red;" href="index.php?dangxuat=1">Đăng xuất</a>
            </li>
        </ul>
    </li>
    </ul>
</div>
<style>
    #header_admincp li:hover .submenu {
        display: block;
    }

    #header_admincp > li:hover > a,
    #header_admincp .submenu li:hover a {
        color: #000;
        background-color: #ccc;
    }
    #header_admincp .submenu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fff;
        box-shadow: 0 0 10px rgb(0 0 0 / 30%);
    }
    #header_admincp .submenu a {
        color: #000;
        padding: 3px 20px;
        line-height: 38px;
    }

</style>