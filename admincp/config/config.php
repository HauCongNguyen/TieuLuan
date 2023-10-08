<?php
    $mysqli = new mysqli("localhost","root","","nlcs");

    // Check connection
    if ($mysqli->connect_errno) {
    echo "Kết nối mysqli lỗi " . $mysqli->connect_error;
    exit();
    }
?>