<?php
require('connection.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($email,$v_code) {
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('khan35-998@diu.edu.bd', 'DIU Lab Protal');

        $mail->addAddress($email);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body    = "Thanks for registration!</b>Click the link below to verify the email address.
        <br><button style ='background : white; color : black;'><a href='http://localhost/DIU-Lab_Portal/verify.php?email=$email&v_code=$v_code'>Verify</a></button>";
        
        
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }

}
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
            $result_fetch = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) == 1 && $result_fetch['is_verified']==1)
            {
                
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
            else if(mysqli_num_rows($result) == 1 && $result_fetch['is_verified']==0)
            {
                echo"   <script>
                alert( ' Your email is not verified!');
                window.location.href = 'signup.php';
                </script>
                ";
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
            $v_code = bin2hex(random_bytes(16));
            $query = "INSERT INTO `register_table`(`name`, `email`, `password`,`verification_code`, `is_verified`) VALUES ('$_POST[name]','$_POST[email]','$password1','$v_code','0')";
            if (mysqli_query($con, $query) && sendEmail($_POST['email'],$v_code)) {
                echo " <script>
                 
                 window.location.href = 'signup.php';
                 alert('Welcome!  $name.You are regesterd succefully. ');
                  
                
                 </script>";
            } else {
                echo "
                    <script>
                    alert('Server Down');
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
<<<<<<< HEAD

if (isset($_POST['forgot'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
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
                $password1 = password_hash($_POST['password'],PASSWORD_BCRYPT);
            
            $query = "UPDATE `register_table` SET `password`='$password1' WHERE  email =' $_POST[email]'";
            if (mysqli_query($con, $query) ) {
                echo " <script>
                 
                 window.location.href = 'signup.php';
                 alert('Congratulation $name! Welcome back. ');
                  
                
                 </script>";
            } else {
                echo "
                    <script>
                    alert('Server Down');
                    window.location.href = 'signup.php';
                    </script>
                    ";
            }
            }
        } else {
            echo "
                    <script>
                    alert('$email is not registerd! Try again.');
                    window.location.href = 'signup.php';
                    </script>
                    ";
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
=======
?>
>>>>>>> 3730c2a902b5eadaaa471cd6cb149cb1d594042b
