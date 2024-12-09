<?php 
@include('config.php');
    if (isset($_POST['update_status'])) {
        $appointmentStatus = $_POST['status'];
        $appoint_id = $_POST['appoint_id'];
                        
                            
        $updateQuery = "UPDATE appointment SET status = '$appointmentStatus' WHERE appoint_id = $appoint_id";
        $result = mysqli_query($conn, $updateQuery);
                        
        if ($result) {
             header('location: Admin_header.php#orders_spacing');
        }
        else {
            echo "Error updating appointment status: " . mysqli_error($conn);
        }
    }
?>
