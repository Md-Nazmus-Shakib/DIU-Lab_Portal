<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - DIU Lab Protal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: #f1f1f1;
    }

    header {
      background: #222;
      color: white;
      padding: 1rem 2rem;
      text-align: center;
    }

    .delete-btn {
      position: absolute;
      top: 8px;
      right: 8px;
      background: red;
      color: white;
      border: none;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      cursor: pointer;
    }
    .admin-form{
        width: 30%;
        height: 450px;
        margin-top: 5rem;
        margin-left: 32rem;
        border-radius: 10px;
        background: black;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .admin-form h3{
        font-size: 30px;
        margin-bottom: 3rem;
    }
    .form{
        display: flex;
        
    }
    .input-group{
        /* height: 200px; */
    }
    .admin-form .input-field{
        width: 100%;
    background: #eaeaea;
    margin: 15px 0;
    border-radius: 10px;
    display: flex;
    align-items: center;

    max-height: 60px;
    transition: max-height 0.4s;
    overflow: hidden;
    }
  
.input-field input {
  width: 100%;
  height: 35px; /* adjust as needed */
  background: transparent;
  border: 0;
  outline: 0;
  padding: 10px 15px;
  line-height: 20px;
  margin-top: 2px; /* adjust for vertical centering */
}


.input-field i {
    margin-left: 15px;
    color: black;
}
.btn-field button {
    margin-top: 3rem;
    margin-left: 3rem;
    background: white;
    border: 0;
    outline: 0;
    cursor: pointer;
}
.btn-field .signInbtn{
    border-radius: 13px;
    width: 50%;
    height: 30px;
    font-size: 17px;
    font-weight: 1000;
    border: 0;
    outline: 0;

}
.btn-field p{
    text-align: center;
}
  </style>
  </head>
<body>
  <header>
    <h1>Admin Dashboard - DIU Lab Protal</h1>
  </header>
  
  
  <div class="admin-container">
  
    <div class="admin-form">
    <h3>Sign In</h3>
        <form method="POST" action="admin_login.php" id="signupform">
                <div class="input-group">
                    <!-- <div class="input-field nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Name" id="name" name="name" required>
                    </div> end input field -->

                    <div class="input-field ">
                        <i class="fa-solid fa-at"></i>
                        <input type="text" placeholder="Employee Id" id="emp_id" name="emp_id"required>
                    </div> <!--end input field-->

                    <div class="input-field passField">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" placeholder="Password" id="password" name="password" required>
                        <!-- <button class="showpassword" onclick="togglePassword()"><i class="fa-solid fa-eye"></i></button> -->
                    </div> <!--end input field-->
                   
                </div> <!--end input-group-->
                <div class="btn-field">
                    <p class="text"><a href="#">Forgot Password?</a></p>
                    <button type="submit" class="signInbtn" name="adsignin"><b>Sign In</b></button>
                </div>
                 
            
        </form>
    </div>
  </div>
  </body>
  <?php
  if(isset($_POST['adsignin']) )
  {
      $query = "SELECT * FROM admin WHERE emp_id = '$_POST[emp_id]'";
      $result = mysqli_query($con, $query);
      

      if($result)
      {
          $emp_id = $_POST['emp_id'];
          $password = $_POST['password'];
          $result_fetch = mysqli_fetch_assoc($result);
          if(mysqli_num_rows($result) == 1 )
          {
              
              if($password == $result_fetch['password'])
              {
                  // echo"Hi,dhuke gechi.";
                  $_SESSION['adsigned in']=true;
                  $_SESSION['emp_id']=$result_fetch['emp_id'];
                  header("location:admin.php");
              }
              else
              {
               echo"   <script>
              alert('Incorrect Password!:( Try again!');
              window.location.href = 'admin_login.php';
              </script>
              ";
              }
          }
          
          else
          {
              
               echo"   <script>
              alert( ' $emp_id is not valid! Try again!');
              window.location.href = 'admin_login.php';
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
  ?>
