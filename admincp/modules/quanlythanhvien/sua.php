<?php
    $sql_sua_thanhvien = "SELECT * FROM tbl_khachhang WHERE id_khachhang ='$_GET[idkhachhang]' LIMIT 1";
    $query_sua_thanhvien = mysqli_query($mysqli,$sql_sua_thanhvien);
?>
<p style="width:98.8%; height:40px; background-color:rgb(235, 231, 231);text-align:center;font-size:30px;font-weight:600;line-height:40px;margin: 20px 10px;"><b>Điều chỉnh thành viên</b></p>
<table class="table table-hover table-dark" border="1px" style="width: 50%;" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlythanhvien/xuly.php?idkhachhang=<?php echo $_GET['idkhachhang']?>">
        <?php
        while($dong = mysqli_fetch_array($query_sua_thanhvien)){
    ?>
        <tr>
            <td>Tên thành viên</td>
            <td><input type="text" value="<?php echo $dong['tenkhachhang'] ?>" name="tenthanhvien"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" value="<?php echo $dong['email'] ?>" name="email"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" value="<?php echo $dong['diachi'] ?>" name="diachi"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" value="<?php echo md5($dong['matkhau']) ?>" name="matkhau"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" value="<?php echo $dong['dienthoai'] ?>" name="dienthoai"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suathanhvien" value="Điều chỉnh thành viên"></td>
        </tr>
        <?php
    }
  ?>
    </form>
</table>