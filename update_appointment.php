<?php
@include 'config.php';
session_start();


if (isset($_POST['update'])) {
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $email_id = $_POST['email_id'];
    $city = $_POST['city'];
    $Appointment_time = $_POST['Appointment_time'];
    $Appointment_date = $_POST['Appointment_date'];

    // Check if a new image is uploaded
    if ($_FILES['uploaded_img']['error'] === 0) {
        $img_extension = pathinfo($_FILES['uploaded_img']['name'], PATHINFO_EXTENSION);
        $img_name = uniqid('prod_image') . '.' . $img_extension;
        $img_directory = 'uploaded_img/';
        $img_path = $img_directory . $img_name;

        if (move_uploaded_file($_FILES['uploaded_img']['tmp_name'], $img_path)) {
            // Update the image in the database
            mysqli_query($conn, "UPDATE Appointment SET prod_image='$img_name' WHERE Id='$prod_Id'") or die(mysqli_error($conn));
        } else {
            $display_msg[] = "Error uploading image.";
        }
    }

    // Update other fields
    mysqli_query($conn, "UPDATE Appointment SET full_name='$full_name', phone_number='$phone_number', email_id='$email_id', city='$city', Appointment_time='$Appointment_time', Appointment_date='$Appointment_date' WHERE Id='$prod_Id'") or die(mysqli_error($conn));

    $display_msg[] = "Updated successfully!";
    header('location: Admin.php#products_spacing1');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Appointment</title>
    <link href='https://fonts.googleapis.com/css?family=Bruno Ace SC' rel='stylesheet'>
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
        <h3>Update Appointment</h3>
        <p>Name</p>
        <input type="text" name="full_name" placeholder="Enter full name" maxlength="50" class="box">
        <p>Phone Number</p>
        <input type="text" name="phone_number" placeholder="Enter phone number" maxlength="50" class="box">
        <p>Email ID</p>
        <input type="text" name="email_id" placeholder="Enter email ID" maxlength="50" class="box">
        <p>City</p>
        <input type="text" name="city" placeholder="Enter city" class="box">
        <p>Appointment Time</p>
        <input type="text" name="Appointment_time" placeholder="Enter appointment time" class="box">
        <p>Appointment Date</p>
        <input type="text" name="Appointment_date" placeholder="Enter appointment date" class="box">
        <input type="file" accept="image/jpg, image/jpeg, image/png" class="box" name="uploaded_img">
        <input type="submit" value="Update Appointment" name="update" class="btn">
    </form>
</section>

</body>
</html>
<style>
    body {
        font-family: 'Bruno Ace SC', cursive;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url("https://images.theconversation.com/files/257610/original/file-20190206-174870-zpq36t.jpg?ixlib=rb-1.1.0&q=15&auto=format&w=754&h=503&fit=crop&dpr=3");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .form-container {
        background-color: #ffffff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 5px;
        width: 350px;
    }

    h3 {
        text-align: center;
        font-size: 24px;
    }

    p {
        margin: 10px 0;
        font-weight: bold;
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
