<?php
@include('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabka Dentist</title>
    <link rel="stylesheet" href="css/style12.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            background-image: url("https://wallpaperaccess.com/full/1805430.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px 20px;
        }

        header h1 {
            font-size: 24px;
            color: #fff;
        }

        /* Contact Section Styles */
        .contact {
            padding: 40px 15%;
            height: 100%;
            width: 100%;
            min-height: 100vh;
            display: grid;
            align-items: center;
            grid-template-columns: repeat(2, 2fr);
            grid-gap: 6rem;
        }

        .contact-image img {
            max-width: 100%;
            width: 720px;
            height: auto;
            border-radius: 10px;
        }

        .contact_form h1 {
            font-size: 70px;
            color: navy;
            margin-bottom: 20px;
        }

        .contact_form span {
            color: white;
        }

        .contact_form p {
            color: white;
            letter-spacing: 1px;
            line-height: 26px;
            font-size: 1.1rem;
            margin-bottom: 3.8rem;
        }

        .contact_form form {
            position: relative;
        }

        .contact_form form input,
        .contact_form form textarea {
            width: 100%;
            padding: 17px;
            border: none;
            outline: none;
            background-color: azure;
            color: black;
            font-size: 1.1rem;
            margin-bottom: 0.7rem;
            border-radius: 10px;
        }

        .contact_form textarea {
            resize: none;
            height: 200px;
        }

        .contact_form form .btn {
            display: inline-block;
            background: cyan;
            font-size: 1.1rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 600;
            border: 2px solid transparent;
            border-radius: 10px;
            width: 200px;
            transition: ease 0.20s;
            cursor: pointer;
        }

        .contact_form form .btn:hover {
            border: 2px solid cyan;
            background: transparent;
            transform: scale(1.1);
        }

        /* Message CSS */
        #messageBox {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f3f3f3;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            transition: opacity 0.3s ease-in-out;
        }

        #messageBox.show {
            opacity: 1;
        }

        .closeButton {
            float: right;
            cursor: pointer;
            font-size: 24px;
            font-weight: bold;
            color: #888;
        }

        .closeButton:hover {
            color: #000;
        }

        .message {
            color: white; /* Text color for the message */
        }
        /* End of Message CSS */

        /* Media Queries */
        @media (max-width: 1570px) {
            .contact {
                padding: 80px 3%;
            }

            .contact_form h1 {
                font-size: 55px;
            }

            .contact_form p {
                margin-bottom: 3rem;
            }
        }

        @media (max-width: 1080px) {
            .contact {
                grid-gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .contact {
                grid-template-columns: 1fr;
            }

            .contact_form {
                order: 2;
            }

            .contact-image img {
                text-align: center;
                margin-bottom: 30px;
            }

            .message {
                color: white; /* Text color for the message in mobile view */
            }
        }
    </style>
</head>
<body>
    <header>
        <?php @include('header.php'); ?>
    </header>
    <?php
    if (isset($_POST['submit'])) {
        if (isset($_SESSION['userid'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $user_msg = $_POST['message'];
            $user_id = $_SESSION['userid'];
            $query = mysqli_query($conn, "INSERT INTO messages(user_id, name, email, messages) VALUES($user_id, '$name', '$email', '$user_msg')") or die('query failed');
            $msg = "Message sent successfully"; // Changed from an array to a string
        } else {
            header("location: login.php");
        }
    }

    if (!empty($msg)) { // Removed the is_array check
        echo "
        <div class='popup-message' id='successMessage'>
            <span class='closeButton' onclick='closePopup()'>&times;</span>
            <p class='message'>$msg</p>
        </div>";
    }
    ?>
    <div class="contact">
        <div class="contact-image">
            <img src="s2.jpeg" alt="Contact Image">
        </div>
        <div class="contact_form">
            <h1>Contact Us</h1>
            <p><span class="black-text"></span> Fill out the form below to get in touch with us.</p>
            <form action="" method="POST" id="contactForm">
                <input type="text" placeholder="Your Name" name="name" required>
                <input type="email" placeholder="Your Email" name="email" required>
                <textarea placeholder="Your Message" name="message" required></textarea>
                <button class="btn" type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>

    <?php @include('footer.php'); ?>

    <!-- JavaScript function to close the popup -->
    <script>
        function closePopup() {
            document.getElementById('successMessage').style.display = 'none'; // Changed the ID
        }
    </script>
</body>
</html>
