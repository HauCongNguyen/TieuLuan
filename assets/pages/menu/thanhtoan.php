<?php

use Carbon\Carbon;

session_start();
	include('../../../admincp/config/config.php');
	require("../../../carbon/autoload.php");
	$id_khachhang = $_SESSION['id_khachhang'];
	$code_donhang = rand(0,9999);
	$now = Carbon::now('Asia/Ho_Chi_Minh');
	$insert_giohang = "INSERT INTO tbl_donhang(id_khachhang,code_donhang,ngaydh,donhang_tinhtrang) VALUE('".$id_khachhang."','".$code_donhang."','".$now."',1)";
	$giohang_query = mysqli_query($mysqli,$insert_giohang);
	if($giohang_query){
		//Thêm chi tiết giỏ hàng
		foreach($_SESSION['cart'] as $key => $value){
			$id_sanpham = $value['id'];
			$soluong = $value['soluong'];
			$giamgia = $value['sale'];
			$insert_donhang = "INSERT INTO tbl_chitietdonhang(id_sanpham,code_donhang,soluong,sale) 
			VALUE('".$id_sanpham."','".$code_donhang."','".$soluong."','".$giamgia."')";
			mysqli_query($mysqli,$insert_donhang);
		}
	}
	unset($_SESSION['cart']);
	header('Location:../../../index.php?quanly=thanks#main_list');

?>