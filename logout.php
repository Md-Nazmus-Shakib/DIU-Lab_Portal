<!-- //<?php
//session_start();
//session_unset();
//session_destroy();
//header("location:signup.php");
//?> -->
<?php
session_start();

 if (isset($_SESSION['adsigned in']) && $_SESSION['adsigned in'] == true) {

   session_unset();
   session_destroy();
   header("location:admin_login.php");
   exit();
}
else  if (isset($_SESSION['signed in']) && $_SESSION['signed in'] == true) {

    session_unset();
   session_destroy();
   header("location:signup.php");
   exit();
}
?>