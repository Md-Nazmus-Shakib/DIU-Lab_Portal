<?php
    $con=mysqli_connect("localhost","root","","diulab");
    if(mysqli_connect_error()){
        echo"<script>alert('cannot connect');</script>";
        exit();
    }
?>