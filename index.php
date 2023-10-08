<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEGETABLES</title>
    <link rel="icon"
        href="./assets/img/veget.png"
        type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
</head>

<body>
    <?php
        session_start();
        include("./admincp/config/config.php");
        include("./assets/pages/header.php");
        include("./assets/pages/main.php");
        include("./assets/pages/menu.php");
        include("./assets/pages/footer.php");
     ?> 
    <script>
    var header = document.getElementById('header');
    var mobileMenu = document.getElementById('mobile-menu');
    var headerHeight = header.clientHeight;
    mobileMenu.onclick = function() {
        var isClosed = header.clientHeight === headerHeight;
        if (isClosed) {
            header.style.height = 'auto';
        } else {
            header.style.height = null;
        }
    }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
    // Show the first tab and hide the rest
    $('#tabs-nav li:first-child').addClass('active');
    $('.tab-content').hide();
    $('.tab-content:first').show();
    // Click function
    $('#tabs-nav li').click(function() {
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();

        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;
    });
    </script>
    <script>
    $(document).ready(function() {

        var back = $(".prev");
        var next = $(".next");
        var steps = $(".step");

        next.bind("click", function() {
            $.each(steps, function(i) {
                if (!$(steps[i]).hasClass('current') && !$(steps[i]).hasClass('done')) {
                    $(steps[i]).addClass('current');
                    $(steps[i - 1]).removeClass('current').addClass('done');
                    return false;
                }
            })
        });
        back.bind("click", function() {
            $.each(steps, function(i) {
                if ($(steps[i]).hasClass('done') && $(steps[i + 1]).hasClass('current')) {
                    $(steps[i + 1]).removeClass('current');
                    $(steps[i]).removeClass('done').addClass('current');
                    return false;
                }
            })
        });

    })
    </script>

<!--     <div id="webchat">
    <style>
        .rw-conversation-container .rw-header {background-color: #ff5e14;}
        .rw-conversation-container .rw-client {background-color: #ff5e14;}
        .rw-conversation-container .rw-response {font-size: 15px; font-weight: 500;}
        .rw-conversation-container .rw-image-frame {width: 50%;}
    </style>
<script>!(function () {
        let e = document.createElement("script"),
            t = document.head || document.getElementsByTagName("head")[0];

        (e.src =
            "https://cdn.jsdelivr.net/npm/rasa-webchat@1.x.x/lib/index.js"),
            // Replace 1.x.x with the version that you want
            (e.async = !0),
            (e.onload = () => {
                window.WebChat.default(
                    {
                        customData: { language: "en" },
                        socketUrl: "http://localhost:5005",
                        // add other props here
                        title: 'GEMSTONEs BOT',
                        subtitle: 'Say hi and get started!',
                        profileAvatar: "https://cdn1.iconfinder.com/data/icons/web-65/48/78-512.png",
                        showFullScreenButton: true,
                        showMessageDate: true,
                        inputTextFieldHint: "Nhập tư vấn để được tư vấn..",
                    },
                    null
                );
            }),
            t.insertBefore(e, t.firstChild);
    })();
    var minute = 1; // to clear the localStorage after 1 minute
    var now = new Date().getTime();
    var setupTime = localStorage.getItem('setupTime');
    if (setupTime == null) {
        localStorage.setItem('setupTime', now)
    } else {
        if(now-setupTime > minute*1*60*1000) {
            localStorage.clear()
            localStorage.setItem('setupTime', now);
        }else{
            <?php
                if(isset($_GET['dangxuat'])){
                    ?>
                    localStorage.clear();
                    <?php
                }
                    ?>
        }
    }
    </script>
</div> -->
</body>

</html>