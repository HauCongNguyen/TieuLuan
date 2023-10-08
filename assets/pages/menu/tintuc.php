<p class="content">TIN TỨC MỚI NHẤT</p>
<?php
	$sql_bv = "SELECT * FROM tbl_tintuc WHERE tinhtrang=1 ORDER BY id DESC";
	$query_bv = mysqli_query($mysqli,$sql_bv);
	
?>
<ul class="product_list">
    <?php
					while($row_bv = mysqli_fetch_array($query_bv)){ 
					?>
    <li>
        <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>#main_list">
            <img src="admincp/modules/quanlytintuc/uploads/<?php echo $row_bv['hinhanh'] ?>">
            <p class="title_product">Tên bài viết : <?php echo $row_bv['tentintuc'] ?></p>
        </a>
        <p style="margin:10px" class="title_product"><?php echo $row_bv['tomtat'] ?></p>
    </li>
    <?php
					} 
					?>

</ul>