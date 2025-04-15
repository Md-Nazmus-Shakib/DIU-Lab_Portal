<?php require('connection.php');
session_start();

if (isset($_POST['addpc'])) {
    $lab_id = $_POST['lab_id'];
    $pc_exist_query = "SELECT * FROM `$lab_id` WHERE pc_name = '$_POST[pc_name]'";
    $result = mysqli_query($con, $pc_exist_query);


    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);

            echo "
                 <script>
                 alert('PC$result_fetch[pc_name]  is already registerd in database');
                 window.location.href = 'admin.php';
                //   window.history.back();
                
                 </script>
                 ";
        } else {
            
            $query = "INSERT INTO `$lab_id` (`pc_name`,`status`) VALUES ('$_POST[pc_name]','$_POST[status]')";
            if (mysqli_query($con, $query)) {
                echo " <script>
         
         window.location.href = 'admin.php';
         alert('PC$_POST[pc_name] pdded succefully. ');
         </script>";
            } else {
                echo "
            <script>
            alert('Cannot Run Query');
            window.location.href = 'admin.php';
            </script>
            ";
            }
        }
    } else {
        echo "
            <script>
            alert('Cannot Run Query');
            window.location.href = 'admin.php';
            </script>
            ";
    }


}


?>