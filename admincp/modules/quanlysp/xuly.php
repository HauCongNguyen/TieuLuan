<?php
    include("../../config/config.php");
    $tensanpham = $_POST['tensanpham'];
    $masp = $_POST['masp'];
    $gianhap = $_POST['gianhap'];
    $giasp = $_POST['giasp'];
    $soluong = $_POST['soluong'];
    //xuly hinh anh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $sale = $_POST['sale'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];
    $nhacungcap = $_POST['nhacungcap'];
    $tenhang = $_POST['tenhang'];
    if(isset($_POST['themsanpham'])){
        //them
        $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,gianhap,giasp,soluong,hinhanh,tomtat,noidung,sale,tinhtrang,id_danhmuc,id_ncc,id_nh) 
        VALUE('".$tensanpham."','".$masp."','".$gianhap."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$sale."','".$tinhtrang."','".$danhmuc."','".$nhacungcap."','".$tenhang."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlysp&query=them');
    }elseif(isset($_POST['suasanpham'])){
        //sua
        if(!empty($_FILES['hinhanh']['name'])){
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', gianhap='".$gianhap."', giasp='".$giasp."', soluong='".$soluong."', 
            hinhanh='".$hinhanh."', tomtat='".$tomtat."', noidung='".$noidung."',sale='".$sale."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."',id_ncc ='".$nhacungcap."',id_nh ='".$tenhang."' WHERE id_sanpham='$_GET[idsanpham]'";
            //xoa hinh cũ
            $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        }else{
            $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."', masp='".$masp."', gianhap='".$gianhap."', giasp='".$giasp."', soluong='".$soluong."', 
            tomtat='".$tomtat."', noidung='".$noidung."',sale='".$sale."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."',id_ncc ='".$nhacungcap."',id_nh ='".$tenhang."' WHERE id_sanpham='$_GET[idsanpham]'";
        }
        mysqli_query($mysqli,$sql_update);
        if(isset($_GET['trang'])){
            header('Location:../../index.php?action=quanlysp&query=them&trang='.$_GET['trang'].'#list');
        }else{
            header('Location:../../index.php?action=quanlysp&query=them&trang=1#list');;
        }
    }else{
        $id = $_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";    
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlysp&query=them');
    }

?>