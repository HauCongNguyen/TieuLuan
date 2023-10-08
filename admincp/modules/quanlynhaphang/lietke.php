<!-- <?php
    $sql_lietke_sp = "SELECT * FROM tbl_nhaphang,tbl_nhacungcap,tbl_danhmuc WHERE tbl_nhaphang.id_ncc =tbl_nhacungcap.id AND tbl_nhaphang.id_danhmuc =tbl_danhmuc.id_danhmuc ORDER BY id_nhaphang DESC";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?> -->
<?php
    $query = "SELECT tensanpham,soluongdaban FROM tbl_nhaphang";
    $result = mysqli_query($mysqli,$query);
    $data = [];
    while($rule = mysqli_fetch_array($result)){
      $data[] = $rule;
    }
    // echo '<pre>';
    // var_dump($data);
    // echo '<pre>';
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Số lượng đã bán", { role: "style" } ],
        <?php
           foreach($data as $key){
            echo '["'.$key['tensanpham'].'", '.$key['soluongdaban'].', "orange"],';
           }
        ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Thông kê hàng số lượng đã bán",
        width: 2000,
        height: 300,
        bar: {groupWidth: "40%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
  <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
<p style="width:98.8%; height:40px; background-color:rgb(235, 231, 231);text-align:center;font-size:30px;font-weight:600;line-height:40px;margin: 20px 10px;"><b>Chi tiết nhập hàng</b></p>
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
  if(!empty($_POST['ten'])){
    $_SESSION['filter'] = $_POST;
    $ten = $_POST['ten'];
    if(!empty($_SESSION['filter'])){
      extract($_SESSION['filter']);
    }
    $sql_pro = "SELECT `tbl_nhacungcap`.`tennhacungcap`, `tbl_nhaphang`.* , `tbl_danhmuc`.`tendanhmuc` FROM tbl_nhaphang JOIN tbl_danhmuc ON tbl_nhaphang.id_danhmuc=tbl_danhmuc.id_danhmuc JOIN tbl_nhacungcap ON tbl_nhaphang.id_ncc=tbl_nhacungcap.id WHERE tensanpham LIKE '%".$ten."%' ORDER BY id_nhaphang DESC";
	  $query_pro = mysqli_query($mysqli,$sql_pro);
  }else{
    $sql_pro = "SELECT * FROM tbl_nhaphang,tbl_nhacungcap,tbl_danhmuc WHERE tbl_nhaphang.id_ncc =tbl_nhacungcap.id AND tbl_nhaphang.id_danhmuc =tbl_danhmuc.id_danhmuc ORDER BY id_nhaphang DESC LIMIT $begin,10";
	  $query_pro = mysqli_query($mysqli,$sql_pro);
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
if(!empty($_POST['ten'])){
  $_SESSION['filter'] = $_POST;
  $ten = $_POST['ten'];
  if(!empty($_SESSION['filter'])){
    extract($_SESSION['filter']);
  }
  $sql_trang = mysqli_query($mysqli,"SELECT `tbl_nhacungcap`.`tennhacungcap`, `tbl_nhaphang`.* , `tbl_danhmuc`.`tendanhmuc` FROM tbl_nhaphang JOIN tbl_danhmuc ON tbl_nhaphang.id_danhmuc=tbl_danhmuc.id_danhmuc JOIN tbl_nhacungcap ON tbl_nhaphang.id_ncc=tbl_nhacungcap.id WHERE tensanpham LIKE '%".$ten."%'");
}else{
  $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_nhaphang,tbl_nhacungcap,tbl_danhmuc WHERE tbl_nhaphang.id_ncc =tbl_nhacungcap.id AND tbl_nhaphang.id_danhmuc =tbl_danhmuc.id_danhmuc");
}
$row_count = mysqli_num_rows($sql_trang);  
$trang = ceil($row_count/10);
?>
<form style="font-weight: 700;font-size:15px;padding:0px;" action="index.php?action=quanlynhaphang&query=them#list1" method="POST">
<div class="input-group mb-3">
  <div class="input-group-prepend">
  <input style="padding: 0px 15px;" type="submit" value="Tìm kiếm">
  </div>
  <input type="text" class="form-control" placeholder="Tên sản phẩm..." name="ten" value="<?=!empty($ten)?$ten:""?>">
</div>
</form>
<p style="font-weight: 600;">Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>

<ul class="list_trang">

    <?php
					
	for($i=1;$i<=$trang;$i++){ 
	?>
    <li <?php if($i==$page){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a
            href="index.php?action=quanlynhaphang&query=them&trang=<?php echo $i ?>#list1"><?php echo $i ?></a></li>
    <?php
	} 
	?>

</ul>
<table id="list1" style="text-align:center" class="table table-hover table-dark" style="width: 100%;" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Nhà cung cấp</th>
        <th>Danh mục</th>
        <th>Giá nhập</th>
        <th>Số lượng</th>
        <th>Số lượng đã bán</th>
        <th>Tổng giá nhập</th>
        <th>Trạng thái</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_pro)){
        $i++;    
  ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><img src="modules/quanlynhaphang/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
        <td><?php echo $row['tennhacungcap'] ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><?php echo number_format($row['gianhap'],0,',','.').'đ' ?></td>
        <td><?php echo $row['soluong1'] ?></td>
        <td><?php echo $row['soluongdaban'] ?></td>
        <td><?php echo number_format($row['gianhap']*$row['soluong1'],0,',','.').'đ'?></td>
        <td><?php if($row['tinhtrang']==1) {
        echo '<b style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: green;">Đã thanh toán</b>';
      }else{
        echo '<b style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: red;">Chưa thanh toán</b>';
      } ?></td>
        <td>
            <a href="?action=quanlynhaphang&query=sua&idnhaphang=<?php echo $row['id_nhaphang'] ?>&trang=<?php 
                if(isset($_GET['trang'])){
                  echo $_GET['trang'];
                }else{
                  echo '1';
                }
            ?>"
                style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: #0062cc;"><i class="ti-pencil"></i></a>
            <a style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: orange;" href="modules/quanlynhaphang/innhaphang.php"><i class="ti-printer"></i></a>
            <a href="modules/quanlynhaphang/xuly.php?idnhaphang=<?php echo $row['id_nhaphang'] ?>"
                style="color:aliceblue; padding: 10px 15px; border-radius: 4px;  background-color: red;"><i class="ti-trash"></i></a>
        </td>
    </tr>
    <?php
    }
  ?>
</table>