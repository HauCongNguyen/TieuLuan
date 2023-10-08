<?php
	include('../../config/config.php');
	require('../../../carbon/autoload.php');
	use Carbon\Carbon;
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
	if(isset($_GET['code'])){
		$code_donhang = $_GET['code'];
		$sql_update ="UPDATE tbl_donhang SET donhang_tinhtrang=0 WHERE code_donhang='".$code_donhang."'";
		$query = mysqli_query($mysqli,$sql_update);
    
		//Thong ke doanh thu
        $sql_lietke_dh = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham WHERE tbl_chitietdonhang.id_sanpham=tbl_sanpham.id_sanpham AND tbl_chitietdonhang.code_donhang='$code_donhang' ORDER BY tbl_chitietdonhang.id_chitietdonhang DESC";
        $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

        $sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydh='$now'"; 
        $query_thongke = mysqli_query($mysqli,$sql_thongke);

        $soluongmua = 0;
        $doanhthu = 0;
        while($row = mysqli_fetch_array($query_lietke_dh)){
            $id = $row['id_sanpham'];
            $id_nh = $row['id_nh'];
            $tensanpham = $row['tensanpham'];
            $soluong = $row['SoLuong'];
            $sale = $row['sale'];
            $soluongmua+=$row['SoLuong'];
            $doanhthu+=($row['giasp']-($row['giasp']*$row['sale']/100))*$row['SoLuong'];
            $trusoluongtrongkho = mysqli_query($mysqli,"UPDATE `tbl_sanpham` SET soluong = CASE 
                WHEN id_sanpham=$id then soluong-$soluong
                END WHERE id_sanpham in ($id)");
            $sql_nhaphang = "SELECT * FROM tbl_nhaphang";
            $query_nhaphang = mysqli_query($mysqli,$sql_nhaphang);
            while($row_daban = mysqli_fetch_array($query_nhaphang)){
                if($row_daban['id_nhaphang']==$id_nh){
                        $soluong1 = $row_daban['soluongdaban']+$soluong;
                        $update_soluongdaban = mysqli_query($mysqli,"UPDATE `tbl_nhaphang` SET soluongdaban = '".$soluong1."' WHERE id_nhaphang=$id_nh");
                        $update_soluongdaban1 = mysqli_query($mysqli,"UPDATE `tbl_sanpham` SET soluongdaban = '".$soluong1."' WHERE id_nh=$id_nh");
                        $loinhuan = $soluong*($row['giasp']-($row['giasp']*$row['sale']/100)-$row['gianhap'])+$row['loinhuan'];
                        $update_loinhuan = mysqli_query($mysqli,"UPDATE `tbl_sanpham` SET loinhuan = '".$loinhuan."' WHERE id_nh=$id_nh");
                    }
                }
            }
        }
        if(mysqli_num_rows($query_thongke)==0){
                $soluongban = $soluongmua;
                $doanhthu = $doanhthu;
                $sodonhang = 1;
                $sql_update_thongke = mysqli_query($mysqli,"INSERT INTO tbl_thongke(ngaydh,sodonhang,doanhthu,soluongban) VALUE('$now','$sodonhang','$doanhthu','$soluongban')" );
        }elseif(mysqli_num_rows($query_thongke)!=0){
            while($row_tk = mysqli_fetch_array($query_thongke)){
                $soluongban = $row_tk['soluongban']+$soluongmua;
                $doanhthu = $row_tk['doanhthu']+$doanhthu;
                $sodonhang = $row_tk['sodonhang']+1;
                $sql_update_thongke = mysqli_query($mysqli,"UPDATE tbl_thongke SET soluongban='$soluongban',doanhthu='$doanhthu',sodonhang='$sodonhang' WHERE ngaydh='$now'" );
            }
        }
		header('Location:../../index.php?action=quanlydonhang&query=lietke');
?>