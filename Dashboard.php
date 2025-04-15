<?php require('connection.php');
session_start();
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
    <div class="nav">
    <?php
    if (isset($_SESSION['signed in']) && $_SESSION['signed in'] == true)
     {
        
        echo"
        <h1>Hi!, $_SESSION[name]</h1>
       <div class='logout'>
       
        <button type='button' class='lbtn'><a href='logout.php'>Sign Out</a></button>
       </div>
        ";
    }
    else
    {
        header("location:signup.php");
    }
    ?>
        <!--         
        <button type="btn" >Login</button> -->
    </div>
    <div class="labroom">
        <button type="button" class="labno" name="616" onclick="popup1('pc-popup')" >
        <h1>LR-616</h1></button>

        <button class="labno" name="610" onclick="popup2('pc-popup1')">
        <h1>LR-610</h1></button>
        </div>
    </div>
    
 <!-- for 616    -->
<div class="main-container" id="pc-popup">
    <div class="pc-container" >
        
    <div class="btnc">
            <button type="button" class="cross-btn1" onclick="popup1('pc-popup')"><i class="fa-regular fa-circle-xmark"></i></button>
        </div>
        <h1 class="hh">LAB-616</h1>
        <?php
    // if(isset($_GET['616'])){
    //     $lab_number='616';
    // }
    
        // $lab_number = $_GET['labno'];
        // $sql = "SELECT * FROM `616`";
        $sql = "SELECT * FROM `616`";
        $result = mysqli_query($con, $sql);    
        //
            // if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result))
                {
                    // echo var_dump($row);
                    // echo "<br>";
                    echo "<div class='main-div'>
                    <div class='pc-detail'>
            <div class='nametag'><h1> PC-$row[pc_name]</h1></div>
            <div class='pc-icon'>
            <i class='fa-solid fa-desktop fa-2x'></i>
            </div>
            <div class='status'></div>
            <div class='pbtn'>
            <button class='btnp'>Problem</button>
        </div>
        </div>
        </div>";
                }
            // } else {
            //     echo "No data found for Lab Room ";
            // }
        // } else {
        //     echo "Query error: " . mysqli_error($con);
        // }
    
    ?> 
        
        
    </div>
    </div>


<!-- for 610 -->
    <div class="main-container" id="pc-popup1">
    <div class="pc-container" >
        
    <div class="btnc">
            <button type="button" class="cross-btn1" onclick="popup2('pc-popup1')"><i class="fa-regular fa-circle-xmark"></i></button>
        </div>
        <h1 class="hh">LAB-610</h1>
        <?php
    // if(isset($_GET['616'])){
    //     $lab_number='616';
    // }
    
        // $lab_number = $_GET['labno'];
        // $sql = "SELECT * FROM `616`";
        $sql = "SELECT * FROM `610`";
        $result = mysqli_query($con, $sql);    
        //
            // if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result))
                {
                    // echo var_dump($row);
                    // echo "<br>";
                    echo "<div class='main-div'>
                    <div class='pc-detail'>
            <div class='nametag'><h1> PC-$row[pc_name]</h1></div>
            <div class='pc-icon'>
            <i class='fa-solid fa-desktop fa-2x'></i>
            </div>
            <div class='status'></div>
            <div class='pbtn'>
            <button class='btnp'>Problem</button>
        </div>
        </div>
        </div>";
                }
            // } else {
            //     echo "No data found for Lab Room ";
            // }
        // } else {
        //     echo "Query error: " . mysqli_error($con);
        // }
    
    ?> 
        
        
    </div>
    </div>

    <script src="script.js"></script>
    
</body>

</html>