<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
	$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	
?>
<p class="content">Kết quả tìm kiếm : <?php echo $_POST['tukhoa']; ?></p>
<ul class="product_list">
    <?php
					while($row = mysqli_fetch_array($query_pro)){ 
					?>
    <li style="border-radius: 10%;">
    <?php
        if($row['sale']=='0'){
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color: #c48c46;font-size: 17px;font-weight: 700;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'đ'?></p>
            <p class="price_product" style="color: #d1d1d1;">###</p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
        </a>
        <?php
        }else{
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color: #c48c46;font-size: 17px;font-weight: 700;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp']-($row['giasp']*$row['sale']/100),0,',','.').'đ' ?></p>
            <p style="text-decoration-line:line-through;color:#d1d1d1" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'đ'?></p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
        </a>
        <?php
        }
        ?>
    </li>
    <?php
					} 
					?>
</ul>