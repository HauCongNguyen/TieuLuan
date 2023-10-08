<?php
    $sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
?>
<p style="width:98.8%; height:40px; background-color:rgb(235, 231, 231);text-align:center;font-size:30px;font-weight:600;line-height:40px;margin: 20px 10px;"><b>Điều chỉnh sản phẩm</b></p>
<table class="table table-hover table-dark" border="1px" style="width: 100%;" style="border-collapse: collapse;">
    <?php
  while($row = mysqli_fetch_array($query_sua_sp)){
?>
    <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>&trang=<?php echo $_GET['trang']?>"
        enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Mã sp</td>
            <td><input type="text" value="<?php echo $row['masp'] ?>" name="masp"></td>
        </tr>
        <tr>
            <td>Giá nhập</td>
            <td><input type="text" value="<?php echo $row['gianhap'] ?>" name="gianhap"></td>
        </tr>
        <tr>
            <td>Giá bán</td>
            <td><input type="text" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
        </tr>
        <tr>
            <td>Giảm giá</td>
            <td><input type="text" value="<?php echo $row['sale'] ?>" name="sale"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input class="input-group-text" type="file" name="hinhanh">
                <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px">
            </td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea rows="10" name="tomtat" style="resize: none;"><?php echo $row['tomtat'] ?></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea rows="10" name="noidung" style="resize: none;"><?php echo $row['noidung'] ?></textarea></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="danhmuc">
                    <?php
        $sql_danhmuc = "SELECT *FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
          if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
        ?>
                    <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>">
                        <?php echo $row_danhmuc['tendanhmuc']?></option>
                    <?php
        }else{
        ?>
                    <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?>
                    </option>
                    <?php
          }
        }  
        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nhà cung cấp</td>
            <td>
                <select name="nhacungcap">
                    <?php
        $sql_nhacungcap = "SELECT * FROM tbl_nhacungcap ORDER BY id DESC";
        $query_nhacungcap = mysqli_query($mysqli,$sql_nhacungcap);
        while ($row_nhacungcap = mysqli_fetch_array($query_nhacungcap)){
          if($row_nhacungcap['id']==$row['id_ncc']){
        ?>
                    <option selected value="<?php echo $row_nhacungcap['id']?>">
                        <?php echo $row_nhacungcap['tennhacungcap']?></option>
                    <?php
        }else{
        ?>
                    <option value="<?php echo $row_nhacungcap['id']?>">
                        <?php echo $row_nhacungcap['tennhacungcap']?>
                    </option>
                    <?php
          }
        }  
        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Hàng trong kho</td>
            <td>
                <select name="tenhang">
                    <?php
        $sql_tenhang = "SELECT * FROM tbl_nhaphang ORDER BY id_nhaphang DESC";
        $query_tenhang = mysqli_query($mysqli,$sql_tenhang);
        while ($row_tenhang = mysqli_fetch_array($query_tenhang)){
          if($row_tenhang['id_nhaphang']==$row['id_nh']){
        ?>
                    <option selected value="<?php echo $row_tenhang['id_nhaphang']?>">
                        <?php echo $row_tenhang['tensanpham']?></option>
                    <?php
        }else{
        ?>
                    <option value="<?php echo $row_tenhang['id_nhaphang']?>">
                        <?php echo $row_tenhang['tensanpham']?>
                    </option>
                    <?php
          }
        }  
        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <?php
          if($row['tinhtrang']==1){
        ?>
                    <option value="1" selected>Kích hoạt</option>
                    <option value="0">Ẩn</option>
                    <?php
          }else{
        ?>
                    <option value="1">Kích hoạt</option>
                    <option value="0" selected>Ẩn</option>
                    <?php
          }
        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suasanpham" value="Điều chỉnh sản phẩm"></td>
        </tr>
    </form>
    <?php
  }
?>
</table>