<?php
    $sql_sua_danhmuc_sp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmuc_sp = mysqli_query($mysqli,$sql_sua_danhmuc_sp);
?>
<p style="width:98.8%; height:40px; background-color:rgb(235, 231, 231);text-align:center;font-size:22px;font-weight:600;line-height:40px;margin: 20px 10px;"><b>Điều chỉnh danh mục</b></p>
<table class="table table-hover table-dark" border="1px" style="width: 50%;" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
        <?php
        while($dong = mysqli_fetch_array($query_sua_danhmuc_sp)){
    ?>
        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suadanhmuc" value="Điều chỉnh danh mục"></td>
        </tr>
        <?php
    }
  ?>
    </form>
</table>