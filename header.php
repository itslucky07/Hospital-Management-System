<?php
    session_start();
    @include('config.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/style2.css">
<script src="jquery.js"></script>
<header class="header">
    <nav class="navbar">
    <a href="#" class="logo"><i class="fas fa-tooth"></i>dentist clinic</a>
    <label id="hamburger-menu">
        <div class="navbar-links">
            <ul>
                <li><a href="teeth.php"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="about.php"><i class="fas fa-info-circle"></i>about</a></li>
                <li><a href="team.php"><i class="fas fa-users"></i>team</a></li>
                <li class="dropdown">
                    <a href="#"><i class="fas fa-cogs"></i>services</a>
                    <div class="dropdown-content">
                        <a href="services.php?services=cleaning & exam">cleaning & exam</a>
                        <a href="services1.php?services=dental filling">dental filling</a>
                        <a href="services2.php?services=Gum diseases treatment">Gum diseases treatment</a>
                    </div>
                    <li><a href="contact_us.php"><i class="fas fa-envelope"></i>contact_us</a></li>
                    
                
                <?php 
            if(!isset($_SESSION['userid'])){
                $user_id = $_SESSION['userid'];
                echo "<li><a href='login.php'>Login</a></li>";
            }
            else{
                echo "";
            }
            ?>
            <li><a href="mm.html"></a></li>
        </nav>
    </label>          
    <a href="Appointment.php" class="btn">Make Appointment</a>
    <div id="menu-btn"><a id='main' style='cursor:pointer' onclick='openNav()'><i class="fas fa-bars"></i></a></div>
    <?php 
    if(isset($_SESSION['userid'])){
        echo "<div id='mySidenav' class='sidenav'>";
        echo "<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";
        echo "<a href='user_header.php'>Profile</a>";
        echo "<a href='#'>Hello " . (isset($_SESSION['username']) ? $_SESSION['username'] : '') . "</a>";
        echo "<a href='#'>" . (isset($_SESSION['useremail']) ? $_SESSION['useremail'] : '') . "</a>";
        echo "<a href='logout.php'>LogOut</a>";
        echo "</div>";
    }
    else{
        echo "<div id='mySidenav' class='sidenav'>";
        echo "<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";
        echo "<a href='account.php'>Profile</a>";
        echo "<a href='#'>Hello Guest</a>";
        echo "<a href='#'>Guest Email</a>";
        echo "<a href='logout.php'>LogOut</a>";
        echo "</div>";
    }
    ?>
</header>
<!-- Your existing script tags here -->
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

<style>
    #mySidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0;
    background-color: #181818;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

#mySidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: whitesmoke;
    display: block;
    transition: 0.3s;
}

#mySidenav a:hover {
    color: cyan;
}

#mySidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
/* Navigation Bar Styles */
.navbar {
 /* Set the background color to navy blue */
    padding: 10px 0; /* Add some padding for spacing */
    
}

.navbar ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.navbar li {
    margin-right: 25px;
}

.navbar a {
    text-decoration: none;
    color: white; /* Set the text color to white */
    font-size: 18px;
    transition: color 0.3s; /* Add a smooth color transition */
}

.navbar a:hover {
    color: cyan; /* Change the text color on hover to cyan */
}

/* Add more specific styles or overrides as needed */
/* Logo Styles */
.logo {
    text-decoration: none;
    font-size: 24px;
    color: white; /* Set the text color to white */
    padding: 10px 20px; /* Add padding for spacing */
    background-image: linear-gradient(to right, navy, lightblue); /* Create a gradient background */
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent; /* Hide the text color inside the gradient */
    transition: background-image 0.3s; /* Add a smooth transition to the gradient */
}

.logo:hover {
    background-image: linear-gradient(to right, lightblue, navy); /* Change gradient on hover */
}
/* Style for the "Make Appointment" button */
.btn {
    display: inline-block;
    padding: 10px 28px;
    background-color: navy;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    font-size: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-right: 20px;
}

.btn:hover {
    background-color: darkgrey; /* Darker shade of navy on hover */
    /* You can adjust the hover styles as needed */
}
/* Style for the round brackets */
.navbar a i {
    font-size: 16px;
    margin-right: 10px;
}
.navbar {

    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 7px 10px;
}

.navbar-logo {
    display: flex;
    align-items: center;
}

.navbar-logo img {
    width: 30px; /* Adjust the image width as needed */
    height: auto;
    margin-right: 50px;
}

.logotext {
    color: #fff;
    text-decoration: none;
    font-size: 50px;
    font-weight: bold;
}

.navbar-links ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

.navbar-links ul li {
    margin-right: 30px;
}

.navbar-links ul li:last-child {
    margin-right: 0;
}

.navbar-links ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

.navbar-links ul li a:hover {
    color: blue; /* Change to your desired hover color */
}

/* Dropdown Styles */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color:darkgrey;
    min-width: 150px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color:black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f2f2f2;
}

.dropdown:hover .dropdown-content {
    display: block;
}
@media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
</style>
