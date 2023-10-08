<?php
    $query = "SELECT `tbl_danhmuc`.*, COUNT(tbl_nhaphang.id_danhmuc) AS 'soluongsanpham' FROM `tbl_nhaphang` INNER JOIN `tbl_danhmuc` ON tbl_nhaphang.id_danhmuc = tbl_danhmuc.id_danhmuc GROUP BY tbl_nhaphang.id_danhmuc DESC;";
    $result = mysqli_query($mysqli,$query);
    $data = [];
    while($rule = mysqli_fetch_array($result)){
      $data[] = $rule;
    }
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['tendanhmuc', 'soluongsanpham'],
          <?php
            foreach($data as $key){
                echo "['".$key['tendanhmuc']."',".$key['soluongsanpham']."],";
            }
          ?>
        ]);

        var options = {
          title: 'Thống kê nhập hàng',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 700px; height: 300px;"></div>
  </body>
</html>
<p style="width:98.8%; height:40px; background-color:rgb(235, 231, 231);text-align:center;font-size:30px;font-weight:600;line-height:40px;margin: 20px 10px;"><b>Nhập hàng</b></p>
<table class="table table-hover table-dark" border="1px" style="width: 100%;" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlynhaphang/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Giá nhập</td>
            <td><input type="text" name="gianhap"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong1"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input class="input-group-text" type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Nhà cung cấp</td>
            <td>
                <select name="nhacungcap">
                    <?php
        $sql_nhacungcap = "SELECT * FROM tbl_nhacungcap ORDER BY id DESC";
        $query_nhacungcap = mysqli_query($mysqli,$sql_nhacungcap);
        while ($row_nhacungcap = mysqli_fetch_array($query_nhacungcap)){
        ?>
                    <option value="<?php echo $row_nhacungcap['id']?>"><?php echo $row_nhacungcap['tennhacungcap']?>
                    </option>
                    <?php
        }
        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="danhmuc">
                    <?php
        $sql_danhmuc = "SELECT *FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?>
                    <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?>
                    </option>
                    <?php
        }
        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <option value="1">Đã thanh toán</option>
                    <option value="0">Chưa thanh toán</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themnhaphang" value="Thêm nhập hàng"></td>
        </tr>
    </form>
</table>