<?php
@include 'config.php';
session_start();
$doc_Id = $_GET['id'];
$s_date =$_GET['s_date'];
if (isset($_POST['update'])) {
    $cons_time = $_POST['consult_time'];
    $availability = $_POST['availability'];
    $strt_time = $_POST['strt_time'];
    $end_time = $_POST['end_time'];


    // Update the schedule table with the new Doctor_Name and associated doc_id
    if (!empty($strt_time)) {
        mysqli_query($conn, "UPDATE schedule SET d_start_time='$strt_time' WHERE d_id=$doc_Id AND d_date='$s_date'") or die(mysqli_error($conn));
    }
    if (!empty($end_time)) {
        mysqli_query($conn, "UPDATE schedule SET d_end_time='$end_time' WHERE d_id=$doc_Id AND d_date='$s_date'") or die(mysqli_error($conn));
    }
    if (!empty($cons_time)) {
        mysqli_query($conn, "UPDATE schedule SET d_consult_time='$cons_time' WHERE d_id=$doc_Id AND d_date='$s_date'") or die(mysqli_error($conn));
    }
    if (!empty($availability)) {
        mysqli_query($conn, "UPDATE schedule SET availability='$availability' WHERE d_id=$doc_Id AND d_date='$s_date'") or die(mysqli_error($conn));
    }

    $display_msg[] = "Updated successfully!";
    header('location: admin_header.php#dentist1');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Schedule</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/de5a643238.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="form-container">
        <?php
        if (isset($display_msg)) {
            foreach ($display_msg as $message) {
                echo '<div class="display_msg">
                        <span>' . $message . '</span>
                        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                      </div>';
            }
        }
        ?>

        <section class="form-section">
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Update Schedule</h3>
                <div class="form-column">
                <?php
                        $sql = mysqli_query($conn, "SELECT full_name FROM dentist");
                        $row = mysqli_fetch_array($sql);
                            $name = $row['full_name'];
                        ?>
                    <p>Doctor Name: <?php echo $name;?></p>
                        
                </div>
                <input type="hidden" name="sch_d_id" value="<?php echo $doc_Id; ?>">
                <div class="form-column">
                    <p>Start time</p>
                <select name="strt_time">
                        <option value="" disabled selected>select time</option>
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="8:30 AM">8:30 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="1:30 PM">1:30 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="2:30 PM">2:30 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="4:30 PM">4:30 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="5:30 PM">5:30 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                    </select>
                </div>

                <div class="form-column">
                <p>End Time</p>
                    <select name="end_time">
                        <option value="" disabled selected>select time</option>
                        <option value="8:00 AM">8:00 AM</option>
                        <option value="8:30 AM">8:30 AM</option>
                        <option value="9:00 AM">9:00 AM</option>
                        <option value="9:30 AM">9:30 AM</option>
                        <option value="10:00 AM">10:00 AM</option>
                        <option value="10:30 AM">10:30 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="11:30 AM">11:30 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="12:30 PM">12:30 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="1:30 PM">1:30 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="2:30 PM">2:30 PM</option>
                        <option value="3:00 PM">3:00 PM</option>
                        <option value="3:30 PM">3:30 PM</option>
                        <option value="4:30 PM">4:30 PM</option>
                        <option value="5:00 PM">5:00 PM</option>
                        <option value="5:30 PM">5:30 PM</option>
                        <option value="6:00 PM">6:00 PM</option>
                    </select>
                </div>
                <div class="form-column">
                    <p>Consulting Time</p>
                    <input type="number" name="consult_time" class="box">
                </div>
                <div class="form-column">
                    <p>availability</p>
                    <select name="availability" class="box">
                        <option value="yes">yes</option>
                        <option value="no">no</option>
                    </select>
                </div>
                <button type="submit" name="update" class="btn">Update</button>
            </form>
        </section>
    </div>
</body>
</html>
<style>
    body {
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url("https://cdn.pixabay.com/photo/2020/04/29/20/53/clinic-5110540__340.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .form-container {
        background-color: #ffffff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 5px;
        width: 750px; /* Adjust the width as needed */
    }

    h3 {
        text-align: center;
        font-size: 24px;
    }

    p {
        margin: 10px 0;
        font-weight: bold;
    }

    .form-column {
        float: left;
        width: 45%; /* Adjust the width as needed */
        margin-right: 5%;
    }

    .box {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 16px;
    }

    .btn {
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

    .btn:hover {
        background-color: #0056b3;
    }

    .display_msg {
        background-color: #4caf50;
        color: white;
        padding: 10px;
        margin: 10px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .display_msg i {
        cursor: pointer;
    }
</style>
