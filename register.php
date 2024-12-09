<?php

require_once "config.php";

if (isset($_POST['register'])) {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cPass= $_POST['confirm_password'];
  $mobile = $_POST['number'];

  $sql = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username'") or die('Query failed');

  if (mysqli_num_rows($sql) > 0) {
    $message[] = 'User already exists!';
  } else {
    if ($password != $cPass) {
      $message[] = 'Confirm password does not match!';
    } else {
      mysqli_query($conn, "INSERT INTO `account`(username, password, email, mobile) VALUES('$username', '$password', '$email', '$mobile')") or die('Query failed');
      $message[] = 'Registered successfully!';
      header('location: login.php');
    }
  }
}
?>