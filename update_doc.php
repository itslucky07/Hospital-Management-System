<?php
@include ('config.php');
session_start();
$doc_Id = $_GET['id'];
if (isset($_POST['update'])) {
    $Full_Name = $_POST['full_name'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['Gender'];
    $address = $_POST['Address'];
    $contact = $_POST['contact_number'];
    $email = $_POST['email'];
    $degree = $_POST['degree'];
    $speciality = $_POST['doctor_speciality'];

    // Update other fields
    if (!empty($Full_Name)) {
        mysqli_query($conn, "UPDATE dentist SET full_name='$Full_Name' WHERE doc_id=$doc_Id") or die(mysqli_error($conn));
    }
    if (!empty($birthday)) {
        mysqli_query($conn, "UPDATE dentist SET birthdate='$birthday' WHERE doc_id=$doc_Id") or die(mysqli_error($conn));
    }
    if (!empty($gender)) {
        mysqli_query($conn, "UPDATE dentist SET gender='$gender' WHERE doc_id=$doc_Id") or die(mysqli_error($conn));
    }
    if (!empty($address)) {
        mysqli_query($conn, "UPDATE dentist SET Address='$address' WHERE doc_id=$doc_Id") or die(mysqli_error($conn));
    }
    if (!empty($contact)) {
        mysqli_query($conn, "UPDATE dentist SET contact_number='$contact' WHERE doc_id=$doc_Id") or die(mysqli_error($conn));
    }
    if (!empty($email)) {
        mysqli_query($conn, "UPDATE dentist SET email='$email' WHERE doc_id=$doc_Id") or die(mysqli_error($conn));
    }
    if (!empty($degree)) {
        mysqli_query($conn, "UPDATE dentist SET degree='$degree' WHERE doc_id=$doc_Id") or die(mysqli_error($conn));
    }
    if (!empty($speciality)) {
        mysqli_query($conn, "UPDATE dentist SET doctor_speciality='$speciality' WHERE doc_id=$doc_Id") or die(mysqli_error($conn));
    }

    $display_msg[] = "Updated successfully!";
    header('location: admin_header.php#dentist1');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointment</title>
    <script src="https://kit.fontawesome.com/de5a643238.js" crossorigin="anonymous"></script>
</head>
<body>
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

<section class="form-container">
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Update Dentist Info</h3>
        
        <div class="form-column">
            <p>Name</p>
            <input type="text" name="full_name" placeholder="Enter full name" maxlength="50" class="box">
            
            <p>D.O.B</p>
            <input type="date" name="birthday" placeholder="Enter D.O.B" maxlength="50" class="box">
            
            <p>Email ID</p>
            <input type="text" name="email" placeholder="Enter email ID" maxlength="50" class="box">
            
            <p>Contact</p>
            <input type="text" name="contact_number" placeholder="Enter contact number" class="box">
        </div>
        
        <div class="form-column">
            <p>Gender</p>
            <select name="Gender" class="box">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            
            <p>Address</p>
            <input type="text" name="Address" placeholder="Enter city" class="box">
            
            <p>Degree</p>
            <input type="text" name="degree" placeholder="Enter degree" class="box">
            
            <p>Speciality</p>
            <input type="text" name="doctor_speciality" placeholder="Enter speciality" class="box">
        </div>
        
        <div style="clear:both;"></div>
        
        <input type="submit" value="Update" name="update" class="btn">
    </form>
</section>

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
        background-image: url("https://www.freepnglogos.com/uploads/doctor-png/doctor-align-with-lower-cost-and-increased-quality-alignment-21.png");
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
