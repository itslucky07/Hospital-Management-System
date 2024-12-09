<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Services</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <?php @include('header.php'); ?>
    </header>
    <header>
        <h1>Our Services</h1>
    </header>

    <section id="services">
        <div id="service-info">
            <h3>Cleaning & Exam</h3>
            <img src="https://mymagnoliadental.com/wp-content/uploads/sites/247/2018/10/DentalCheckup-min.jpg" alt="Cleaning & Exam Logo">
            <p>
                Regular dental cleaning and examination are essential for maintaining good oral health. During a cleaning and exam, our skilled dental professionals will thoroughly clean your teeth, removing plaque and tartar buildup. We will also check for any signs of dental issues and provide recommendations for ongoing care.
            </p>
            <p>
                At Sparks Precision Dental, we offer dedicated solutions to address gum disease. Our commitment lies in ensuring your oral health through thorough care and tailored treatments.
            </p>
            <p>
                <strong>Scaling and Root Planing</strong><br>
                This meticulous procedure is especially important for patients who have long gaps between their dental visits, making tartar buildup become stubborn and resistant to regular cleanings. With these advanced cleanings, we prevent the progression of severe periodontal disease, which has the potential to jeopardize your oral health.
            </p>
            <p>
                Some benefits of scaling and root planing are:
            </p>
            <ul>
                <li>Deep cleansing</li>
                <li>Gum health improvement</li>
                <li>Halting progression</li>
                <li>Fresh breath</li>
                <li>Enhanced comfort</li>
                <li>Preserving teeth</li>
                <li>Helps you avoid more costly and extensive dental treatments</li>
            </ul>
            <p>
                Contact us at <a href="tel:(816) 587-6444">(816) 587-6444</a> for an extraordinary dental experience!
            </p>
        </div>
        <a href="payment.php?service_name=cleaning and exam&price=1000" class="book-now-button">Book Now</a>
    </section>

    <script src="script.js"></script>
</body>
</html>
<?php @include('footer.php'); ?>
<style>
  /* Reset some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Global styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

header {
    background-color: blue;
    color: navy blue;
    text-align: center;
    padding: 20px;
}

h1 {
    font-size: 28px;
    margin: 0;
}

/* Services Section Styles */
#services {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

#service-info {
    text-align: left;
    padding: 20px;
    margin-top: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
}

#service-info h3 {
    color: #007acc;
    font-size: 24px;
    margin-top: 20px;
}

#service-info img {
    max-width: 100%;
    height: auto;
    margin-top: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: transform 0.3s;
}

#service-info p {
    font-size: 16px;
    line-height: 1.5;
    margin-top: 20px;
}

/* Footer Styles */
footer {
    text-align: center;
    padding: 10px;
    background-color: #007acc;
    color: #fff;
}

/* Hover Animations */
#service-info img:hover {
    transform: scale(1.1);
}
/* Apply background hover color to the entire section */
#services:hover {
    background-color: black; /* Change this color to your desired background color */
    transition: background-color 0.3s; /* Add a smooth transition effect */
}
/* Apply overall background hover color to the entire section */
body:hover {
    background-color: black; /* Change this color to your desired background color */
    transition: background-color 0.3s; /* Add a smooth transition effect */
}

.book-now-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007acc; /* Button background color */
    color: #fff; /* Button text color */
    text-decoration: none;
    border-radius: 5px;
    font-size: 18px;
    margin-top: 20px;
    transition: background-color 0.3s;
}

/* Hover Animation for the Button */
.book-now-button:hover {
    background-color: #005ba8;
    transition: background-color 0.3s;
}

</style>