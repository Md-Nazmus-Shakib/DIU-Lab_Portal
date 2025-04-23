<?php require('connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Signin</title>
</head>

<body>
    <header class="main-head">
        
        <h1>DIU Lab Portal</h1>
        
    </header>
    <div class="container" id="container">
        <div class="form-box" id="1">  
            <h1 class="title">Sign In</h1>
            <div class="underline"></div>
            <form method="POST" action="signin_signup.php" id="signupform">
                <div class="input-group">
                    <!-- <div class="input-field nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Name" id="name" name="name" required>
                    </div> end input field -->

                    <div class="input-field emailField">
                        <i class="fa-solid fa-at"></i>
                        <input type="text" placeholder="Email" id="email" name="email"required>
                    </div> <!--end input field-->

                    <div class="input-field passField">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" placeholder="Password" id="password" name="password" required>
                        <!-- <button class="showpassword" onclick="togglePassword()"><i class="fa-solid fa-eye"></i></button> -->
                    </div> <!--end input field-->
                   
                </div> <!--end input-group-->
                <div class="btn-field">
                    <!-- <p class="text"><a href="#">Forgot Password?</a></p> -->
                    <button type="button" class="forgotbtn" name="forgot" style="background : transparent;color : white;margin-top : 2px;"" onclick="popup('forgot-popup')">Forgot Password?</button>
                    <button type="submit" class="signInbtn" name="signin">Sign In</button>
                </div>
                 
            </form>
            <div class="btn-field1"> 
                <p class="text">If you are not regesterd yet then <b>SignUp</b>.</p>
               <button type="button" onclick="popup('signup-popup')" class="signUpbtn" name="signup">Sign Up</button>
           </div> <!--end btn-field-->
            <div class="google-signup">
                <h1 class="gsign">Or connect with</h1>
                <button type="button"><i class="fa-brands fa-google"></i></button>
            </div>
        </div> <!--end formbox-->



       
    </div> <!-- end containe -->


    <div class="form-box1" id="signup-popup">
        
            <button type="button" onclick="popup('signup-popup')" class="cross-btnn"><i class="fa-regular fa-circle-xmark"></i></button>
        
        <h1 class="title">Sign Up</h1>
        <div class="underline"></div>
        <form method="POST" action="signin_signup.php" id="signupform">
            <div class="input-group2">
                <div class="input-field nameField">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Name" id="name" name="name" required>
                </div> 

                <div class="input-field emailField">
                    <i class="fa-solid fa-at"></i>
                    <input type="text" placeholder="Email" id="email" name="email"required>
                </div> <!--end input field-->

                <div class="input-field passField">
                    <i class="fa-solid fa-key"></i>
                    <input type="password" placeholder="Password" id="password" name="password" required>
                    <!-- <button class="showpassword" onclick="togglePassword()"><i class="fa-solid fa-eye"></i></button> -->
                </div> <!--end input field-->
                <p class="text">Password Suggestions : Maximum <b>8</b> characters.</p>
                <p class="text">Use your <b>DIU student email</b> for signup.</p>
            </div> <!--end input-group-->
            <div class="btn-field2">
                <button type="submit" class="signUpbtn" name="signup">Sign Up</button>
                </div>
             
        </form>
       
        <div class="google-signup">
            <h1 class="gsign">Or connect with</h1>
            <button type="button"><i class="fa-brands fa-google"></i></button>
        </div>
    </div> <!--end formbox-->




    <div class="form-box2" id="forgot-popup">
        
            <button type="button" onclick="popup('forgot-popup')" class="cross-btnn"><i class="fa-regular fa-circle-xmark"></i></button>
        
        <h1 class="title">Forgot Password</h1>
        <div class="underline"></div>
        <form method="POST" action="signin_signup.php" id="forgotform">
            <div class="input-group2">
                

                <div class="input-field emailField">
                    <i class="fa-solid fa-at"></i>
                    <input type="text" placeholder="Email" id="email" name="email"required>
                </div> <!--end input field-->

                <div class="input-field passField">
                    <i class="fa-solid fa-key"></i>
                    <input type="password" placeholder="New Password" id="password" name="password" required>
                    <!-- <button class="showpassword" onclick="togglePassword()"><i class="fa-solid fa-eye"></i></button> -->
                </div> <!--end input field-->
                <p class="text">Password Suggestions : Maximum <b>8</b> characters.</p>
                <p class="text">Use your <b>DIU student email</b> for signup.</p>
            </div> <!--end input-group-->
            <div class="btn-field2">
                <button type="submit" class="signUpbtn" name="forgot" style="font-size : 15px;">Set Password</button>
                </div>
             
        </form>
       
       
    </div> <!--end formbox-->

    <footer style="background-color: transparent; color: black; text-align: center; padding: 20px 10px; font-family: Arial, sans-serif;">
  <div style="max-width: 1200px; margin: auto;">
    <p style="margin: 0; font-size: 16px;">&copy; 2025 DIU Lab Portal. All rights reserved.</p>
    <div style="margin-top: 10px;">
      <a href="#1" style="color: black; margin: 0 10px; text-decoration: none;">Home</a>
      <a href="#" style="color: black; margin: 0 10px; text-decoration: none;">About</a>
      <a href="#" style="color: black; margin: 0 10px; text-decoration: none;">Contact</a>
    </div>
    <div style="margin-top: 10px; font-size: 18px;">
      <a href="#" style="color: black; margin: 0 8px;"><i class="fab fa-facebook-f"></i></a>
      <a href="#" style="color: black; margin: 0 8px;"><i class="fab fa-twitter"></i></a>
      <a href="#" style="color: black; margin: 0 8px;"><i class="fab fa-instagram"></i></a>
    </div>
  </div>
</footer>

  
    <script src="script.js"></script>
</body>

</html>