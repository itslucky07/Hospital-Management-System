<?php
@include('config.php');
@include('user_header.php');
session_start();
$msg = "";

if (isset($_POST['submit'])) {
    if (isset($_SESSION['userid'])) {
        $user_id = $_SESSION['userid'];
        $n_pass = $_POST['newPassword'];
        $con_pass = $_POST['confirmPassword'];

        if (!empty($n_pass) && !empty($con_pass)) {
            if ($n_pass == $con_pass) {
                $result = mysqli_query($conn, "UPDATE `user` SET u_password = '$n_pass' WHERE id = '$user_id'");
                if ($result) {
                    $msgs[] = "Password updated successfully.";
                } else {
                    $msgs[] = "error in updating ";
                }
            } else {
                $msgs[] = "confirm password must match ";
            }
        }
    }
}
?>

<!-- Display the message if there is one -->
<?php
if (!empty($msg)) {
    echo "<div id='messageBox'>
    <p>$msg</p>
    <span class='closeButton' onclick='this.parentElement.remove()'>&times;</span>
    </div>";
}
?>
<script>
    // JavaScript function to close the message box
    function closeMessageBox() {
        const messageBox = document.querySelector('.message-box');
        messageBox.style.display = 'none';
    }
</script>

<section id="password">
    <h2>Change Password</h2>
    <form method="post">
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" placeholder="New Password" required>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" reqiured>

        <button type="submit" name="submit">Change Password</button>
    </form>
</section>
<style>
    /* Style for the password section */
#password {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
    width: 300px; /* Adjust the width as needed */
    text-align: center; /* Center-align the form within the section */
}

/* Style for form labels */
label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Style for form inputs */
input[type="password"] {
    width: 90%;
    padding: 7px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

/* Style for submit button */
button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
}

/* Style for message box (if needed) */
#messageBox {
    margin-top: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    background-color: #f2f2f2;
    text-align: center;
    position: relative;
}

.closeButton {
    position: absolute;
    top: 5px;
    right: 5px;
    cursor: pointer;
}
/* Center the background for the password section */
#password {
    margin: 20px auto; /* Auto horizontal margin to center the section */
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
    max-width: 300px; /* Adjust the maximum width as needed */
    text-align: center; /* Center-align the form within the section */
    position: relative;
}

    </style>