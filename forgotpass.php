<?php
session_start();
include("config.php");
if (isset($_POST['reset_request'])) {
  $email = $_POST['email'];
  $user_id = $_POST['user_id'];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE user_email='$email' AND id='$user_id'");

  if (mysqli_num_rows($result) > 0) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $temp_password = substr(str_shuffle($characters), 0, 6);
    mysqli_query($conn, "UPDATE user SET u_password='$temp_password' WHERE user_email='$email'");

    $message = $temp_password;
  } else {
    $message = "Invalid email or user ID.";
  }
}

?>

<html>

<head>
  <link href='https://fonts.googleapis.com/css?family=Bruno Ace SC' rel='stylesheet'>
  <script src="jquery.js"></script>
  <title>Login Form</title>
</head>

<body>
  <div class="container">
    <div class="form">
      <span class="loginTitle">Forgot Password</span>
      <form action="" method="post">
        <!-- Error message display -->
        <?php if (isset($message)) : ?>
          <div class='order-message-container'>
            <div class='message-container'>
              <?php
              if (mysqli_num_rows($result) > 0) {
                echo "
                <div class='order-detail'>
                <span>'Your temporary password:'</span>
                <span class='total'>$message</span>
              </div>
                <a href='loginForm.php' class='btn'>Login</a>";
              } else {
                echo " 
                <div class='order-detail'>
                <span class='total'>$message</span>
              </div>
                <a href='forgotPass.php' class='btn'>ok</a>";
              }
              ?>
            </div>
          </div>
        <?php endif; ?>

        <div class="inputForm">
          <input type="text" placeholder="Enter your email" name="email" required>
        </div>
        <div class="inputForm">
          <input type="text" placeholder="Enter your user id" name="user_id" required>
        </div>
        <div class="loginBtn">
          <input type="submit" name="reset_request" value="Check">
        </div>
      </form>
      <div class="signup">
        <span>Not a member?
          <a href="login.php">Login</a>
        </span>
      </div>
    </div>
  </div>

  <script>
    function hideMessage() {
      var errorMessage = document.querySelector('.error-message');
      errorMessage.style.display = 'none';
    }
  </script>
</body>


</html>
<style>
  /* Reset default styles */
  body, h1, p, input {
    margin: 0;
    padding: 0;
    font-family: 'Bruno Ace SC', sans-serif;
    
  }
  /* Set overall background image for the body */
  body {
  
}

  /* Container styles */
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url("https://i.pinimg.com/originals/5b/44/a3/5b44a31a1652ca64fcec7a6c59a72473.jpg");
    background-repeat: no-repeat;
    background-size: 100%;
  }

  /* Form styles */
  .form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
   
  }
  .form:hover {
    background-color: black; /* Change to the desired hover background color */
    color:white;
}
  .loginTitle {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  /* Input styles */
  .inputForm {
    margin-bottom: 15px;
  }

  input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  /* Button styles */
  .loginBtn input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .loginBtn input[type="submit"]:hover {
    background-color: #0056b3;
  }
  .container-foot {
    display: flex;
    justify-content: space-between;
    background-color: var(--charcoal-color);
    color: white;
    padding: 30px 0;
}

/* Left box styling */
.leftbox {
    flex: 1;
    padding: 0 30px;
}

.leftbox .logo {
    color: white;
    font-size: 24px;
    text-decoration: none;
    display: inline-block;
    margin-bottom: 20px;
}

.leftbox p {
    font-size: 14px;
    line-height: 1.5;
}
  /* Signup link styles */
  .signup a {
    text-decoration: none;
    color: #007bff;
  }

  .signup a:hover {
    text-decoration: underline;
  }

  /* Error message styles */
  .order-message-container {
    margin-top: 20px;
    background-color: #ffcccc;
    padding: 10px;
    border-radius: 5px;
  }

  .message-container {
    text-align: center;
  }

  .order-detail {
    margin-bottom: 10px;
  }

  .total {
    font-weight: bold;
  }
</style>
<?php @include('footer.php'); ?>
