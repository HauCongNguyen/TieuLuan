<?php

use Carbon\Carbon;

session_start();
	include('../../../admincp/config/config.php');
	require("../../../carbon/autoload.php");
	$id_khachhang = $_SESSION['id_khachhang'];
	$code_donhang = rand(0,9999);
	$donhang_thanhtoan = $_POST['thanhtoan'];
    
    //lay id thong tin van chuyen
    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_vanchuyen WHERE id_dangky =  $_SESSION[id_khachhang] LIMIT 1");
    $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
    $id_vanchuyen = $row_get_vanchuyen['id_vanchuyen'];
	$tongtien = 0;
	foreach($_SESSION['cart'] as $key => $value){
		$thanhtien = $value['soluong']*($value['giasp']-$value['giasp']*$value['sale']/100);
  		$tongtien+=$thanhtien;
	}
	if($donhang_thanhtoan == 'Cash' || $donhang_thanhtoan == 'Banking'){
		//Them vao gio hang
		$now = Carbon::now('Asia/Ho_Chi_Minh');
		$insert_giohang = "INSERT INTO tbl_donhang(id_khachhang,code_donhang,ngaydh,donhang_tinhtrang,donhang_thanhtoan,donhang_vanchuyen) VALUE('".$id_khachhang."','".$code_donhang."','".$now."',1,'".$donhang_thanhtoan."','".$id_vanchuyen."')";
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
		header('Location:../../../index.php?quanly=thanks2#main_list');
	}
?>