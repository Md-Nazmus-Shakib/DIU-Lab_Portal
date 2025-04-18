<?php require('connection.php');
session_start();

if (isset($_POST['submit-problem'])) {
    $lab_id = $_POST['lab_id'];
    $pc_name = $_POST['pc_name'];
    $problem_type = $_POST['problem_type'];
    $description = $_POST['description'];
    $reporter = $_POST['reporter'];
    $time = date("Y-m-d H:i:s");


    // $pc_exist_query = "SELECT * FROM `$lab_id` WHERE pc_name = '$_POST[pc_name]'";
    // $result = mysqli_query($con, $pc_exist_query);
    $query = "INSERT INTO `problems`(`lab_id`, `pc_name`, `problem_type`, `description`, `reporter`) VALUES ('$_POST[lab_id]','$_POST[pc_name]','$_POST[problem_type]','$_POST[description]','$_POST[reporter]')";
    if (mysqli_query($con, $query)) {
        $update_query = "UPDATE `$lab_id` SET `status`='problem' WHERE pc_name = '$_POST[pc_name]'";
        mysqli_query($con, $update_query);
        echo " <script>
         
         window.location.href = 'Dashboard.php';
         alert('Thank You!  For submitterd your problem. Stay tuned. ');
          
        
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

?>