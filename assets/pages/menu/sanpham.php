<p class="content">CHI TIẾT SẢN PHẨM</p>
<?php
    if(isset($_GET['trang'])){
		$page = $_GET['trang'];
	}else{
		$page = 1;
	}
	if($page == '' || $page == 1){
		$begin = 0;
	}else{
		$begin = ($page-1)* 6;
	}
    $luotxem = rand(0,9999);
    if(!empty($_POST) && !empty($_SESSION['id_khachhang'])){
        $star=$_POST['star'];
        $id_product=$_GET['id'];
        $id_user =$_SESSION['id_khachhang'];
        $content= $_POST['comment'];
        if(strlen($content)>=10){
            $sql='INSERT INTO tbl_danhgia(id_khachhang,noidung_danhgia,id_sanpham,star) values("'.$id_user.'", "'.$content.'", "'.$id_product.'","'.$star.'")';
            mysqli_query($mysqli,$sql);
            echo '<script>alert("Thêm bình luận thành công!")</script>';
        }elseif(strlen($content)<10){
            echo '<script>alert("Vui lòng nhập bình luận!")</script>';
        }
    }
    $sql_rating = "SELECT AVG(star) FROM tbl_danhgia  WHERE tbl_danhgia.id_sanpham=$_GET[id] ORDER BY tbl_danhgia.id_danhgia DESC";
    $query_rating = mysqli_query($mysqli,$sql_rating);
    $row_rating = mysqli_fetch_array($query_rating);
    
    $sql_count = "SELECT star FROM tbl_danhgia  WHERE tbl_danhgia.id_sanpham=$_GET[id] ORDER BY tbl_danhgia.id_danhgia DESC";
    $query_count = mysqli_query($mysqli,$sql_count);


    $sql_load_cmt = "SELECT * FROM tbl_danhgia,tbl_khachhang,tbl_sanpham WHERE tbl_danhgia.id_sanpham='$_GET[id]' AND tbl_danhgia.id_khachhang=tbl_khachhang.id_khachhang AND tbl_sanpham.id_sanpham=tbl_danhgia.id_sanpham ORDER BY tbl_danhgia.id_danhgia DESC LIMIT $begin,6";
    $query_load_cmt = mysqli_query($mysqli,$sql_load_cmt);
	$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
	$query_chitiet = mysqli_query($mysqli,$sql_chitiet);
	while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">
    <div class="hinhanh_sanpham" style="border-radius: 10%;">
        <img style="border-radius: 10%;" width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
    </div>
    <form method="POST"
        action="assets/pages/menu/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>#main_list">
        <div class="chitiet_sanpham">
            <?php
                if($row_chitiet['sale']==0){
            ?>
            <h3 style="margin-bottom: 10px"><?php echo $row_chitiet['tensanpham'] ?></h3>
            <p style="font-weight: 600;">Mã sản phẩm: <?php echo $row_chitiet['masp'] ?></p>
            <p style="font-weight: 600;color:#c48c46;font-size:17px;">Giá sản phẩm: <?php echo number_format($row_chitiet['giasp'],0,',','.').'đ' ?></p>
            <!-- <p style="font-weight: 600;">Giảm giá: <?php echo number_format($row_chitiet['sale']).'%' ?></p> -->
            <p style="font-weight: 600;">Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmuc'] ?></p>
            <?php
                if($row_chitiet['soluong']==0){
            ?>
            <p style="color: red;font-weight:700;">Hết hàng</p>
            <?php
                }else{
            ?>
            <p style="font-weight: 600;">Số lượng tồn: <?php echo $row_chitiet['soluong'] ?> sản phẩm</p>
            <?php
                }
            ?>
            <p><?php 
                if(round($row_rating[0])==5){
                    echo "<lable style='color:#ffb800;font-size:25px;'>★★★★★</lable>";
                    echo " (";
                    echo round($row_rating[0]).'/5 sao)';
                }elseif(round($row_rating[0])==4){
                    echo "<lable style='color:#ffb800;font-size:25px;'>★★★★☆</lable>";
                    echo " (";
                    echo round($row_rating[0]).'/5 sao)';
                }elseif(round($row_rating[0])==3){
                    echo "<lable style='color:#ffb800;font-size:25px;'>★★★☆☆</lable>";
                    echo " (";
                    echo round($row_rating[0]).'/5 sao)';
                }elseif(round($row_rating[0])==2){
                    echo "<lable style='color:#ffb800;font-size:25px;'>★★☆☆☆</lable>";
                    echo " (";
                    echo round($row_rating[0]).'/5 sao)';
                }elseif(round($row_rating[0])==1){
                    echo "<lable style='color:#ffb800;font-size:25px;'>★☆☆☆☆</lable>";
                    echo " (";
                    echo round($row_rating[0]).'/5 sao)';
                }else{
                    echo "<lable style='color:#ffb800;font-size:25px;'>☆☆☆☆☆</lable>";
                    echo '(Chưa có đánh giá)';
                }
            ?></p>
            <p style="font-weight: 600; font-style:italic; color:grey;">View : <?php echo $luotxem ?> lượt xem</p>
            <?php
            if($row_chitiet['tinhtrang']==1 && $row_chitiet['soluong']>0){
            ?>
            <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
            <?php
            }else{
            ?>
            <p><input disabled class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng">(Không khả dụng)</p>
            <?php
            }
            ?>
            <?php
                }else{
            ?>
            <h3 style="margin-bottom: 10px"><?php echo $row_chitiet['tensanpham'] ?></h3>
            <p style="font-weight: 600;">Mã sản phẩm: <?php echo $row_chitiet['masp'] ?></p>
            <p style="font-weight: 600;color:#c48c46;font-size:17px;">Giá sản phẩm: <?php echo number_format($row_chitiet['giasp']-($row_chitiet['giasp']*$row_chitiet['sale']/100),0,',','.').'đ' ?> <label style="text-decoration-line:line-through
            ;font-size:15px;"><?php echo number_format($row_chitiet['giasp'],0,',','.').'đ' ?></label> (<Label style="margin-left: 5px;color:red;">Sale: <?php echo number_format($row_chitiet['sale']).'%'?></Label>)</p>
            <!-- <p style="font-weight: 600;">Giảm giá: <?php echo number_format($row_chitiet['sale']).'%' ?></p> -->
            <p style="font-weight: 600;">Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmuc'] ?></p>
            <?php
                if($row_chitiet['soluong']==0){
            ?>
            <p style="color: red;font-weight:700;">Hết hàng</p>
            <?php
                }else{
            ?>
            <p style="font-weight: 600;">Số lượng tồn: <?php echo $row_chitiet['soluong'] ?> sản phẩm</p>
            <?php
                }
            ?>
            <p><?php 
                if(round($row_rating[0])==5){
                    echo "<lable style='color:#ffb800;font-size:25px;'>★★★★★</lable>";
                    echo " (";
                    echo round($row_rating[0]).'/5 sao)';
                }elseif(round($row_rating[0])==4){
                    echo "<lable style='color:#ffb800;font-size:25px;'>★★★★☆</lable>";
                    echo " (";
                    echo round($row_rating[0]).'/5 sao)';
                }elseif(round($row_rating[0])==3){
                    echo "<lable style='color:#ffb800;font-size:25px;'>★★★☆☆</lable>";
                    echo " (";
                    echo round($row_rating[0]).'/5 sao)';
                }elseif(round($row_rating[0])==2){
                    echo "<lable style='color:#ffb800;font-size:25px;'>★★☆☆☆</lable>";
                    echo " (";
                    echo round($row_rating[0]).'/5 sao)';
                }elseif(round($row_rating[0])==1){
                    echo "<lable style='color:#ffb800;font-size:25px;'>★☆☆☆☆</lable>";
                    echo " (";
                    echo round($row_rating[0]).'/5 sao)';
                }else{
                    echo "<lable style='color:#ffb800;font-size:25px;'>☆☆☆☆☆</lable>";
                    echo '(Chưa có đánh giá)';
                }
            ?></p>
            <p style="font-weight: 600; font-style:italic; color:grey;">View : <?php echo $luotxem ?> lượt xem</p>
            <?php
            if($row_chitiet['tinhtrang']==1 && $row_chitiet['soluong']>0){
            ?>
            <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
            <?php
            }else{
            ?>
            <p><input disabled class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng">(Không khả dụng)</p>
            <?php
            }
            ?>
            <?php
                }
            ?>
        </div>
    </form>
    <div class="clear"></div>
    <div class="tabs">
        <ul id="tabs-nav">
            <li><a href="#tab1">Nội dung</a></li>
            <li><a href="#tab2">Chi tiết sản phẩm</a></li>
            <!-- <li><a href="#tab3">Bình luận && đánh giá</a></li> -->
        </ul> <!-- END tabs-nav -->
        <div id="tabs-content">
            <div id="tab1" class="tab-content" style="font-weight: 600;">
            <?php 
                if($row_chitiet['tomtat']){
                    echo $row_chitiet['tomtat'] ;
                }else{
                    echo '<p style="font-size:20px">Chưa cập nhật...</p>';
                }    
                ?>
            </div>
            <div id="tab2" class="tab-content" style="font-weight: 600;">
                <?php 
                if($row_chitiet['noidung']){
                    echo $row_chitiet['noidung'] ;
                }else{
                    echo '<p style="font-size:20px">Chưa cập nhật...</p>';
                }    
                ?>
            </div>
            <div id="tab3" class="tab-content" style="font-weight: 600;">
            </div>
            
        </div> <!-- END tabs-content -->
    </div> <!-- END tabs -->
    <div class="comment">
            <form method="post" action="">
                <p style="width:98.8%; height:40px; background-color:rgb(235, 231, 231); text-align:center;font-size:30px;font-weight:700;line-height:40px;margin: 20px 10px;">Bình Luận</p>
                <textarea style="border: solid 5px;border-color: rgb(0 0 0 / 8%);" name="comment" id="" cols="150" rows="3" placeholder="Bình luận tối thiểu phải 10 ký tự"></textarea>
                <select id="star" name="star" style="color:#ffb800;font-size: 25px;font-weight:700;border:solid 6px;border-color: lightgrey">
                    <option value="1">★☆☆☆☆</option>
                    <option value="2">★★☆☆☆</option>
                    <option value="3">★★★☆☆</option>
                    <option value="4">★★★★☆</option>
                    <option value="5">★★★★★</option>
                </select>
                <?php 
                if(isset($_SESSION['id_khachhang'])){
            ?>
            <button class="btn btn-success" onclick="getValue()">Bình luận</button>
            <?php
                }else{
            ?>
            <button disabled class="btn btn-success" onclick="getValue()">Bình luận</button>
            <?php
                }
            ?>
            </form> 
            <style type="text/css">
                .style_comment{
                    border: 1px solid #dddd;
                    border-radius: 10px;
                    background: #f0f0e9;
                    margin-right: 10px;
                    margin-top: 2px;
                }
            </style>
            <?php 
            while($row_load = mysqli_fetch_array($query_load_cmt)){
            ?>
            <div class="row style_comment" id="cmt">
                    <div class="col-md-2" style="margin-right: 1px;">
                        <img width="50px" style="border-radius: 50%;" src="https://www.pngarts.com/files/3/Cool-Avatar-Transparent-Image.png" class="img img-responsive img-thumbnail">
                        <?php 
                        if($row_load['star']==5){
                            echo "<lable style='color:#ffb800;font-size:25px;'>★★★★★</lable>";
                        }elseif($row_load['star']==4){
                            echo "<lable style='color:#ffb800;font-size:25px;'>★★★★☆</lable>";
                        }elseif($row_load['star']==3){
                            echo "<lable style='color:#ffb800;font-size:25px;'>★★★☆☆</lable>";
                        }elseif($row_load['star']==2){
                            echo "<lable style='color:#ffb800;font-size:25px;'>★★☆☆☆</lable>";
                        }else{
                            echo "<lable style='color:#ffb800;font-size:25px;'>★☆☆☆☆</lable>";
                        }
                        ?>
                    </div>
                    <div class="col-md-10">
                        <p style="color:green;font-size: 20px;">@<?php echo $row_load['tenkhachhang'] ?>
                            <label style="font-size: 15px;color: black; font-weight: 500; margin-left: 10px;"><?php echo $row_load['ngaydanhgia']?></label>
                        </p>
                        <p style="font-size: 18px;font-weight:600;"><?php echo $row_load['noidung_danhgia']?></p>
                    </div>
                </div>
                <?php
            }
                ?> 
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
$sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_danhgia,tbl_khachhang,tbl_sanpham WHERE tbl_danhgia.id_sanpham='$_GET[id]' AND tbl_danhgia.id_khachhang=tbl_khachhang.id_khachhang AND tbl_sanpham.id_sanpham=tbl_danhgia.id_sanpham");
$row_count = mysqli_num_rows($sql_trang);  
$trang = ceil($row_count/6);
?>
<p style="font-weight: 600;">Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>

<ul class="list_trang">

    <?php
					
	for($i=1;$i<=$trang;$i++){ 
	?>
    <li <?php if($i==$page){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a
            href="index.php?quanly=sanpham&id=<?php echo $row_chitiet['id_sanpham']?>&trang=<?php echo $i ?>#cmt"><?php echo $i ?></a></li>
    <?php
	} 
	?>

</ul>          
            <div class="user_cmt">
                <ul style="list-style: none;">
                    <?php
                        if(isset($_GET['id_sanpham'])){
                            $id=$_GET['id_sanpham'];
                            $sql='select * from tbl_danhgia where '.$id.'=id_danhgia';
                            $cmt_list=mysqli_query($mysqli,$sql);
                            foreach ($cmt_list as $cmt_single){
                                $sql = 'select * from khachhang where id_khachhang='.$cmt_single['id_khachhang'];
                                    $user_fullname = mysqli_fetch_array($cmt_list);
                                    echo '<li>
                                            <span>'.$user_fullname['tenkhachhang'].'</span>
                                            <span style="color:white">-</span>
                                            <span style="color : #ff734ccc">';
                                            $i=1;
                                            for($i;$i<=5;$i++){
                                                if($i<=$cmt_single['star']){
                                                    echo '★';
                                                    continue;
                                                }
                                                echo '☆';

                                            }
                                            echo '</span>
                                            <p>'.$cmt_single['content_cmd'].'</p>
                                        </li>';
                              
                            };
                        };
                    ?>
                </ul>
            </div>
        </div>
            <script> 
            function getValue(){
                var valueBtn = document.querySelector('textarea').value;
                console.log(valueBtn)
            }
        </script>
</div>
<?php
} 
?>

<!-- SẢN PHẨM LIÊN QUAN -->
<?php
    $sql_chitiet1 = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_chitiet1 = mysqli_query($mysqli,$sql_chitiet1);
    $row_chitiet1 = mysqli_fetch_array($query_chitiet1);
    $id_danhmuc = $row_chitiet1['id_danhmuc'];
    $id = $_GET['id'];
	$sql_pro1 = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham!=$id AND tbl_sanpham.id_danhmuc=$id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC";
	$query_pro1 = mysqli_query($mysqli,$sql_pro1);
?>
<div style="margin-top: 100px;">
<p class="content1">SẢN PHẨM LIÊN QUAN</p>
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
            <p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color:  #c48c46;font-size: 17px;font-weight: bold;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
            <p class="price_product" style="color: #d1d1d1;">###</p>
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
        </a>
        <?php
        }else{
        ?>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>#main_list">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham'] ?></p>
            <p style="text-align: center; color:  #c48c46;font-size: 17px;font-weight: bold;padding: 0px 61px;border-radius: 15px;transition: all 0.2s linear;" class="price_product"><?php echo number_format($row['giasp']-($row['giasp']*$row['sale']/100),0,',','.').'vnđ' ?></p>
            <p style="text-decoration-line:line-through;color:#d1d1d1;" class="price_product"><?php echo number_format($row['giasp'],0,',','.').'vnđ'?></p>
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
