<!-- SẢN PHẨM NỔI BẬT -->
<?php
	if(isset($_GET['trang'])){
		$page = $_GET['trang'];
	}else{
		$page = 1;
	}
	if($page == '' || $page == 1){
		$begin = 0;
	}else{
		$begin = ($page-1)* 10;
	}
  if(isset($_GET['sort'])){
    if($_GET['sort']=='desc'){
      $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.giasp - tbl_sanpham.giasp*tbl_sanpham.sale/100 DESC LIMIT $begin,10";
    }elseif($_GET['sort']=='asc'){
      $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.giasp - tbl_sanpham.giasp*tbl_sanpham.sale/100 ASC LIMIT $begin,10";
    }else{
      $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.giasp - tbl_sanpham.giasp*tbl_sanpham.sale/100 ASC LIMIT $begin,10";
    }
    $query_pro = mysqli_query($mysqli,$sql_pro);
}else{
  $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham ASC LIMIT $begin,10";
  $query_pro = mysqli_query($mysqli,$sql_pro);
}
  
?>
<p class="content">HÔM NAY ĂN GÌ ?</p>
<style>
        /* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 20px;
  height: 350px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
  .column {
    width: 100%;
  }
}
    </style>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label style="background-color: #d39e00;" class="input-group-text" for="inputGroupSelect01">Sắp xếp</label>
  </div>
    <select id="sort-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
      <option value="">None</option>  
      <option value="?field=price&sort=desc#product_list">Giá giảm dần</option>
      <option value="?field=price&sort=asc#product_list">Giá tăng dần</option>
    </select>
</div>
<ul id="product_list" class="product_list">
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
<div style="clear:both;"></div>
<style type="text/css">
ul.list_trang {
    padding: 0;
    margin: 0;
    list-style: none;
}

ul.list_trang li {
    float: left;
    padding: 5px 13px;
    margin: 5px;
    background: burlywood;
    display: block;
    border-radius: 50%
}

ul.list_trang li:hover {
    background-color: gray;
}

ul.list_trang li a {
    color: #000;
    text-align: center;
    text-decoration: none;
    font-size: 20px;
}
</style>
<?php
$sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
$row_count = mysqli_num_rows($sql_trang);  
$trang = ceil($row_count/10);
?>
<p style="font-weight: 600;">Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>

<ul class="list_trang">

    <?php
					
	for($i=1;$i<=$trang;$i++){ 
	?>
    <li <?php if($i==$page){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a
            href="index.php?<?php
            if(isset($_GET['sort'])){
                if($_GET['sort']=='desc'){
                  echo 'field=price&sort=desc&';
                }elseif($_GET['sort']=='asc'){
                  echo 'field=price&sort=asc&';
                }else{
                  echo '';
                }
              }else{
                echo '';
              }
            ?>trang=<?php echo $i ?>#product_list"><?php echo $i ?></a></li>
    <?php
	} 
	?>

</ul>

<!-- FILTER RAU CU QUA -->
<?php
	if(isset($_GET['trang2'])){
		$page2 = $_GET['trang2'];
	}else{
		$page2 = 1;
	}
	if($page2 == '' || $page2 == 1){
		$begin2 = 0;
	}else{
		$begin2 = ($page2-1)* 10;
	}
  global $sql_pro2;
  if(isset($_GET['filter'])){
    if($_GET['filter']=='rau'){
      $sql_pro2 = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_danhmuc.id_danhmuc=1 ORDER BY tbl_sanpham.giasp ASC LIMIT $begin2,10";
    }elseif($_GET['filter']=='cu'){
      $sql_pro2 = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_danhmuc.id_danhmuc=2 ORDER BY tbl_sanpham.giasp ASC LIMIT $begin2,10";
    }elseif($_GET['filter']=='qua'){
      $sql_pro2 = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_danhmuc.id_danhmuc=3 ORDER BY tbl_sanpham.giasp ASC LIMIT $begin2,10";
    }
    $query_pro2 = mysqli_query($mysqli,$sql_pro2);
  }else{
    $sql_pro2 = "SELECT DISTINCT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_danhmuc.id_danhmuc=1 ORDER BY tbl_sanpham.giasp ASC LIMIT $begin2,10";
    $query_pro2 = mysqli_query($mysqli,$sql_pro2);
  }
?>
</br>
<p class="content">RAU - CỦ - QUẢ ?</p>
<style>
        /* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 20px;
  height: 350px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
  .column {
    width: 100%;
  }
}
    </style>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label style="background-color: #d39e00;" class="input-group-text" for="inputGroupSelect01">Sắp xếp</label>
  </div>
    <select id="sort-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
      <option value="?filter=rau&sort=rau#product_list">Rau</option>
      <option value="?filter=cu&sort=cu#product_list">Củ</option>
      <option value="?filter=qua&sort=qua#product_list">Quả</option>
    </select>
</div>
<ul id="product_list" class="product_list">
    <?php
				while($row = mysqli_fetch_array($query_pro2)){ 
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
<div style="clear:both;"></div>
<style type="text/css">
ul.list_trang2 {
    padding: 0;
    margin: 0;
    list-style: none;
}

ul.list_trang2 li {
    float: left;
    padding: 5px 13px;
    margin: 5px;
    background: burlywood;
    display: block;
    border-radius: 50%
}

ul.list_trang2 li:hover {
    background-color: gray;
}

ul.list_trang2 li a {
    color: #000;
    text-align: center;
    text-decoration: none;
    font-size: 20px;
}
</style>
<?php
$sql_trang2 = mysqli_query($mysqli,$sql_pro2);
$row_count2 = mysqli_num_rows($sql_trang2);  
$trang2 = ceil($row_count2/10);
?>
<p style="font-weight: 600;">Trang hiện tại : <?php echo $page2 ?>/<?php echo $trang2 ?> </p>

<ul class="list_trang2">

    <?php
					
	for($i=1;$i<=$trang2;$i++){ 
	?>
    <li <?php if($i==$page2){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a
            href="index.php?<?php
            if(isset($_GET['filter'])){
                if($_GET['filter']=='rau'){
                  echo '?filter=rau&sort=rau&';
                }elseif($_GET['filter']=='cu'){
                  echo 'filter=cu&sort=cu&';
                }elseif($_GET['filter']=='qua'){
                  echo 'filter=qua&sort=qua&';
                }
              }else{
                echo 'Hi';
              }
            ?>trang2=<?php echo $i ?>#product_list"><?php echo $i ?></a></li>
    <?php
	} 
	?>

</ul>




<!-- SẢN PHẨM GIẢM GIÁ -->
<?php
	if(isset($_GET['trang1'])){
		$page1 = $_GET['trang1'];
	}else{
		$page1 = 1;
	}
	if($page1 == '' || $page1 == 1){
		$begin1 = 0;
	}else{
		$begin1 = ($page1-1)* 5;
	}
	$sql_pro1 = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.sale > 0 ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin1,5";
	$query_pro1 = mysqli_query($mysqli,$sql_pro1);
	
?>
<div style="margin-top: 100px;" class="sale" id="sale">
<p class="content1">SẢN PHẨM GIẢM GIÁ</p>
<ul class="product_list">
    <?php
				while($row = mysqli_fetch_array($query_pro1)){ 
			?>
    <li style="border-radius: 10%;">
        <?php
        if($row['sale']=='0'){
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color: #c48c46;font-size: 17px;font-weight: 700;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
            <p class="price_product">###</p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
        </a>
        <?php
        }else{
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color: #c48c46;font-size: 17px;font-weight: 700;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp']-($row['giasp']*$row['sale']/100),0,',','.').'vnđ' ?></p>
            <p style="text-decoration-line:line-through;color:#d1d1d1" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
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
<div style="clear:both;"></div>
<style type="text/css">
ul.list_trang1 {
    padding: 0;
    margin: 0;
    list-style: none;
}

ul.list_trang1 li {
    float: left;
    padding: 5px 13px;
    margin: 5px;
    background: burlywood;
    display: block;
    border-radius: 50%
}

ul.list_trang1 li:hover {
    background-color: gray;
}

ul.list_trang1 li a {
    color: #000;
    text-align: center;
    text-decoration: none;
    font-size: 20px;
}
</style>
<?php
$sql_trang1 = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE tbl_sanpham.sale > 0");
$row_count1 = mysqli_num_rows($sql_trang1);  
$trang1 = ceil($row_count1/5);
?>
<p style="font-weight: 600;">Trang hiện tại : <?php echo $page1 ?>/<?php echo $trang1 ?> </p>

<ul class="list_trang1">

    <?php
					
	for($i=1;$i<=$trang1;$i++){ 
	?>
    <li <?php if($i==$page1){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a
            href="index.php?trang1=<?php echo $i ?>#sale"><?php echo $i ?></a></li>
    <?php
	} 
	?>
</ul>
</div>

<script>

function pvalue(obj, rowid){
var x = obj.value;
var y = document.getElementById('sort-box'+ ).value = x;
    alert(x);
}
</script>