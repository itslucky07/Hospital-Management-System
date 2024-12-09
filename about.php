<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <?php @include('header.php'); ?>
    </header>
    <section id="about">
    <h2 style="color: white;">About Sparks Precision Dental</h2>
        <img class="animated-image" src="http://www.weavervillefamilymed.com/wp-content/uploads/2020/12/family-exercise-ideas.jpg" alt="img">
        <div class="about-content animated-content">
            <p>A team committed to your health and happiness since 2023.</p>
            <p><strong>Your Smile Is In Good Hands</strong></p>
            <p>Sparks Precision Dental was founded on the belief that everyone deserves exceptional dental health. We’re here to help you achieve it.</p>
            <p>Our practice is guided by a no-judgment, no-pressure philosophy, and we welcome people of all ages and backgrounds. From co-diagnosing your needs alongside you to providing comfortable, relationship-driven care, our team is proud to serve your smile and the Kansas City community with high-quality dentistry.</p>
        </div>
        <img class="animated-image" src="https://www.oregonlive.com/resizer/zC2tOjtu6w-PXFP-coYT1NFZPRo=/1280x0/smart/advancelocal-adapter-image-uploads.s3.amazonaws.com/image.oregonlive.com/home/olive-media/width2048/img/health_impact/photo/12633506-large.jpg" alt="img">
        <div class="education animated-content">
            <h3>Education</h3>
            <ul>
                <li>DDS – UMKC School of Dentistry</li>
                <li>BS Biology, University of Missouri, KC</li>
            </ul>
        </div>
        <img class="animated-image" src="https://mmjtraining.com/wp-content/uploads/2018/07/doctor-in-consultation-with-female-patient-in-PD3N7KW-1.jpg" alt="img">
        <div class="contact-info animated-content">
            <h3>Contact Information</h3>
            <p>6416 N. Cosby Ave. Kansas City, MO 64151</p>
            <p>Get Directions</p>
            <p>(816) 587-6444</p>
            <p>Hours of Operation:</p>
            <p>Tuesday-Thursday 7:30am-4pm, Friday 8am-2pm</p>
        </div>
        <!-- Add images below -->
        <div class="images animated-images">
            <img src="https://tvseriesfinale.com/wp-content/uploads/2019/04/the-doctors.jpg" alt="Image 1">
            <img src="https://themighty.com/wp-content/uploads/2018/07/doctor-and-patient-1280x640.png" alt="Image 2">
            <img src="https://media.distractify.com/brand-img/vuH5JnkqD/0x0/what-happened-to-doctors-tv-show-2020-1600875640512.jpg" alt="Image 3">
            <img src="https://live.staticflickr.com/65535/49024495922_60e9337897.jpg" alt="Image 4">
            <img src="http://www.indiahospitaltour.com/images/doctors.png" alt="Image 5">
        </div>
    </section>
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
    background: url('images/dentist.jpg') no-repeat;
    background-size: cover;
}

/* Header styles */
h2 {
    color: #007acc;
    font-size: 24px;
    margin: 20px 0;
    text-align: center;
}

/* Image styles */
img {
    max-width: 100%;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 20px;
}

/* About section styles */
.about-content {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin-top: 20px;
}

.about-content p {
    font-size: 16px;
    line-height: 1.5;
    margin-top: 20px;
}

.about-content strong {
    color: #007acc;
}

/* Education section styles */
.education {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin-top: 20px;
}

.education h3 {
    color: #007acc;
    font-size: 24px;
    margin-top: 20px;
}

.education ul {
    list-style: none;
    margin-left: 20px;
}

.education li {
    font-size: 16px;
    line-height: 1.5;
    margin-top: 10px;
}

/* Contact info section styles */
.contact-info {
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin-top: 20px;
}

.contact-info h3 {
    color: #007acc;
    font-size: 24px;
    margin-top: 20px;
}

.contact-info p {
    font-size: 16px;
    line-height: 1.5;
    margin-top: 10px;
}

/* Image section styles */
.images {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top: 20px;
    height: 50%;
}

.images img {
    flex: 0 0 calc(20% - 20px);
    max-width: calc(20% - 20px);
    margin-bottom: 20px;
}

/* Footer styles */
footer {
    text-align: center;
    padding: 10px;
    background-color: #007acc;
    color: #fff;
}
/* Apply styles for the About Us section */
#about {
    text-align: center;
    padding: 20px;
}

h2 {
    font-size: 2rem;
    margin-bottom: 20px;
}

/* Apply styles for animated images */
.animated-image {
    max-width: 100%;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 20px;
    animation: scaleUp 0.5s ease-in-out forwards;
}

/* Apply styles for animated content */
.animated-content {
    animation: fadeIn 1s ease-in-out forwards;
    opacity: 0;
    transform: translateY(20px);
    margin-top: 20px;
    text-align: left;
}

/* Apply styles for animated images container */
.animated-images {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top: 20px;
    animation: fadeIn 1s ease-in-out forwards;
    opacity: 0;
}

/* Define animations */
@keyframes scaleUp {
    0% {
        transform: scale(0.8);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
/* Apply styles for the About Us section */
#about {
    text-align: center;
    padding: 20px;
}

h2 {
    font-size: 2rem;
    margin-bottom: 20px;
}

/* Apply styles for animated images */
.image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.animated-image {
    max-width: 50%;
    height: auto;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 10px;
    animation: fadeIn 1s ease-in-out forwards, scaleUp 0.5s ease-in-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

/* Define animations */
@keyframes scaleUp {
    0% {
        transform: scale(0.8);
    }
    100% {
        transform: scale(1);
    }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
/* Apply styles for clicked images */
.clicked {
    animation: none; /* Disable the scaleUp animation */
    transform: scale(0.9); /* Optionally, shrink the image on click */
}
</style>
