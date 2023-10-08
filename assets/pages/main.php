<div id="main">
     <!-- Slides -->
    <div id="slider">
        <!-- <div class="text-content">
            <h2 class="text-heading">GEMSTONEs</h2>
            <div class="text-discription">where you fulfill your wish</div>
        </div> -->
    </div>
    <div id="main_list" class="main-content">
        <?php
            if(isset($_GET['quanly'])){
                $tam = $_GET['quanly'];
            }else{
                $tam = '';
            }
            if($tam=='danhmucsanpham'){
                include("menu/danhmuc.php");
            }else if($tam=='tintuc'){
                include("menu/tintuc.php");
            }else if($tam=='baiviet'){
                include("menu/baiviet.php");
            }else if($tam=='giohang'){
                include("menu/giohang.php");
            }else if($tam=='login'){
                include("menu/login.php");
            }else if($tam=='sanpham'){
                include("menu/sanpham.php");
            }else if($tam=='dangky'){
                include("menu/dangky.php");
            }else if($tam=='dangnhap'){
                include("menu/dangnhap.php");
            }else if($tam=='timkiem'){
                include("menu/timkiem.php");
            }else if($tam=='thanhtoan'){
                include("menu/thanhtoan.php");
            }else if($tam=='vanchuyen'){
                include("menu/vanchuyen.php");
            }else if($tam=='donhangdadat'){
                include("menu/donhangdadat.php");
            }else if($tam=='thongtinthanhtoan'){
                include("menu/thongtinthanhtoan.php");
            }else if($tam=='thanks'){
                include("menu/thanks.php");
            }else if($tam=='doimatkhau'){
                include("menu/doimatkhau.php");
            }else if($tam=='lichsudonhang'){
                include("menu/lichsudonhang.php");
            }else if($tam=='xemdonhang'){
                include("menu/xemdonhang.php");
            }else if($tam=='thanks2'){
                include("menu/thanks2.php");
            }
            else{
                include("menu/index.php");
            }
            ?>
    </div>
    <div class="map-section">
        <!-- <img src="assets/img/cam-ket-sp-va-quyen-loi-kh.webp" alt="Map"> -->
        <video style="margin: 0px 100px 0px 0px;width: 100%;height:1px;" playsinline="" loop="loop" autoplay="autoplay" muted="muted" src="https://cdn.shopify.com/videos/c/o/v/5994ac4914114e56bb2b91d606e077e1.mp4"></video>
        <p class="content1">LỢI ÍCH SỨC KHỎE</p>
        <video style="width: 33%;" playsinline="" loop="loop" autoplay="autoplay" muted="muted" src="assets/img/apple.mp4"></video>
      
        <video style="width:33%;" playsinline="" loop="loop" autoplay="autoplay" muted="muted" src="assets/img/khoailang.mp4"></video>
        <video style="width: 33%;" playsinline="" loop="loop" autoplay="autoplay" muted="muted" src="assets/img/caithaoo.mp4"></video>
    </div>
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
    <div class="row">
  <div style="text-align:justify; font-family:cursive;font-size:20px;" class="column"><h2>Táo</h2>
Táo được cho là rất giàu dinh dưỡng. 100g táo cung cấp 48 kcal, 0,6g chất xơ, 2,5mg sắt, 19mg Canxi, 7mg vitamin C, 27µg betacaroten... 
Táo có thể giúp bạn giảm cân, giảm nguy cơ mắc bệnh tiểu đường, hỗ trợ sức khỏe não bộ, cải thiện sức khỏe tim mạch, hạ huyết áp, cải thiện vi khuẩn đường ruột, giúp bảo vệ sức khỏe răng miệng, làm cho hơi thở của bạn tốt hơn.
<div style="margin-top: 25px;background-color:#17a2b8;text-align:center;" class="button-row inherit-colors align-left">
              <a data-cc-animate-click="" class="button alt keychainify-checked" href="index.php?quanly=sanpham&id=38#main_list">
                MUA NGAY
              </a>
            </div>
</div>

  <div style="text-align:justify; font-family:cursive;font-size:20px;" class="column"><h2>Khoai lang</h2>
Củ khoai lang là nguồn cung cấp rất nhiều vitamin, khoáng chất, riboflavin, thiamine, niacin và carotenoid. 
 Củ khoai lang có thể hỗ trợ bạn phòng và chữa nhiều bệnh mãn tính,
 giảm nguy cơ ung thư,
 kiểm soát lượng đường trong máu,
 giảm tỷ lệ mắc bệnh tim,
 giảm nguy cơ mắc bệnh về mắt,
 hỗ trợ giảm cân,
 hỗ trợ giảm căng thẳng, stress ...
 giúp cải thiện sức khỏe da và tóc.
<div style="margin-top: 25px;background-color:#17a2b8;text-align:center;" class="button-row inherit-colors align-left">
              <a data-cc-animate-click="" class="button alt keychainify-checked" href="index.php?quanly=sanpham&id=32#main_list">
                MUA NGAY
              </a>
            </div></div>
  <div style="text-align:justify; font-family:cursive;font-size:20px;" class="column"><h2>Cải thảo</h2>
Trong 100g cải thảo có chứa khoảng 12 calo, 95,14g nước, 0,86g protein, 0,1g chất béo, 0,94g chất xơ, 13mg vitamin A, 80mg carotene, 0.03mg thiamin, 0,04mg riboflavin, 0,4mg niacin, 28mg vitamin C, 0,36mg vitamin E (T).
 ngăn ngừa rối loạn tim mạch,
 tốt cho não bộ,
 điều trị cảm lạnh thông thường,
 điều trị rối loạn cảm xúc,
 giúp xương và răng chắc khỏe,
 ngăn ngừa bệnh hen suyễn.
<div style="margin-top: 25px;background-color:#17a2b8;text-align:center;" class="button-row inherit-colors align-left">
              <a data-cc-animate-click="" class="button alt keychainify-checked" href="index.php?quanly=sanpham&id=30#main_list">
                MUA NGAY
              </a>
            </div></div>
</div>
</div>