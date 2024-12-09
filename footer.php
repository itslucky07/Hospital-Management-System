<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Clinic</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <footer>
        <div class="container-foot">
            <div class="leftbox">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Hic accusamus iste eaque vero obcaecati veritatis nostrum
                    pariatur maxime consequuntur ex.</p>
                <ul class="socialMedia">
                    <li><a href="https://instagram.com/dentistclinic23?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://wa.me/1234567890"><i class="fab fa-whatsapp"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="rightbox">
                <ul class="contact-info">
                    <li><a href="tel:+91 9670240625"><i class="fas fa-phone"></i> Call Us</a></li>
                    <li><a href="mailto:info@example.com"><i class="far fa-envelope"></i> Email Us</a></li>
                    <li><a href="contact.html"><i class="fas fa-map-marker-alt"></i> Contact Us</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
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

/* Footer container styles */
.container-foot {
    background-color: #333;
    color: #fff;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Left box styles */
.leftbox {
    max-width: 400px;
}

.leftbox a.logo {
    text-decoration: none;
    color: #fff;
    font-size: 24px;
    font-weight: bold;
    display: flex;
    align-items: center;
}

.leftbox p {
    font-size: 14px;
    margin-top: 10px;
}

/* Social media icons styles */
.socialMedia {
    list-style: none;
    padding: 0;
    margin-top: 20px;
    display: flex;
}

.socialMedia li {
    margin-right: 10px;
}

.socialMedia a {
    text-decoration: none;
    color: #fff;
    font-size: 24px;
}

/* Hover effect for social media icons */
.socialMedia a:hover {
    color: #007acc;
}

/* Right box styles */
.rightbox {
    text-align: right;
}

.contact-info {
    list-style: none;
    padding: 0;
    margin: 0;
}

.contact-info li {
    margin-top: 10px;
}

.contact-info a {
    text-decoration: none;
    color: #fff;
    font-size: 14px;
    display: flex;
    align-items: center;
}

.contact-info a i {
    margin-right: 5px;
}

.contact-info a:hover {
    text-decoration: underline;
}

    </style>