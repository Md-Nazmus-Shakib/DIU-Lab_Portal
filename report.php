<?php
require('connection.php');
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Report</title>
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
      margin-left: 25rem;
      /* margin-right: 5rem ; */
      margin-top: 2rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      width: 40%;
    }

    .section h2 {
      margin-bottom: 1rem;
      font-size: 15px;
      font-weight: 700;
    }
    .section h3{
        text-align: center;
        margin-bottom: 2rem;
    }
    .dh{
       
        font-size: 30px;
        font-weight: 1000;
        
        margin-left: 40rem;
        margin-top: 2rem;
        
    }

    
    
  </style>
</head>
<body>
  <header>
    <h1>Report Dashboard</h1>
  </header>
  
</html>
<?php 
if(isset($_POST['searchpc'])){
    echo "<div class='dh'>LAB-$_POST[lab_id]</div>";
$sql1 = "SELECT * FROM `problems` WHERE lab_id = '$_POST[lab_id]'";
    $result = mysqli_query($con, $sql1);
   
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo"
       
  <div class='section'>
    <h3>PC-$row[pc_name]</h3>
    <h2>Problem Type : $row[problem_type] </h2>
    <h2>Description : $row[description] </h2>
    <h2>Reporter ID/Name : $row[reporter] </h2>
    <h2>Report Time : $row[submitted_at] </h2>
  </div>
    ";
        }
    }
}
        ?>
