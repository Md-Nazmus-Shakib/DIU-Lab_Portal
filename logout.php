<?php 
session_start();
// unset( $_SESSION['signed in']);
// session_destroy();
// header("location:signup.php");
if (isset($_SESSION['signed in'])) {
   unset($_SESSION['signed in']);
   header("location:signup.php");
}

?> 

