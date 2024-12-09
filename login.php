<?php
session_start();
include("config.php");

if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "select* from user where user_name='$username'");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['u_password'] === $_POST['password']) {
            if ($row['user_type'] == 'user') {
                $_SESSION['username'] = $row['user_name'];
                $_SESSION['useremail'] = $row['user_email'];
                $_SESSION['userid'] = $row['id'];
                header('location: teeth.php');
            } elseif ($row['user_type'] == 'admin') {
                $_SESSION['adminname'] = $row['user_name'];
                $_SESSION['adminemail'] = $row['user_email'];
                $_SESSION['admin_id'] = $row['id'];
                header('location: Admin_header.php');
            }
            else {
                echo "<script type='text/javascript'>alert('invalid password')</script>";
            }
        }
    }
    else {
        echo "<script type='text/javascript'>alert('invalid username')</script>";
    }
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color:blueviolet;
            background-image: url("https://hadfielddentalgroup.com/wp-content/uploads/2019/04/slider.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .hero {
            background-color:gray;
            padding: 20px;
            width: 455px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            
        }

        h1 {
            color: white;
        }

        .input-group {
            margin-top: 20px;
        }

        .input-field {
            max-width: 100%;
            
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .check-box {
            margin-right: 5px;
        }

        .login {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login:hover {
            background-color: #2980b9;
        }

        .register-link {
            margin-top: 10px;
        }

        .register-link a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1>LOGIN</h1>     
        <form id="login" action="login.php" method="post" class="input-group">
            <input type="text" class="input-field" name="username" placeholder="Enter User Name" required>
            <input type="password" class="input-field" name="password" placeholder="Enter password" required>
            <input type="checkbox" class="check-box"><span>Remember password</span>
            <button type="submit" name="Login" class="login">Log in</button>
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="signup.php">Register</a></p>
            <p><a href="forgotpass.php">forgot password ?</a></p>
        </div>
    </div>
</body>
</html>