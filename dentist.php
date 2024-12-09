    <?php
    session_start();
    @include ('config.php');
    $message=[];
    if (isset($_POST['register'])) {
        $full_name = $_POST['full_name'];
        $birthdate = $_POST['birthdate'];
        $Gender = $_POST['Gender'];
        $Address = $_POST['Address'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $degree = $_POST['degree'];
        $doctor_speciality = $_POST['doctor_speciality'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $sql_check_email = mysqli_query($conn, "SELECT * FROM dentist WHERE email = '$email'") or die('Query failed: ' . mysqli_error($conn));

        if (mysqli_num_rows($sql_check_email) > 0) {
            $message[] = 'Email already exists!';
        } else {
            if ($password != $confirm_password) {
                $message[] = 'Confirm password does not match!';
            } else {
                $sql_insert_user = "INSERT INTO dentist (full_name, birthdate, Gender, degree, Address, Contact_number, email, doctor_speciality, password, confirm_password) 
                VALUES ('$full_name', '$birthdate', '$Gender', '$degree', '$Address', '$contact_number', '$email', '$doctor_speciality', '$password', '$confirm_password')";
                
                if (mysqli_query($conn, $sql_insert_user)) {
                    $message[] = 'Registered successfully!';
                    header('location: admin_header.php');
                } else {
                    $message[] = 'Registration failed: ' . mysqli_error($conn);
                }
            }
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en" >
    <head>
    <meta charset="UTF-8">
    <title>Dentist Form</title>
  <link rel="stylesheet" href="">
    <title>Slide Navbar</title>
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
            <div class="dentist">
                <form method="POST">
                    <p style="color:red;"><?php 
                    if(isset($_GET['error']))
                    {
                        echo $_GET['error'];
                    }
                    ?></p>
                      <label for="chk" aria-hidden="true">Add Dentist</label>
                    <input type="text" name="full_name" placeholder="Enter your fullname" required="">
                    <input type="date" name="birthdate" placeholder="birthdate" required="">
                    <select name="Gender" id="Gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                    <input type="text" name="Address" placeholder="Address" required="">
                    <input type="text" name="contact_number" placeholder="contact number" required="">
                    
                    <input type="email" name="email" placeholder="email" required="">
                    <input type="degree" name="degree" placeholder="degree" required="">
                    <input type="text" name="doctor_speciality" placeholder="doctor speciality" required="">
                    <input type="password" name="password" placeholder="password" required="">
                    <input type="password" name="confirm_password" placeholder="confirm password" required="">
                    <div class="doc_btn">
                    <button type="submit" name="register">Dentist</button>
                    <a class="cancel" href="admin_header.php#dentist1">Cancel</a>
                    </div>
                </form>
                <p>Already have an account? <a href="admin_header.php">dentist</a></p>
            </div>
    </div>
</body>
</html>
<style>
	body {
            font-family: 'Jost', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
            background-image: url("https://thumbs.dreamstime.com/b/shot-attractive-young-woman-dentist-satisfied-female-black-patient-looking-results-whitening-treatment-mirror-204219209.jpg");
            background-repeat: no-repeat;
            background-size: cover;

        }

        .main {
            position: relative;
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .signup {
            opacity: 0;
            transform: translateY(20px);
            animation: slide-up 0.6s ease forwards;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 15px;
            display: block;
        }

        input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .doc_btn{
            display: flex;
            justify-content: space-evenly;
        }

        button,.cancel {
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .doc_btn a:hover,button:hover {
            background-color: #2980b9;
        }

        @keyframes slide-up {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
</style>