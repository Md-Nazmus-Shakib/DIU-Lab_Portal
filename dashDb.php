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
         alert('PC$_POST[pc_name] added succefully. ');
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


if (isset($_POST['deletepc'])) {
    $lab_id = $_POST['lab_id'];
    
    $pc_exist_query = "SELECT * FROM `$lab_id` WHERE pc_name = '$_POST[pc_name]'";
    $result = mysqli_query($con, $pc_exist_query);


    if ($result) {
        if (mysqli_num_rows($result) == 0) {
            $result_fetch = mysqli_fetch_assoc($result);

            echo "
                 <script>
                 alert('PC not found in database');
                 window.location.href = 'admin.php';
                //   window.history.back();
                
                 </script>
                 ";
        } else {
            
            $query = "DELETE FROM `$lab_id` WHERE pc_name=$_POST[pc_name]";
            if (mysqli_query($con, $query)) {
                echo " <script>
         
         window.location.href = 'admin.php';
         alert('PC$_POST[pc_name] deleted succefully. ');
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
if (isset($_POST['update'])) {
    $lab_id = $_POST['lab_id'];
    
    $pc_exist_query = "SELECT * FROM `$lab_id`";
    $result = mysqli_query($con, $pc_exist_query);


    if ($result) {
        if (mysqli_num_rows($result) == 0) {
            $result_fetch = mysqli_fetch_assoc($result);

            echo "
                 <script>
                 alert('PC not found in database');
                 window.location.href = 'admin.php';
                //   window.history.back();
                
                 </script>
                 ";
        } else {
            $lab_id = $_POST['lab_id'];
            $pc_name = $_POST['pc_name'];
             if(empty($pc_name))
             {
                $update_query = "UPDATE `$lab_id` SET `status`='working'";
             }
             else{
                $update_query = "UPDATE `$lab_id` SET `status`='working' WHERE pc_name = '$_POST[pc_name]'";
             }
            
            if (mysqli_query($con, $update_query)) {
                echo " <script>
         
         window.location.href = 'admin.php';
         alert('Thanks for your help. Status Updated succefully!.');
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