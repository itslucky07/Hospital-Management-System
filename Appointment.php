<?php
session_start();
include('config.php');
$message = [];

if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
} else {
    header('location: login.php');
    exit; // Ensure script stops execution after redirection
}

$current_date = date("Y-m-d"); // Get the current date in the format "YYYY-MM-DD"
$confirmation_message = ""; // Initialize the confirmation message

if (isset($_POST['register'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $email = mysqli_real_escape_string($conn, $_POST['email_id']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $time = mysqli_real_escape_string($conn, $_POST['appointment_time']);
    $date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $formatted_time = date("h:i A", strtotime($time));
    $doctor_name = mysqli_real_escape_string($conn, $_POST['doc_name']);

    // Check if the selected appointment date is in the future
    if ($date < $current_date) {
        $message[] = 'Appointment date should not be less than the current date.';
    } else {
        // Retrieve doctor's schedule for the selected date and time
        $get_Schedule = mysqli_query($conn, "SELECT * FROM schedule WHERE Doctor_Name='$doctor_name' AND d_date='$date'");
        $result = mysqli_fetch_assoc($get_Schedule);

        if ($result) {
            $doctor_id = $result['d_id'];
            $schedule_id = $result['d_id'];
            $start_time = strtotime($result['d_start_time']);
            $end_time = strtotime($result['d_end_time']);
            $selected_time = strtotime($time);

            // Check if the selected time is within the doctor's working hours
            if ($selected_time >= $start_time && $selected_time <= $end_time) {
                // Check if there are existing appointments for the same doctor and overlapping time
                $check_existing_appointments = mysqli_query($conn, "SELECT * FROM `appointment` WHERE `user_id` = '$user_id' AND `appoint_date` = '$date' AND `appoint_time` = '$formatted_time'");

                if (mysqli_num_rows($check_existing_appointments) > 0) {
                    $message[] = 'Appointment slot is already booked by another patient. Please choose a different time slot.';
                } else {
                    // The doctor is available at the chosen date and time, and no conflicting appointment exists
                    $sql_insert = mysqli_query($conn, "INSERT INTO `appointment` (`full_name`, `phone_number`, `email_id`, `city`, `appoint_date`, `appoint_time`) VALUES ('$full_name', '$phone_number', '$email', '$city', '$date', '$formatted_time')");
                    if ($sql_insert) {
                        // Set the confirmation message
                        $confirmation_message = "<div class='order-message-container'>
                            <div class='message-container'>
                               <h3>Thank you!!</h3>
                               <div class='order-detail'>
                                  <span> doctor Name: $doctor_name</span>
                                  <span class='total'> Total: Appointment Date: $date, Time: $formatted_time </span>
                               </div>
                               <div class='customer-details'>
                                  <p> Your Name: <span>$full_name</span> </p>
                                  <p> Your City: <span>$city</span> </p>
                                  <p> Appointment Successful</p>
                               </div>
                               <a href='teeth.php' class='btn'>OK</a>
                            </div>
                        </div>";
                    } else {
                        $message[] = 'Registration failed: ' . mysqli_error($conn);
                    }
                }
            } else {
                $message[] = 'The selected time is outside of the doctor\'s working hours.';
            }
        } else {
            $message[] = 'Doctor not found for the selected date.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Appointment Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Apply a background color */
        body {
            background-color: #f0f0f0;
            font-family: 'Jost', sans-serif;
            background-image: url("https://s-i.huffpost.com/gen/3991424/images/o-DOCTOR-facebook.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Style the main container */
        .main {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 7px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style the form elements */
        .form-group {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        .form-group label {
            font-weight: bold;
            width: 45%;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="email"],
        .form-group input[type="date"],
        .form-group select {
            width: 50%;
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
        }

        /* Style the buttons */
        .form-btn {
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Add some animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .error-message {
            color: red;
            animation: fadeIn 0.5s ease;
        }

        /* Additional styles can be added as needed */
        /* Style the table */
        .table {
            width: 100%;
            background-color: white;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Style the table header */
        .table thead {
            background-color: #007bff;
            color: #fff;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        /* Style the action buttons */
        .action_btn {
            display: flex;
            justify-content: space-between;
        }

        .action_btn a {
            text-decoration: none;
            padding: 5px 10px;
            margin: 0 5px;
            border: 1px solid #007bff;
            color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .action_btn a:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* Style the "Delete" button */
        .action_btn .btn-delete {
            background-color: #ff0000;
            border-color: #ff0000;
            color: #fff;
        }

        .action_btn .btn-delete:hover {
            background-color: #ff0000;
        }

        /* Style the "Edit" button */
        .action_btn .btn-edit {
            background-color: #4caf50;
            border-color: #4caf50;
            color: #fff;
        }

        .action_btn .btn-edit:hover {
            background-color: #4caf50;
        }

        /* CSS */
        #doctor-name {
            font-weight: bold;
        }

        /* CSS */
        p {
            font-weight: bold;
        }

        /* CSS */
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: center;
            color: blueviolet;
        }

        /* Styles for the order message container */
        .order-message-container {
            background-color: lightblue;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 400px;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
        }

        /* Styles for the message container within the order message */
        .message-container {
            padding: 20px;
        }

        /* Styles for the "Thank you!!" heading */
        .message-container h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Styles for order details section */
        .order-detail {
            margin: 20px 0;
        }

        /* Styles for service name and total price */
        .order-detail span {
            display: block;
            font-size: 18px;
            color: #555;
            margin-bottom: 10px;
        }

        /* Style for the message */
        .message {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: lightblue;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }

        .message ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .message li {
            color: lightblue;
            margin: 0;
            padding: 0;
        }

        .message .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            color: white;
        }

        /* Style for the "Continue Shopping" button */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: blue;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            color: black;
            transform: scale(1.05);
            transition: ease-in 0.2s;
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
            text-align: center;
            color: blueviolet;
        }

        /* Media query for smaller screens */
        @media screen and (max-width: 768px) {
            .message-container {
                max-width: 90%;
            }
        }
    </style>

    <script>
        function closeMessage() {
            var message = document.getElementById("paymentMessage");
            message.style display = "none";
        }

        function showMessage() {
            var message = document.getElementById("paymentMessage");
            message.style.display = "block";
            setTimeout(function () {
                message.style.display = "none";
            }, 8000); // 8 seconds
        }

        // Show the message when the page loads
        showMessage();
    </script>
</head>

<body>
    <?php
    foreach ($message as $msg) {
        echo '<p class="error-message">' . $msg . '</p>';
    }

    // Display the confirmation message if it's set
    echo $confirmation_message;
    ?>
    <div class="main">
        <div class="Appointment">
            <form method="POST" action="Appointment.php">
                <h2>Appointment</h2>
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>
                <div class="form-group">
                    <p>Doctor Name</p>
                    <select name="doc_name" class="box">
                        <?php
                        $sql = mysqli_query($conn, "SELECT `Doctor_Name` FROM `schedule` where availability='yes'");
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $name = $row['Doctor_Name'];
                            echo "<option value='" . htmlspecialchars($name) . "'>$name</option>"; // Sanitize the output
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                  <input type="tel" id="phone_number" name="phone_number" pattern="[0-9]{10}" title="Please enter a 10-digit phone number" placeholder="Number" required>

                </div>
                <div class="form-group">
                    <label for="email_id">Email ID</label>
                    <input type="email" id="email_id" value="<?php echo $_SESSION["useremail"] ?>" name="email_id" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="appointment_time">Appointment Time</label>
                    <select name="appointment_time" required>
                        <option value="" disabled selected>select time</option>
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="appointment_date">Appointment Date</label>
                    <input type="date" id="appointment_date" name="appointment_date" required>
                </div>
                <div class="form-btn">
                    <button type="submit" name="register" class="btn">Apply</button>
                    <button type="button" onclick="goBack();" class="btn">Back</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Doctor Name</th>
                <th scope="col">Schedule Date</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Consulting Time</th>
                <th scope="col">Availability</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $schedule = mysqli_query($conn, "SELECT * FROM `schedule`");
            while ($row = mysqli_fetch_assoc($schedule)) {
                echo "
                      <tr>
                          <td>" . htmlspecialchars($row['Doctor_Name']) . "</td>
                          <td>" . htmlspecialchars($row['d_date']) . "</td>
                          <td>" . htmlspecialchars($row['d_start_time']) . "</td>
                          <td>" . htmlspecialchars($row['d_end_time']) . "</td>
                          <td>" . htmlspecialchars($row['d_consult_time']) . " min</td>
                          <td>" . htmlspecialchars($row['availability']) . "</td> 
                      </tr>
                  ";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
<style>
    #phone_number {
        border: 1px solid #ccc; /* Add a 1px solid border */
        border-radius: 5px; /* Add a 5px border radius */
        padding: 7px; /* Add some padding to make it look better */
        width: 50%; /* Set the desired width */
        font-size: 16px;
        outline: none;
    }

    #phone_number::placeholder {
        color: #999; /* Style the placeholder text color */
    }
</style>
