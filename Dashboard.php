<?php require('connection.php');
session_start();

if (isset($_POST['showlab'])) {
    $_SESSION['show_lab'] = $_POST['lab_id']; // Save selected lab in session

    // Redirect to same page to avoid form resubmission
    header("Location: Dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>Dashboard</title>
</head>

<body>
    <header>
    <?php
        if (isset($_SESSION['signed in']) && $_SESSION['signed in'] == true) {

            echo "
            <div class='user-div'>
            
            <h1><i class='fa-regular fa-user'></i>$_SESSION[name]</h1>
        </div>
         <h1>Welcome To DIU Lab Portal</h1>
       <div class='logout'>
       
        <button type='button' class='lbtn'><a href='logout.php'>Sign Out</a></button>
       </div>
        ";
        } else {
            header("location:signup.php");
        }
        ?>
    </header>
        
    
    <div class="dashboard-section">
        <div class="total">
        <h3>Total Lab</h3>
        <h2>2+</h2>
        </div>
        <div class="total">
        <h3>Total PC</h3>
            <?php
           $labs = ['616', '610']; // Add all lab table names here
           $total = 0;
           foreach ($labs as $lab_id) {
               $sql = "SELECT COUNT(*) AS total_pcs FROM `$lab_id`";
               $result = mysqli_query($con, $sql);
               if ($result) {
                   $row = mysqli_fetch_assoc($result);
                   $total += $row['total_pcs'];
                   
               }
           }
           $total_pc = $total;
           echo "<h2> $total_pc</h2>";
             ?>
        </div>
        <div class="total">
            <h3 style="font-size : 38px;margin-top : 1.2rem">Working PC</h3>
            <?php
            // $sql2 = "SELECT COUNT(DISTINCT CONCAT(lab_id, '-', pc_name)) AS unique_pc_count FROM problems";
            // $result = mysqli_query($con, $sql2);
            // $row = mysqli_fetch_assoc($result);

            $labs = ['616', '610']; // Add all lab table names here
            $total = 0;
            foreach ($labs as $lab_id) {
                $sql = "SELECT COUNT(*) AS working_pc FROM `$lab_id` WHERE `status`='working' ";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $total += $row['working_pc'];
                    
                }
            }
            $working_pc = $total ;
            echo "<h2> $working_pc</h2>";
            ?>
        </div>
        <div class="total">
        <h3 style="font-size : 30px; margin-top: 1.4rem;">Problemetic PC</h3>
        <?php
        $problem_pc = $total_pc-$working_pc;
        echo "<h2 style='margin-top : 0.4rem; '>$problem_pc</h2> ";
         ?>
        </div>
    </div>
     <!--<button type="btn" >Login</button> -->
    <div class="main-prf" id="prblm-popup">
        <div class="problem-form">
            <button type='button' class='cross-btn2' onclick='popup2()'>
                <i class='fa-regular fa-circle-xmark'></i>
            </button>
            <h1>Submit the issue here</h1>
            <form action="submit_problem.php" method="POST">
                <div class="slct-lab">
                    <label for="lab_id" class="lab_id">Select Lab:</label>
                    <select name="lab_id" id="lab_id" class="lab-id" required>
                        <option value=""> Select Lab </option>
                        <option value="616">616</option>
                        <option value="610">610</option>
                        <!-- Load dynamically from DB if needed -->
                    </select>
                </div>


                <div class="pc-number">
                    <label for="pc_name">PC Number:</label>
                    <input type="text" placeholder="PC Number" name="pc_name" required>
                </div>
                <!-- This can be populated using JS when lab is selected -->

                <div class="prblm-type">
                    <label for="problem_type">Problem Type:</label>
                    <select name="problem_type" required>
                        <option value=""> Select Problem </option>
                        <option value="Display Issue">Display Issue</option>
                        <option value="Keyboard Issue">Keyboard Not Working</option>
                        <option value="Keyboard Issue">Mouse Not Working</option>
                        <option value="Network Problem">Network Problem</option>
                        <option value="Power Issue">Power Issue</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="prblm-descp">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" rows="4" placeholder="Optional"></textarea>
                </div>

                <div class="reporter">
                    <label for="reporter">Your Name/ID:</label>
                    <input type="text" name="reporter" placeholder="Optional">
                </div>

                <div class="prblm-submit">
                    <button type="submit" name="submit-problem">Submit Problem</button>
                </div>

            </form>
        </div>
    </div>
    <div class="section">
        <h2>Show Lab</h2>
        <div class="selection-frm">
            <form id="pcForm" method="POST">
                <select name="lab_id" class="labslct" required>
                    <option value="" disabled selected>Select Lab</option>
                    <option value="616">616</option>
                    <option value="610">610</option>
                    <!-- <option value="611">611</option> -->
                    <!-- Labs should be populated from DB -->
                </select>
                </select>
                <button type="submit" name="showlab" class="showbtn">Show Lab</button>
            </form>
        </div>
    </div>





    <?php 


    // After redirection, check if session has lab_id
    $showPopup = false;
    $lab_id = "";

    if (isset($_SESSION['show_lab'])) {
        $lab_id = $_SESSION['show_lab'];
        $showPopup = true;
        $sql = "SELECT * FROM `$lab_id`";
        $result = mysqli_query($con, $sql);

        if ($result) {

            if (mysqli_num_rows($result) > 0) {
                echo "
    <div class='main-container' id='pc-popup'>
        <div class='pc-container'>
            <div class='btnc'>
                <button type='button' class='cross-btn1' onclick='popup1()'>
                    <i class='fa-regular fa-circle-xmark'></i>
                </button>
            </div>
            <div class='hh'><h2 >Lab $lab_id</h2></div>";
                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $count++;
                    echo "
            <div class='main-div'>
                <div class='pc-detail'>
                    <div class='nametag'>
                        <h1> PC-$row[pc_name]</h1>
                    </div>
                    <div class='pc-icon'>
                        <i class='fa-solid fa-desktop fa-2x'></i>
                    </div>";

                    $status = $row['status'];

                    if ($status == 'working') {
                        echo "<div class='status' style='background: green;'></div>";
                    } else if ($status == 'problem') {
                        echo "<div class='status' style='background: red;'></div>";
                    }


                    echo "<div class='pbtn'>
                        <button type='button' class='btnp'onclick='popup2()'>Report</button>
                    </div>
                </div>
            </div>";
            if($count==1){
                echo "<br>";
            }
                }

                echo "
        </div>
    </div>";
                // Clear session so popup doesn't re-show on next refresh
                unset($_SESSION['show_lab']);
            }
        } else {

            echo "
            <script>
            alert('Cannot Run Query');
            window.location.href = 'Dashboard.php';
            </script>
            ";

        }
    }

    ?>



<footer style="background-color: transparent; color: black; text-align: center; padding: 20px 10px; font-family: Arial, sans-serif;margin-top : 130px;">
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