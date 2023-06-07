<?php
    $connect = mysqli_connect("localhost", "root", "1234", "codetree");
    if (mysqli_connect_error()) {
        echo "DB Connect error";
    }
?>