<?php
require('connection.php');
session_start();
// require('signup.php');
// for login
    if(isset($_POST['signin']) )
    {
        $query = "SELECT * FROM register_table WHERE email = '$_POST[email]'";
        $result = mysqli_query($con, $query);

        if($result)
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(mysqli_num_rows($result) == 1)
            {
                $result_fetch = mysqli_fetch_assoc($result);
                if(password_verify($_POST['password'],$result_fetch['password']))
                {
                    // echo"Hi,dhuke gechi.";
                    $_SESSION['signed in']=true;
                    $_SESSION['name']=$result_fetch['name'];
                    header("location:Dashboard.php");
                }
                else
                {
                 echo"   <script>
                alert('Incorrect Password!:( ');
                window.location.href = 'signup.php';
                </script>
                ";
                }
            }
            else
            {
                
                 echo"   <script>
                alert( ' $email is not regesitered!');
                window.location.href = 'signup.php';
                </script>
                ";
                
            }
           
        }
        else
        {
            echo " <script>
            alert('Cannot Run Query');
            window.location.href = 'signup.php';
            </script>
            ";
        }

    }
// for regesration

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!str_ends_with($email, "@diu.edu.bd")) {
        echo "<script>alert('Invalid email.'); window.history.back();</script>";
        exit;
    }
    if (strlen($password) < 6 || strlen($password) > 8) {
        echo "<script>alert('Password must be 6-8 characters.'); window.history.back();</script>";
        exit;
    }
    $user_exist_query = "SELECT * FROM register_table WHERE email = '$_POST[email]'";
    $result = mysqli_query($con, $user_exist_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['email'] == $_POST['email']) {
                echo "
                 <script>
                 alert('$result_fetch[email] - email is already registerd');
                 window.location.href = 'signup.php';
                  window.history.back();
                
                 </script>
                 ";
            }
        } else {
            $password1 = password_hash($_POST['password'],PASSWORD_BCRYPT);
            $query = "INSERT INTO `register_table`(`name`, `email`, `password`) VALUES ('$_POST[name]','$_POST[email]','$password1')";
            if (mysqli_query($con, $query)) {
                echo " <script>
                 
                 window.location.href = 'signup.php';
                 alert('Welcome!  $name  regestration succefull. ');
                  
                
                 </script>";
            } else {
                echo "
                    <script>
                    alert('Cannot Run Query');
                    window.location.href = 'signup.php';
                    </script>
                    ";
            }
        }
    } else {
        echo "
            <script>
            alert('Cannot Run Query');
            window.location.href = 'signup.php';
            </script>
            ";
    }
}
?>