<div class="clear"></div>
<div class="main">
    <?php
            if(isset($_GET['action']) && $_GET['query']){
                $tam = $_GET['action'];
                $query = $_GET['query'];
            }else{
                $tam = '';
                $query = '';
            }
            if($tam=='quanlydanhmucsanpham' && $query=='them'){
                include("./modules/quanlydanhmucsp/them.php");
                include("./modules/quanlydanhmucsp/lietke.php");
            
            }elseif($tam == 'quanlydanhmucsanpham' && $query=='sua'){
                include("./modules/quanlydanhmucsp/sua.php");
            
            }elseif($tam == 'quanlysp' && $query=='them'){
                include("./modules/quanlysp/them.php");
                include("./modules/quanlysp/lietke.php");
            
            }elseif($tam == 'quanlysp' && $query=='sua'){
                include("./modules/quanlysp/sua.php");
            
            }elseif($tam=='quanlydonhang' && $query=='lietke'){
                include("modules/quanlydonhang/lietke.php");
            
            }elseif($tam=='donhang' && $query=='xemdonhang'){
                include("modules/quanlydonhang/xemdonhang.php");
            
            }elseif($tam=='quanlytintuc' && $query=='them'){
                include("modules/quanlytintuc/them.php");
                include("modules/quanlytintuc/lietke.php");
                            
            }elseif($tam=='quanlynhacungcap' && $query=='them'){
                include("modules/quanlynhacungcap/them.php");
                include("modules/quanlynhacungcap/lietke.php");
            
            }elseif($tam=='quanlynhacungcap' && $query=='sua'){
                include("modules/quanlynhacungcap/sua.php");
            
            }elseif($tam == 'quanlynhaphang' && $query=='them'){
                include("./modules/quanlynhaphang/them.php");
                include("./modules/quanlynhaphang/lietke.php");
            
            }elseif($tam == 'quanlynhaphang' && $query=='sua'){
                include("./modules/quanlynhaphang/sua.php");
            
            }elseif($tam == 'quanlythanhvien' && $query=='them'){
                include("./modules/quanlythanhvien/them.php");
                include("./modules/quanlythanhvien/lietke.php");
            
            }elseif($tam == 'quanlythanhvien' && $query=='sua'){
                include("./modules/quanlythanhvien/sua.php");
            
            }else{
                include("./modules/dashboard.php");
            }
    ?>
</div>