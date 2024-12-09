<?php
// Include your database configuration file
@include 'config.php';

if (isset($_POST['delete'])) {
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $email_id = $_POST['email_id'];
    $city = $_POST['city'];
    $appointment_time = $_POST['appointment_time'];
    $appointment_date = $_POST['appointment_date'];

    // Construct the SQL query to delete the appointment
    $query = "DELETE FROM appointment_details WHERE ";
    $conditions = [];

    if (!empty($full_name)) {
        $conditions[] = "full_name = '$full_name'";
    }
    if (!empty($phone_number)) {
        $conditions[] = "phone_number = '$phone_number'";
    }
    if (!empty($email_id)) {
        $conditions[] = "email_id = '$email_id'";
    }
    if (!empty($city)) {
        $conditions[] = "city = '$city'";
    }
    if (!empty($appointment_time)) {
        $conditions[] = "appointment_time = '$appointment_time'";
    }
    if (!empty($appointment_date)) {
        $conditions[] = "appointment_date = '$appointment_date'";
    }

    if (!empty($conditions)) {
        $query .= implode(' AND ', $conditions);

        // Execute the delete query
        $result = mysqli_query($conn, $query);

        if ($result) {
            $display_msg = "Appointment(s) deleted successfully.";
        } else {
            $display_msg = "Error deleting appointment(s). Please try again later.";
        }
    } else {
        $display_msg = "No criteria provided for deletion.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Appointment</title>
</head>
<body>
    <h2>Delete Appointment</h2>

    <?php
    if (isset($display_msg)) {
        echo "<p>$display_msg</p>";
    }
    ?>

    <form action="" method="post">
        <p>Full Name</p>
        <input type="text" name="full_name" placeholder="Enter full name">
        
        <p>Phone Number</p>
        <input type="text" name="phone_number" placeholder="Enter phone number">
        
        <p>Email ID</p>
        <input type="text" name="email_id" placeholder="Enter email ID">
        
        <p>City</p>
        <input type="text" name="city" placeholder="Enter city">
        
        <p>Appointment Time</p>
        <input type="text" name="appointment_time" placeholder="Enter appointment time">
        
        <p>Appointment Date</p>
        <input type="text" name="appointment_date" placeholder="Enter appointment date">
        
        <br>
        <input type="submit" value="Delete Appointment" name="delete">
    </form>
</body>
</html>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            text-align: left;
        }

        p {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>