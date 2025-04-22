<?php
require('connection.php');
session_start();

if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $query = "SELECT * FROM `register_table` WHERE email = '$_GET[email]' AND verification_code = '$_GET[v_code]'";
    $result = mysqli_query($con, $query);
    if($result)
    {
        $result_fetch=mysqli_fetch_assoc($result);
        if($result_fetch['is_verified'] == 0)
        {
            $update = "UPDATE `register_table` SET `is_verified`='1' WHERE email = '$result_fetch[email]'";
            if(mysqli_query($con, $update)){
                echo"   <script>
                alert('Email verification successful!');
                window.location.href = 'signup.php';
                </script>
                ";
                
            }
        }
        else{
            echo"   <script>
                alert('ICannot Run Querry');
                window.location.href = 'signup.php';
                </script>
                ";
        }
    }
    else{
        echo"   <script>
                alert('Email Already Registerd.');
                window.location.href = 'signup.php';
                </script>
                ";
    }
}
?>