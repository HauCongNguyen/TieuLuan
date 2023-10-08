<?php
    include("../../config/config.php");
    $tennhacungcap = $_POST['tennhacungcap'];
    $diachi = $_POST['diachi'];
    $dienthoai = $_POST['dienthoai'];
    $thutu = $_POST['thutu'];
    if(isset($_POST['themnhacungcap'])){
        //them
        $sql_them = "INSERT INTO tbl_nhacungcap(tennhacungcap,diachi,dienthoai,thutu) VALUE('".$tennhacungcap."','".$diachi."','".$dienthoai."','".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        header('Location:../../index.php?action=quanlynhacungcap&query=them');
    }elseif(isset($_POST['suanhacungcap'])){
        //sua
        $sql_update = "UPDATE tbl_nhacungcap SET tennhacungcap='".$tennhacungcap."',diachi='".$diachi."',dienthoai='".$dienthoai."',thutu='".$thutu."' WHERE id ='$_GET[idncc]'";
        mysqli_query($mysqli,$sql_update);
        header('Location:../../index.php?action=quanlynhacungcap&query=them');
    }else{
        $id = $_GET['idncc'];
        $sql_xoa = "DELETE FROM tbl_nhacungcap WHERE id ='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlynhacungcap&query=them');
    }

?>