<?php
    include("../../config/config.php");
    use Carbon\Carbon;
    require('../../../carbon/autoload.php');
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $tensanpham = $_POST['tensanpham'];
    $gianhap = $_POST['gianhap'];
    $soluong1 = $_POST['soluong1'];
    //xuly hinh anh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $tinhtrang = $_POST['tinhtrang'];
    $nhacungcap = $_POST['nhacungcap'];
    $danhmuc = $_POST['danhmuc'];
    if(isset($_POST['themnhaphang'])){
        //them
        $sql_them = "INSERT INTO tbl_nhaphang(tensanpham,ngaynhap,gianhap,soluong1,hinhanh,tinhtrang,id_ncc,id_danhmuc) 
        VALUE('".$tensanpham."','".$now."','".$gianhap."','".$soluong1."','".$hinhanh."','".$tinhtrang."','".$nhacungcap."','".$danhmuc."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlynhaphang&query=them');
    }elseif(isset($_POST['suanhaphang'])){
        //sua
        if(!empty($_FILES['hinhanh']['name'])){
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql_update = "UPDATE tbl_nhaphang SET tensanpham='".$tensanpham."', gianhap='".$gianhap."', soluong1='".$soluong1."', 
            hinhanh='".$hinhanh."',tinhtrang='".$tinhtrang."',id_ncc ='".$nhacungcap."',id_danhmuc ='".$danhmuc."' WHERE id_nhaphang='$_GET[idnhaphang]'";
            //xoa hinh cũ
            $sql = "SELECT * FROM tbl_nhaphang WHERE id_nhaphang = '$_GET[idnhaphang]' LIMIT 1";
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        }else{
            $sql_update = "UPDATE tbl_nhaphang SET tensanpham='".$tensanpham."', gianhap='".$gianhap."', soluong1='".$soluong1."', tinhtrang='".$tinhtrang."',id_ncc ='".$nhacungcap."',id_danhmuc ='".$danhmuc."' WHERE id_nhaphang='$_GET[idnhaphang]'";
        }
        mysqli_query($mysqli,$sql_update);
        if(isset($_GET['trang'])){
            header('Location:../../index.php?action=quanlynhaphang&query=them&trang='.$_GET['trang'].'#list1');
        }else{
            header('Location:../../index.php?action=quanlynhaphang&query=them&trang=1#list1');;
        }
    }else{
        $id = $_GET['idnhaphang'];
        $sql = "SELECT * FROM tbl_nhaphang WHERE id_nhaphang = '$id' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tbl_nhaphang WHERE id_nhaphang='".$id."'";    
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlynhaphang&query=them');
    }

?>