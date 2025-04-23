<?php
require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Lab PC Management</title>
  
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

    .container {
      padding: 2rem;
      max-width: 1200px;
      margin: auto;
    }

    .section {
      background: white;
      border-radius: 8px;
      padding: 1.5rem;
      margin-bottom: 2rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .section h2 {
      margin-bottom: 1rem;
      font-size: 20px;
    }

    form input,
    form select,
    form button {
      padding: 0.5rem;
      margin-right: 0.5rem;
      margin-bottom: 1rem;
    }

    .pc-boxes {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
    }

    /* .pc-box {
      background: #dceefb;
      border-radius: 8px;
      padding: 1rem;
      width: 150px;
      text-align: center;
      box-shadow: 0 1px 3px rgba(0,0,0,0.2);
      position: relative;
    }

    .pc-box p {
      margin: 0.5rem 0;
    } */

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
    .user-div1{
      width: 100%;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }
    .user-div{
      width: 10%;
      margin-left: 5px;
    }
    .user-div1 .logout .lbtn{ 
      width: 130%;
      height: 30px;
      border-radius: 13px;
      text-decoration: none;
      background: white;
      margin-top: 0.2rem;
      font-size: 20px;
      font-weight: 770;
      border: 0;
      outline: 0;
    }
    .lbtn a{
      color: black;
      text-decoration: none;
    }
    .dashboard-section{
    display: flex;
    flex-direction: row;
    justify-content: center;
    background: transparent;
    margin-top: 5rem;
    margin-left: 5rem;

  }
  .total{
    background: black;
    color: white;
    border-radius: 10px;
    width: 250px;
    height: 150px;
    margin-right: 5rem;
    
    box-shadow: 0 1px 3px rgba(63, 57, 57, 0.2);
  }
  .total h3{
    text-align: center;
    font-size: 40px;
    margin-top: 1rem;
  }
  .total h2{
    text-align: center;
    font-family :'Courier New', Courier, monospace;
    font-size: 60px;
    margin-top: .001rem;
  }
  </style>
  </head>
<body>
  <header>
   
    <?php
        if (isset($_SESSION['adsigned in']) && $_SESSION['adsigned in'] == true) {

            echo "
            <div class='user-div1'>
            <div class='user-div'>
            
            <h1><i class='fa-regular fa-user'></i>$_SESSION[emp_id]</h1>
        </div>
         <h1>Admin Dashboard - DIU Lab Portal</h1>
       <div class='logout'>
       
        <button type='button' class='lbtn'><a href='admin_logout.php'>Sign Out</a></button>
       </div>
       </div>
        ";
        } else {
          echo "
          <script>
          alert('Incorrect Password!:( Try again!');
          </script>
          ";
            header("location:admin_login.php");
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
           $total_pc=$total;
           echo "<h2> $total_pc</h2>";
             ?>
        </div>
        <div class="total">
            <h3 style="font-size : 38px;margin-top : 1.2rem">Working PC</h3>
            <?php
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

  <div class="container">
    
    <div class="section">
      <h2>Add New PC to a Lab</h2>
      <form id="pcForm" method="POST" action="dashDb.php">
        <select name="lab_id" required>
          <option value="">Select Lab</option>
          <option value="616">616</option>
          <option value="610">610</option>
          <!-- Labs should be populated from DB -->
        </select>
        <input type="text" placeholder="PC Number" name="pc_name" required>
        <select name="status">
          <option value="working">Working</option>
          <option value="problem">Problematic</option>
        </select>
        <button type="submit" name="addpc">Add PC</button>
      </form>
    </div>

    <div class="section">
      <h2>Delete PC from a Lab</h2>
      <form id="pcForm" method="POST" action="dashDb.php">
        <select name="lab_id" required>
          <option value="">Select Lab</option>
          <option value="616">616</option>
          <option value="610">610</option>
          <!-- Labs should be populated from DB -->
        </select>
        <input type="text" placeholder="PC Number" name="pc_name" required>
        <select name="status">
          <option value="Solve">Solve</option>
          <option value="Processing">Problematic</option>
        </select>
        
        <button type="submit" name="deletepc">Delete PC</button>
      </form>
    </div>
    <div class="section">
      <h2>Update Status</h2>
      <form id="pcForm" method="POST" action="dashDb.php">
        <select name="lab_id" required>
          <option value="">Select Lab</option>
          <option value="616">616</option>
          <option value="610">610</option>
          <!-- Labs should be populated from DB -->
        </select>
        <input type="text" placeholder="PC Number" name="pc_name" >
        
        <button type="submit" name="update">Update</button>
      </form>
    </div>

    <!-- PC Display Section -->
    <div class="section">
      <h2>Show Report</h2>
      <form id="pcForm" method="POST" action="report.php" target="_blank">
        <select name="lab_id" required>
          <option value=""  disabled selected>Select Lab</option>
          <option value="616">616</option>
          <option value="610">610</option>
          <!-- Labs should be populated from DB -->
        </select>
        
        
        <button type="submit" name="searchpc">Search</button>
      </form>
        <!-- Dynamically added PC boxes will appear here -->
      </div>
    </div>
  </div>

  </body>
  </html>