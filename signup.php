<?php
session_start();
include ('config.php');

if (isset($_POST['signup'])){
	$name = $_POST['user_name'];
	$email = $_POST['user_email'];
	$address = $_POST['user_address'];
	$number = $_POST['user_number'];
	$password = $_POST['u_password'];
	$confirm_password = $_POST['confirm_password'];

	// Capitalize the first letter of the username
	$name = ucfirst($name);

	if($password !== $confirm_password || strlen($password) !== 6) {
		header('location: signup.php?error=password does not match or not 6 digits');
	} else {
		$stmt = $conn->prepare("SELECT count(*) FROM user where user_email=?");
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->bind_result($num_row);
		$stmt->store_result();
		$stmt->fetch();
		if ($num_row != 0) {
			header('location: login.php?error=user with this email already exists');
		} else {
			$stmt = $conn->prepare("INSERT INTO user(user_name, user_email, user_address, user_number, u_password) VALUES (?,?,?,?,?)");
			$stmt->bind_param('sssss', $name, $email, $address, $number, $password);
			if ($stmt->execute()) {
				$_SESSION['user_email'] = $email;
				$_SESSION['user_name'] = $name;
				$_SESSION['logged_in'] = true;
				$_SESSION['status'] = "Signed Up Successfully";
				header('location: login.php');
			}
		}
	}
	$stmt->close();
	$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign up Form</title>
  <link rel="stylesheet" href="">
  <title>Slide Navbar</title>
  <link rel="stylesheet" type="text/css" href="">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="main">
  <div class="signup">
    <form method="POST" action="signup.php">
      <label for="chk" style="color:white;" aria-hidden="true">Sign up</label>
      <input type="text" name="user_name" placeholder="User name" required pattern="^[A-Z][A-Za-z0-9]{2,}$">
      <input type="email" name="user_email" placeholder="Email" required>
      <input type="text" name="user_address" placeholder="Address" required>
      <input type="tel" maxlength="10" name="user_number" placeholder="Number" required>
      <input type="password" name="u_password" placeholder="Password (6 digits)" required>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      <button type="submit" name="signup">Sign up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
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
    background-image: url("https://theplaidzebra.com/wp-content/uploads/2016/10/bannerphoto.jpg");
    background-image: 1280px;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .main {
    position: relative;
    width: 300px;
    background-color: grey;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .signup {
    opacity: 0;
    transform: translateY(20px);
    animation: slide-up 0.6s ease forwards;
    color: gray;
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

  button {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 16px;
  }

  button:hover {
    background-color: #2980b9;
  }

  @keyframes slide-up {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
