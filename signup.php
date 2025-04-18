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
    <div class="nav">
        <p>this is nav</p>
<!--         
        <button type="btn" >Login</button> -->
    </div>
    <div class="container" id="container">
        <div class="form-box">  
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
                    <p class="text"><a href="#">Forgot Password?</a></p>
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
    </di> <!--end formbox-->



  
    <script src="script.js"></script>
</body>

</html>