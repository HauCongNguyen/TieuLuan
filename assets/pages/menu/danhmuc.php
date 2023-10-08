<?php
	$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	//get ten danh muc
	$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title = mysqli_fetch_array($query_cate);
?>
<p class="content"><?php echo $row_title['tendanhmuc'] ?></p>
<ul class="product_list">
    <?php
					while($row_pro = mysqli_fetch_array($query_pro)){ 
					?>
    <li style="border-radius: 10%;">
    <?php
        if($row_pro['sale']=='0'){
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
            <p class="title_product"><?php echo $row_pro['tensanpham'] ?></p>
            <p style="text-align: center; color: #c48c46;font-size: 17px;font-weight: 700;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row_pro['giasp'],0,',','.').'đ' ?></p>
            <p class="price_product" style="color: #d1d1d1;">###</p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row_title['tendanhmuc'] ?></p>
        </a>
        <?php
        }else{
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
            <p class="title_product"><?php echo $row_pro['tensanpham'] ?></p>
            <p style="text-align: center; color: #c48c46;font-size: 17px;font-weight: 700;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row_pro['giasp']-($row_pro['giasp']*$row_pro['sale']/100),0,',','.').'đ' ?></p>
            <p style="text-decoration-line:line-through;" class="price_product"><?php echo number_format($row_pro['giasp'],0,',','.').'đ'?></p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row_title['tendanhmuc'] ?></p>
        </a>
        <?php
        }
        ?>
    </li>
    <?php
					} 
					?>

</ul>
