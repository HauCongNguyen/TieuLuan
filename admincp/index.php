<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"
        href="../assets/img/veget.png"
        type="image/x-icon" />
    <link rel="stylesheet" href="./css/styleadmincp.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title>CTU VEGETABLES</title>
</head>
<?php
 session_start();
 if(!isset($_SESSION['dangnhap'])){
 	header('Location:login.php');
 } 
?>

<body>
    <h3 class="title_admin"><a href="index.php">Trang quản lý sản phẩm</a></h3>
    <div class="wrapper">
        <?php
            include("./config/config.php");
            include("./modules/menu.php");
            include("./modules/main.php");
            include("./modules/footer.php");
        ?>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
    CKEDITOR.replace('tomtat');
    CKEDITOR.replace('noidung');
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        thongke();
        var char = new Morris.Bar({

            element: 'chart',

            xkey: 'date',

            ykeys: ['order', 'sales', 'quantity'],

            labels: ['Số đơn hàng', 'Doanh thu', 'Số lượng bán'],

            barColors: ["#B21516", "#1531B2", "#1AB244", "#B29215"]
        });

        $('.custom-select').change(function() {
            var thoigian = $(this).val();
            if (thoigian == '7ngay') {
                var text = '7 ngày qua';
            } else if (thoigian == '28ngay') {
                var text = '28 ngày qua';
            } else if (thoigian == '90ngay') {
                var text = '90 ngày qua';
            } else if (thoigian == '1ngay') {
                var text = 'Hôm nay';
            } 
            else {
                var text = '365 ngày qua';
            }

            $.ajax({
                url: "modules/thongke.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    thoigian: thoigian
                },
                success: function(data) {
                    char.setData(data);
                    $('#text-date').text(text);
                }
            });
        })

        function thongke() {
            var text = '365 ngày qua';
            $('#text-date').text(text);
            $.ajax({
                url: "modules/thongke.php",
                method: "POST",
                dataType: "JSON",
                success: function(data) {
                    char.setData(data);
                    $('#text-date').text(text);
                }
            });
        }
    });
    </script>
</body>

</html>