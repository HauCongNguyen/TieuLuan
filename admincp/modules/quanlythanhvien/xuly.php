<?php
    include("../../config/config.php");
    $tenthanhvien = $_POST['tenthanhvien'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $matkhau = md5($_POST['matkhau']);
    $dienthoai = $_POST['dienthoai'];
    if(isset($_POST['themthanhvien'])){
        //them
        $sql_them = "INSERT INTO tbl_khachhang(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenthanhvien."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')";
        mysqli_query($mysqli,$sql_them);
        header('Location:../../index.php?action=quanlythanhvien&query=them');
    }elseif(isset($_POST['suathanhvien'])){
        //sua
        $sql_update = "UPDATE tbl_khachhang SET tenkhachhang='".$tenthanhvien."',email='".$email."',diachi='".$diachi."',matkhau='".$matkhau."',dienthoai='".$dienthoai."' WHERE id_khachhang ='$_GET[idkhachhang]'";
        mysqli_query($mysqli,$sql_update);

        header('Location:../../index.php?action=quanlythanhvien&query=them');
    }else{
        $id = $_GET['idkhachhang'];
        $sql_xoa = "DELETE FROM tbl_khachhang WHERE id_khachhang ='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlythanhvien&query=them');
    }

?>