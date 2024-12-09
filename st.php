<?php
session_start();
@include ('config.php');

if (isset($_POST['register'])) {
    $full_name = $_POST['full_name'];
    $birthdate = $_POST['birthdate'];
    $Gender = $_POST['Gender'];
    $Address = $_POST['Address'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $sql_check_email = mysqli_query($conn, "SELECT * FROM staff WHERE email = '$email'") or die('Query failed: ' . mysqli_error($conn));

    if (mysqli_num_rows($sql_check_email) > 0) {
        $message[] = 'Email already exists!';
    } else {
        if ($password != $confirm_password) {
            $message[] = 'Confirm password does not match!';
        } else {
            $sql_insert_user = "INSERT INTO dentist (full_name, birthdate, Gender, address, Contact_number, email, doctor_speciality, password, confirm_password) 
            VALUES ('$full_name', '$birthdate', '$Gender', '$Address', '$contact_number', '$email',  '$password', '$confirm_password')";
            
            if (mysqli_query($conn, $sql_insert_user)) {
                $message[] = 'Registered successfully!';
                header('location: st.html');
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
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
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
			<div class="staff">
				<form method="POST" action="staff.php">
					<p style="color:red;"><?php 
					if(isset($_GET['error']))
					{
						echo $_GET['error'];
					}
                    ?>
    <section class="form-section">
        <h2>Add New Staff</h2>
        <form action="process_staff.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="date" name="birthdate" required>
            <input type="text" name="Address" placeholder="Address" required>
            <label for="Gender">Gender:</label>
            <select name="Gender" id="Gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <input type="tel" name="contact_number" placeholder="Contact Number" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="file" name="profile_image" accept="image/*" required>
            <button type="submit">Add Staff</button>
            <button type="submit" name="register">Save</button>
            <button type="reset">Unsaved</button>
        </form>
        <p>Already have an account? <a href="staff.php">dentist</a></p>
    </section>
    
    <!-- Display staff data section -->
    <section class="data-section">
        <!-- Staff data will be displayed here -->
    </section>

    <footer>
        <!-- Footer content here -->
    </footer>
</body>
</html>
<style>
    /* Reset default styles */
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

header, footer {
    background-color: #007BFF;
    color: white;
    text-align: center;
    padding: 10px;
}

/* Form styling */
.form-section {
    background-color: #fff;
    padding: 20px;
    margin: 20px auto; /* Center the form horizontally */
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 400px; /* Limit the maximum width of the form */
}

.form-section h2 {
    margin-bottom: 15px;
}

.form-section input, .form-section select {
    display: block;
    width: 100%;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-section button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

/* Data display styling */
.data-section {
    background-color: #fff;
    padding: 20px;
    margin: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Add more CSS styles as needed */
</style>