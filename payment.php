<?php
@include('config.php');
session_start();
if (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
}
$serviceName = $_GET['service_name'];
$price = $_GET['price'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Payment Page</title>
</head>
<script>
        function showCardDetails() {
            var cardDetails = document.getElementById("cardDetails");
            cardDetails.style.display = "block";

            var payNowButton = document.getElementById("payNowButton");
        payNowButton.style.display = "none";
        }
    </script>
<body>
    <div class="message" id="paymentMessage">
        <span class="close-btn" onclick="closeMessage()">&times;</span>
        <ul>
            <?php
            if (isset($_POST['submit'])) {
                // Server-side validation
                $address = $_POST['address'];
                $city = $_POST['city'];
                $service_date = $_POST['date'];
                $timing = $_POST['timing'];
                $pincode = $_POST['pincode'];
                $full_name = $_POST['full_name'];
                $address = $_POST['address'];

                $card_number = $_POST['card_number'];
                $expiration_date = $_POST['expiration_date'];
                $cvv = $_POST['cvv'];

                $errors = [];

                // Validate card number (a simple example, you can use a more robust library for real-world applications)
                if (!preg_match('/^\d{16}$/', $card_number)) {
                    $errors[] = "Invalid card number. It should be 16 digits.";
                }
                
                // Validate expiration date (MM/YY) not less than the current year
                $currentYear = date('y');
                $currentMonth = date('m');
                $expirationYear = substr($expiration_date, 3, 2);
                $expirationMonth = substr($expiration_date, 0, 2);
                
                if ($expirationYear < $currentYear || ($expirationYear == $currentYear && $expirationMonth < $currentMonth)) {
                    $errors[] = "Invalid expiration date. It should not be earlier than the current year and month.";
                }

                // Validate CVV (a simple example, you can define more precise rules)
                if (!preg_match('/^\d{3}$/', $cvv)) {
                    $errors[] = "Invalid CVV. It should be a 3-digit number.";
                }
                // Display validation errors, if any
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo "<li>$error</li>";
                    }
                } else {
                    $sql = "INSERT INTO services (user_id,full_name, timing, service_date, address, city, pincode, price, payment_method)
                            VALUES ($user_id,'$full_name', '$timing', '$service_date', '$address', '$city', $pincode, $price, 'Credit Card')";

                    if ($conn->query($sql) === TRUE) {
                        // Insert card details into the card_details table
                        $card_insert_sql = "INSERT INTO card_details (user_id, card_number, expiration_date, cvv)
                                            VALUES ('$user_id', '$card_number', '$expiration_date', '$cvv')";

                        if ($conn->query($card_insert_sql) === TRUE) {
                            echo "<div class='order-message-container'>
                            <div class='message-container'>
                               <h3>Thank you!!</h3>
                               <div class='order-detail'>
                                  <span> Service Name: ".$serviceName."</span>
                                  <span class='total'> Total: Rs ".$price."/-  </span>
                               </div>
                               <div class='customer-details'>
                                  <p> Your Name: <span>".$full_name."</span> </p>
                                  <p> Your Address: <span>".$address.", ".$city.", ".$pincode."</span> </p>
                                  <p> Payment Successful</p>
                               </div>
                                  <a href='teeth.php' class='btn'>OK</a>
                               </div>
                            </div>";
                        } else {
                            echo "<li>Error inserting card details: " . $conn->error . "</li>";
                        }
                    } else {
                        echo "<li>Error inserting payment information: " . $conn->error . "</li>";
                    }
                }
            }
            ?>
        </ul>
    </div>

    
    <form action="" method="post">
        <h2>Payment Information</h2>
        <div class="input-row">
            <div class="input-column">
                <label for="service name">Service Name:</label>
                <?php echo $serviceName; ?>
            </div>
            <div class="input-column">
                <label for="price">Price:</label>
                <?php echo $price; ?> Rs.
            </div>
        </div>

        <div class="input-row">
            <div class="input-column">
                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name" id="full_name" required>
            </div>
            <div class="input-column">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
            </div>
        </div>

        <div class="input-row">
            <div class="input-column">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" required>
            </div>
            <div class="input-column">
                <label for="pincode">Pincode:</label>
                <input type="number" name="pincode" id="pincode" maxlength="6" required>
            </div>
        </div>
        <div class="input-column">
            <label for="timing">Select Timing:</label>
            <select name="timing" id="timing" required>
                <?php
                // Generate dropdown options with 1-hour intervals
                $start_time = strtotime("08:00 AM"); // Start at 8:00 AM
                $end_time = strtotime("08:00 PM");   // End at 8:00 PM

                while ($start_time < $end_time) {
                    $end_of_hour = strtotime("+1 hour", $start_time);
                    $formatted_start_time = date("h:i A", $start_time);
                    $formatted_end_time = date("h:i A", $end_of_hour);

                    echo '<option value="' . $formatted_start_time . ' - ' . $formatted_end_time . '">' . $formatted_start_time . ' - ' . $formatted_end_time . '</option>';

                    $start_time = $end_of_hour; // Move to the next hour
                }
                ?>
            </select>
            <div class="input-column">
            <label for="date">Select Date:</label>
            <input type="date" name="date" id="date" min="<?php echo date('Y-m-d'); ?>" required>
        </div>
        </div>

        <input type="button" id="payNowButton" value="Pay Now" onclick="showCardDetails()">
        <a class="back_btn" href="teeth.php">Back</a>

        <div id="cardDetails" style="display: none;">
            <h2>Card Details</h2>
            <div class="input-row">
                <div class="input-column">
                    <label for="cvv">CVV:</label>
                    <input type="text" name="cvv" id="cvv" required>
                </div>
                <div class="input-column">
                    <label for="expiration_date">Expiry Date(MM/YY):</label>
                    <input type="text" name="expiration_date" id="expiration_date" placeholder="MM/YY" required>
                </div>
            </div>

            <div class="input-row">
                <div class="input-column">
                    <label for="card_number">Card Number:</label>
                    <input type="text" name="card_number" id="card_number" required>
                </div>
            </div>

            <input type="submit" name="submit" value="Submit Payment">
        </div>
    </form>
    <style>
        /* Style the body and center the form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image:url("https://wallpapercave.com/wp/wp4673363.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Style the form container */
        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 600px;
        }

        /* Style labels */
        label {
            font-weight: bold;
        }

        /* Style the back button similar to the submit button */
        a.back_btn {
            text-align: center;
            display: inline-block;
            padding: 10px 20px;
            width: 90%;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-top: 10px; /* Add margin to separate it from the submit button */
        }

        /* Style form inputs and buttons */
        input[type="text"],
        input[type="number"],#date,#timing {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px; /* Add margin between input fields */
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        #date,#timing {
            width: 99%;
            padding: 10px;
            margin-bottom: 15px; /* Add margin between input fields */
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        #date{
            width: 97%;
            padding: 10px;
            margin-bottom: 15px; /* Add margin between input fields */
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        #card_number {
            width: 95%;
        }

        input[type="submit"], #payNowButton {
            width: 97%;
            padding: 10px;
            margin-bottom: 15px; /* Add margin between input fields */
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover,
        a.back_btn:hover,#payNowButton:hover {
            background-color: #0056b3;
        }

        /* Style validation error messages */
        ul {
            list-style-type: none;
            color: red;
            padding: 0;
        }

        /* Add animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2,
        form {
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Style the input rows and columns */
        .input-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px; /* Add a margin between rows */
        }

        .input-column {
            flex: 1;
            margin-right: 10px; /* Adjust as needed for spacing between columns */
        }

        /* Add margin to input elements for spacing */
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            margin-bottom: 10px; /* Add a margin below each input element */
        }

        /* Style for the message */
        .message {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ff8080;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }

        .message ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .message li {
            color: white;
            margin: 0;
            padding: 0;
        }

        .message .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            color: white;
        }
        
/* Style for the pop-up container */
.order-message-container {
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
 background-color: rgba(0, 0, 0, 0.7);
   display: flex;
   align-items: center;
   justify-content: center;
   z-index: 999;
}

.message-container {
   background-color: azure;
   padding: 20px;
   border-radius: 5px;
   box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
   text-align: center;
   max-width: 80%;
}

/* Style for the heading and total price */
.message-container h3 {
   font-size: 24px;
   color: black;
   margin-bottom: 10px;
}

.order-detail {
   margin-bottom: 20px;
}

.order-detail span {
   display: block;
   font-size: 16px;
   color: gray;
}

.order-detail .total {
   font-size: 18px;
   color: black;
   font-weight: 600;
}

/* Style for customer details */
.customer-details p {
   font-size: 16px;
   color: gray;
   margin-bottom: 10px;
}

.customer-details span {
   font-weight: 600;
   color: black;
}

/* Style for the "Continue Shopping" button */
.btn {
   display: inline-block;
   padding: 10px 20px;
   background-color: blue;
   color: #fff;
   border: none;
   border-radius: 5px;
   font-size: 16px;
   cursor: pointer;
   text-decoration: none;
   transition: background-color 0.3s ease;
}

.btn:hover {
  color: black;
   transform: scale(1.05);
   transition: ease-in 0.2s;
}
h2 {
    font-size: 24px;
    color: #333; /* You can choose your desired color */
    margin-bottom: 10px;
    text-align: center; /* Center-align the heading */
    color: blueviolet;
}

/* Media query for smaller screens */
@media screen and (max-width: 768px) {
   .message-container {
      max-width: 90%;
   }
}

    </style>

    <script>
        function closeMessage() {
            var message = document.getElementById("paymentMessage");
            message.style.display = "none";
        }

        function showMessage() {
            var message = document.getElementById("paymentMessage");
            message.style.display = "block";
            setTimeout(function () {
                message.style.display = "none";
            }, 8000); // 8   seconds
        }

        // Show the message when the page loads
        showMessage();
    </script>
</body>
</html>
