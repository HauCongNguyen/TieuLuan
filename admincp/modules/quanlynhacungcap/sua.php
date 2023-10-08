<?php
    $sql_sua_nhacungcap_sp = "SELECT * FROM tbl_nhacungcap WHERE id ='$_GET[idncc]' LIMIT 1";
    $query_sua_nhacungcap_sp = mysqli_query($mysqli,$sql_sua_nhacungcap_sp);
?>
<p style="width:98.8%; height:40px; background-color:rgb(235, 231, 231);font-size:22px;font-weight:600;line-height:40px;margin: 20px 10px;"><b>Điều chỉnh nhà cung cấp</b></p>
<table class="table table-hover table-dark" border="1px" style="width: 50%;" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlynhacungcap/xuly.php?idncc=<?php echo $_GET['idncc']?>">
        <?php
        while($dong = mysqli_fetch_array($query_sua_nhacungcap_sp)){
    ?>
        <tr>
            <td>Tên nhà cung cấp</td>
            <td><input type="text" value="<?php echo $dong['tennhacungcap'] ?>" name="tennhacungcap"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" value="<?php echo $dong['diachi'] ?>" name="diachi"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" value="<?php echo $dong['dienthoai'] ?>" name="dienthoai"></td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suanhacungcap" value="Điều chỉnh nhà cung cấp"></td>
        </tr>
        <?php
    }
  ?>
    </form>
</table>