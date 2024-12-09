<?php
session_start();
@include('config.php');
$message = array();

if (isset($_POST['register'])) {
    $doctor_name = $_POST['doc_name'];
    $sch_date = $_POST['sch_date'];
    $con_time = $_POST['consult_time'];
    $strt_time = date("h:i A", strtotime($_POST['strt_time']));
    $end_time = date("h:i A", strtotime($_POST['end_time']));
    // Get the doctor's ID based on the selected full name
    $doctor_query = "SELECT doc_id FROM dentist WHERE full_name = '$doctor_name'";
    $doctor_result = mysqli_query($conn, $doctor_query);

    if ($doctor_row = mysqli_fetch_array($doctor_result)) {
        $doctor_id = $doctor_row['doc_id'];

        // Check if the schedule already exists for the same doctor and date
        $schedule_query = "SELECT * FROM schedule WHERE d_id = $doctor_id AND d_date = '$sch_date'";
        $schedule_result = mysqli_query($conn, $schedule_query);

        if (mysqli_num_rows($schedule_result) > 0) {
            $message[] = 'Schedule already exists for this doctor on the selected date!';
        } else {
            // Insert the schedule with the doctor's ID
            $sql1 = "INSERT INTO schedule (d_id, Doctor_Name, d_date, d_start_time, d_end_time, d_consult_time) VALUES ($doctor_id, '$doctor_name', '$sch_date', '$strt_time', '$end_time', '$con_time')";

            if (mysqli_query($conn, $sql1)) {
                $message[] = 'Schedule added successfully!';
                header('location: admin_header.php');
            } else {
                $message[] = 'Registration failed: ' . mysqli_error($conn);
            }
        }
    } else {
        $message[] = 'Invalid doctor selected!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <title>schedule</title>
</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '<p>' . $msg . '</p>';
        }
    }
    ?>
    <div class="main">
        <div class="schedule">
            <form method="POST">
                <p style="color:red;">
                    <?php
                    if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    }
                    ?>
                </p>
                <section class="form-section">
                    <h2>Add Schedule</h2>
                    <label>Doctor Name</label>
                    <select name="doc_name" required>
                        <?php
                        $sql = mysqli_query($conn, "SELECT full_name FROM dentist");
                        while ($row = mysqli_fetch_array($sql)) {
                            $name = $row['full_name'];
                            echo "<option value='$name'>$name</option>";
                        }
                        ?>
                    </select>
                    <label>Schedule Date</label>
                    <input type="date" name="sch_date" required>
                    <label>Start Time</label>
                    <select name="strt_time" required>
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
                    <label>End Time</label>
                    <select name="end_time" required>
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
                    <label>Consulting Time</label>
                    <input type="number" name="consult_time" required>
                    <button type="submit" name="register">Schedule</button>
                </section>
            </form>
        </div>
    </div>
</body>
</html>

<style>
    /* Reset default styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* General styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        color: #333;
        background-image: url("https://i.pinimg.com/originals/21/ee/52/21ee5269d048fc7689a5d05ae0479930.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    /* Form styling */
    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .schedule {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    .schedule input,
    .schedule select,
    .schedule button {
        display: block;
        width: 100%;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .schedule label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .schedule button {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Add more CSS styles as needed */
</style>