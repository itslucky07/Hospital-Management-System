<?php
session_start();
@include ('config.php');

if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];
    $Gender= $_POST['Gender'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
  

    $sql_check_email = mysqli_query($conn, "SELECT * FROM dentist WHERE email = '$email'") or die('Query failed: ' . mysqli_error($conn));

    if (mysqli_num_rows($sql_check_email) > 0) {
        $message[] = 'Email already exists!';
    } else {
        if ($email != $email) {
            $message[] = 'Confirm password does not match!';
        } else {
            $sql_insert_user = "INSERT INTO patient (first_name,last_name,birthdate,Gender,address,contact_number, email) 
            VALUES ('$first_name', '$last_name', '$birthdate', '$Gender', '$address', '$contact_number', '$email' )";
            
            if (mysqli_query($conn, $sql_insert_user)) {
                $message[] = 'Registered successfully!';
                header('location: patient.html');
            } else {
                $message[] = 'Registration failed: ' . mysqli_error($conn);
            }
        }
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
    <title>Add New Staff</title>
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
            <div class="patient">
                <form method="POST">
                    <p style="color:red;"><?php 
                    if(isset($_GET['error']))
                    {
                        echo $_GET['error'];
                    }
                    ?></p>  
            <form method="POST" action="process_patient.php" enctype="multipart/form-data">
                <section class="form-section">
                    <h2>Add New Staff</h2>
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                    <input type="date" name="birthdate" required>
                    <label for="Gender">Gender:</label>
                    <select name="Gender" id="Gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <input type="text" name="address" placeholder="Address" required>
                    <input type="tel" name="contact_number" placeholder="Contact Number" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="file" name="upload_image" accept="image/*" required>
                    <button type="submit" name="register">Add Staff</button>
                    <button type="reset">Reset</button>
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
   
}

/* Form styling */
.main {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.patient{
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

.patient input,
.patient select,
.patient button {
    display: block;
    width: 100%;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.patient button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

/* Add more CSS styles as needed */

</style>
