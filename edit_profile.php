<?php
@include('config.php');
@include('user_header.php');
session_start();
$msg = "";

if (isset($_POST['submit'])) {
    if (isset($_SESSION['userid'])) {
        $user_id = $_SESSION['userid'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $number = $_POST['number'];

        $msgs = array(); // Initialize an array to store messages.

        if (!empty($username)) {
            $result = mysqli_query($conn, "UPDATE `user` SET user_name = '$username' WHERE id = '$user_id'");
            $_SESSION['userName'] = $username;
            if ($result) {
                $msgs[] = "Username updated successfully.";
            } else {
                $msgs[] = "Error updating username: " . mysqli_error($conn);
            }
        }
        if (!empty($email)) {
            $result = mysqli_query($conn, "UPDATE `user` SET user_email = '$email' WHERE id = '$user_id'");
            $_SESSION['userEmail'] = $email;
            if ($result) {
                $msgs[] = "Email updated successfully.";
            } else {
                $msgs[] = "Error updating email: " . mysqli_error($conn);
            }
        }
        if (!empty($address)) {
            $result = mysqli_query($conn, "UPDATE `user` SET user_address = '$address' WHERE id = '$user_id'");
            $_SESSION['userAddress'] = $address;
            if ($result) {
                $msgs[] = "Address updated successfully.";
            } else {
                $msgs[] = "Error updating address: " . mysqli_error($conn);
            }
        }
        if (is_numeric($number)) {
            // Check if the input is numeric before updating the database.
            $result = mysqli_query($conn, "UPDATE `user` SET user_number = '$number' WHERE id = '$user_id'");
            $_SESSION['userNumber'] = $number;
            if ($result) {
                $msgs[] = "Number updated successfully.";
            } else {
                $msgs[] = "Error updating number: " . mysqli_error($conn);
            }
        } else {
            $msgs[] = "Phone number must be numeric.";
        }

        // Combine all update messages into a single message
        $msg = implode("<br>", $msgs);
    }
}
?>

<!-- Display the message if there is one -->
<?php
if (!empty($msg)) {
    echo "<div id='messageBox'>
    <p>$msg</p>
    <span class='closeButton' onclick='closeMessageBox()'>&times;</span>
    </div>";
}
?>
<script>
    // JavaScript function to close the message box
    function closeMessageBox() {
        const messageBox = document.querySelector('#messageBox');
        messageBox.style.display = 'none';
    }
</script>
<section id="profile">
    <h2>Profile</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Username">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email">
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" placeholder="Address">
        
        <label for="number">Phone:</label>
        <input type="text" id="number" name="number"  placeholder="Number" maxlength="10" required pattern="\d*">
        <!-- The "pattern" attribute enforces numeric input -->
        
        <button type="submit" name="submit">Update Profile</button>
    </form>
</section>
<style>
    /* Style for the entire form section */
#profile {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
    
}
/* Style for form labels */
label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Style for form inputs */
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="file"] {
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

/* Style for message box */
#messageBox {
    margin: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    background-color: #f2f2f2;
    position: relative;
}

.closeButton {
    position: absolute;
    top: 5px;
    right: 5px;
    cursor: pointer;
}

</style>
