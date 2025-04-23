<?php 
session_start();

if (isset($_SESSION['adsigned in'])) {
    unset($_SESSION['adsigned in']);
    
    header("location:admin_login.php");
}

?> 