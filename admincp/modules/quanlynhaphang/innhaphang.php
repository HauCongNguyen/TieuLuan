<?php
    require('../../../tfpdf/tfpdf.php');
    include('../../config/config.php');
    use Carbon\Carbon;
    require('../../../carbon/autoload.php');
	session_start();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
    $pdf = new tFPDF();
    $pdf->AddPage("0");
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',14);

    $pdf->SetFillColor(0,255,255);

    //Set header
    // $id_admin = $_SESSION['dangnhap'];
	// $sql_lietke_dh = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham,tbl_donhang WHERE tbl_chitietdonhang.id_sanpham=tbl_sanpham.id_sanpham 
    // AND tbl_chitietdonhang.code_donhang='".$code."' AND tbl_chitietdonhang.code_donhang=tbl_donhang.code_donhang ORDER BY tbl_chitietdonhang.id_chitietdonhang DESC";
	// $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
	$ten = $_SESSION['dangnhap'];
	$code_nhaphang = rand(10000,999999);
    $sql_lietke_nh = "SELECT * FROM tbl_nhaphang,tbl_nhacungcap,tbl_danhmuc WHERE tbl_nhaphang.id_ncc =tbl_nhacungcap.id AND tbl_nhaphang.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_nhaphang.ngaynhap='".$now."' ORDER BY id_nhaphang DESC";
    $query_lietke_nh = mysqli_query($mysqli,$sql_lietke_nh);
	$sql_admin = "SELECT * FROM tbl_admin WHERE username = '$ten'";
	$query_admin = mysqli_query($mysqli,$sql_admin);

	$pdf->Write(10,'                                                                                 GEMSTONE SHOP                                              ');
	$pdf->Ln(10);
	$pdf->Write(10,'                                 Địa chỉ: 35/37 Ngô Thì Nhậm, phường An Khánh, quận Ninh Kiều, TP Cần Thơ');
	$pdf->Ln(10);
	$pdf->Write(10,'                                                                               SĐT: 0946.850.747');
	$pdf->Ln(15);
	$pdf->Write(10,'                                                                              HÓA ĐƠN NHẬP HÀNG');
	$pdf->Ln(5);
	$i = 0;
	while($row1 = mysqli_fetch_array($query_admin)){
		$i++;
	$pdf->Cell(59 ,7,'',0,1);
    $pdf->Write(5,'Mã đơn hàng:  #');
	$pdf->Cell(130,5,$code_nhaphang,0,0);
	$pdf->Cell(59 ,8,'',0,1);
    $pdf->Write(5,'Date:  ');
	$pdf->Cell(130,5,$now,0,0);
	$pdf->Cell(59 ,8,'',0,1);
	$pdf->Write(5,'Nhân viên:  ');
	$pdf->Cell(130,5,$ten,0,0);
	$pdf->Cell(59 ,8,'',0,1);
	// $pdf->Write(5,'Địa chỉ:  ');
	// $pdf->Cell(130,5,$row1['address'],0,0);
	// $pdf->Cell(59 ,8,'',0,1);
	// $pdf->Write(5,'Email:  ');
	// $pdf->Cell(130,5,$row1['email'],0,0);
	// $pdf->Cell(59 ,8,'',0,1);
	$pdf->Write(5,'Số điện thoại:  ');
	$pdf->Cell(130,5,'0'.number_format($row1['sdt'],0,',','.'),0,1);
	$pdf->Cell(59 ,5,'',0,1);
	}
    $pdf->Write(10,'************************************************** CHI TIẾT ĐƠN HÀNG **********************************************');
	$pdf->Ln(15);

	// $width_cell=array(10,35,50,20,50,25,50);
	$width_cell=array(10,50,50,50,50,50);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	// $pdf->Cell($width_cell[1],10,'Mã đơn hàng',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Nhà cung cấp',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Đơn giá',1,0,'C',true);
	// $pdf->Cell($width_cell[5],10,'Giảm giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Thành tiền',1,1,'C',true); 
	$fill=false;
	$i = 0;
	$tongtien = 0;
	while($row = mysqli_fetch_array($query_lietke_nh)){
		$i++;
		$tongtien+=$row['soluong1']*$row['gianhap'];
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	// $pdf->Cell($width_cell[1],10,$row['code_donhang'],1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['tensanpham'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['tennhacungcap'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['soluong1'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['gianhap'],0,',','.').'đ',1,0,'C',$fill);
	// $pdf->Cell($width_cell[5],10,number_format($row['sale']).'%',1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,number_format($row['soluong1']*$row['gianhap'],0,',','.').'đ',1,1,'C',$fill);
	}
	$pdf->Cell(59 ,5,'',0,1);
	$pdf->Write(10,'                                                                                                                                  Tổng hóa đơn:  ');
	$pdf->Write(10,number_format($tongtien,0,',','.').'đ');
	$pdf->Cell(59 ,10,'',0,1);
    $pdf->Write(10,'                                                 VUI LÒNG KIỂM TRA HÓA ĐƠN TRƯỚC KHI THANH TOÁN');
	$pdf->Ln(10);
    $pdf->Output();
?>