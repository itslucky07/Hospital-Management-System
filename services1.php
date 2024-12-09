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
   <h1>dental filling</h1>
    </header>

    <section id="services">
        <div id="service-info">
            <h3>Dental Filling</h3>
            <img src="https://wallpapercave.com/wp/wp1957271.jpg" alt="Dental Filling Image">
            <p>
                From cavities to a confident smile! Your dental check-up reveals the need for a filling. You’re not alone. Just like many others, it’s common to require at least one filling in your lifetime. So, what’s the deal?
            </p>
            <p>
                Our North Kansas City dental fillings are the ultimate solution for tooth decay, restoring function and form while ensuring future protection. As a leading provider of dental excellence, we deliver this routine yet essential procedure. Trust Sparks Precision Dental for your oral health! To request an appointment today, call <a href="tel:(816) 587-6444">(816) 587-6444</a>.
            </p>
            <h4>Dental fillings at Sparks Precision Dental</h4>
            <p>
                Discover the beauty of our white composite fillings at Sparks Precision Dental. These highly esthetic fillings not only give our patients a stunning smile but also offer a long-lasting solution for cavity repair. Say goodbye to dental imperfections as you embrace a beautiful, durable smile with our advanced composite fillings.
            </p>
            <p>
                Contact us at <a href="tel:+91 7710806152">(816) 587-6444</a> for an extraordinary dental experience!
            </p>
            
        </div>
        <a href="payment.php?service_name=dental filling&price=2000" class="book-now-button">Book Now</a>
    </section>

    <footer>
       
    </footer>

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
    background-color: #007acc;
    color: #fff;
    text-align: center;
    padding: 20px;
}

h1 {
    font-size: 28px;
    margin: 0;
}

/* Section style */
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

/* Hover animation for images */
#service-info img:hover {
    transform: scale(1.1);
}

/* Footer style */
footer {
    text-align: center;
    padding: 10px;
    background-color: #007acc;
    color: #fff;
}
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