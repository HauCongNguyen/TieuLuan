<div id="header">
    <?php
            include("menu.php")
        ?>
    <!-- Begin: Search button -->
    <div class="search">
        <form action="index.php?quanly=timkiem#main_list" method="POST">
            <input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
            <input id="search" type="submit" name="timkiem" value="Tìm kiếm">
        </form>
    </div>
    <div id="mobile-menu" class="mobile-menu-btn">
        <a style="text-decoration: none;" href="#main"><i class="menu-icon ti-menu"></i></a>
    </div>
    <!-- End: Search button -->
</div>