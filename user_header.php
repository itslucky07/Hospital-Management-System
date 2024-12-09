<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>User Panel</h1>
        <nav>
            <ul>
                <li><a href="teeth.php">Home</a></li>
                <li><a href="edit_profile.php">Profile</a></li>
                <li><a href="myAppointment.php">My Appointments</a></li>
                <li><a href="password_change.php">Change Password</a></li>
                <li><a href="myservices.php">My Services</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    
    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>

<style>
/* Reset some default styles */
body, h1, h2, ul, li, p {
    margin: 0;
    padding: 0;
}

/* Apply basic styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
     /* Add a background image to the body */
    background-repeat: no-repeat; /* Prevent background image from repeating */
    background-size: cover; /* Cover the entire body with the background image */
    margin: 0;
    padding: 0;
    background-image: url("https://wallpapercave.com/wp/wp4673268.jpg");
    background-repeat: no-repeat;
    background-size: Cover;
}

header {
    position: relative;
    color: #fff;
    padding: 20px;
    text-align: center;
    backdrop-filter: blur(10px); /* Add the blur effect to the header background */
    background-color: rgba(51, 51, 51, 0.1); /* Background color with transparency */
}

header h1 {
    font-size: 36px;
    margin: 0;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease; /* Add color transition effect */
}

nav a:hover {
    color: #ff9900; /* Change color on hover */
}

section {
    background-color: rgba(255, 255, 255, 0.9); /* Add a semi-transparent white background */
    padding: 20px;
    margin-top: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Add a box shadow */
}

form {
    max-width: 400px;
    margin: 0 auto;
}

label, input {
    display: block;
    margin-bottom: 10px;
}

button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Add background color transition */
}

button:hover {
    background-color: #555; /* Change background color on hover */
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

/* Style other elements and sections as needed */

footer {
    text-align: center;
    padding: 10px 0;
    background-color: rgba(51, 51, 51, 0.7); /* Footer background color with transparency */
    color: #fff;
}
</style>
