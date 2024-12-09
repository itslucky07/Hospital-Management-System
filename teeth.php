<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Swish Dental Clinic</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <?php @include('header.php'); ?>
    </header>
    <section id="home">
        <img src="https://i.ytimg.com/vi/DsJv0xVAFtE/maxresdefault.jpg" alt="img">
        <div class="home-content">
            <h1>Welcome to Swish Dental Clinic</h1>
            <p>Where oral care meets self-care.</p>
            <p>Meet Swish, a full-service dental clinic. Now open in Bridgelan</p>
                <p>Your smile is Awesome!</p>
                <p>We love your smile & would do our best to make it better!</p>
                <p>We will provide you all that’s needed to make you sparkle!</p>
            </div>
        </div>
    </section>
    
    <section id="gallery">
        <div class="image-card">
            <img src="https://wallpaperaccess.com/full/2653644.jpg" alt="cleaning😁😁😁">
            <h2>cleaning😁😁😁</h2>
            <p>We provide a full range of dental care. This includes: Cosmetic Dentistry, Family Dentistry, Early Care for Children, Preventative Care, Crowns and Bridges, Root Canal Treatment, Natural Looking Dentures and Partials, Extractions, Gum Therapy, along with other dental services. New patients are always welcome and Emergency Services are available.</p>
        </div>
        <div class="image-card">
            <img src="https://wallpaperaccess.com/full/2653725.jpg" alt="Scaling😁😁">
            <h2>Scaling😁😁</h2>
            <p>The dental clinic is a place where a dentist performs dental procedures and treatments on patients. Dental clinics can be found in hospitals, schools, government offices, and other health-related establishments. ... A dental office is a business establishment owned and/or run by a dental professional.</p>
        </div>
        <div class="image-card">
            <img src="https://i.pinimg.com/originals/86/b3/81/86b3814a6e3fc19c1b0d070c9636d409.jpg" alt="providng toothbrush❤️">
            <h2>providing toothbrush❤️</h2>
            <p>Regular dental care is an important part of oral health. Having healthy teeth and gums isn't a given, though. Brush up on daily dental care tips, and know which signs and symptoms deserve a dentist's attention. Also consider common dental care questions. Should you use an electric toothbrush or a regular toothbrush?</p>
        </div>
        <div class="image-card">
            <img src="https://www.sherwooddentalcare.co.uk/wp-content/uploads/2020/04/children1.jpg" alt="toothpastee">
            <h2>toothpastee😇😇</h2>
            <p>They're also a source for dental research. In other cases, dental clinics are a community offering to support an area in need. On the other hand, private practices are owned by dentists or medical institutions. And they run like a business.</p>
        </div>
        <div class="image-card">
            <img src="https://www.smilekonnekt.com/wp-content/uploads/2016/09/banner7.jpg" alt="brushing the teeth">
            <h2>brushing the teeth😊😊</h2>
            <p>Regular dental care is an important part of oral health. Having healthy teeth and gums isn't a given, though. Brush up on daily dental care tips, and know which signs and symptoms deserve a dentist's attention.</p>
        </div>
        <div class="image-card">
            <img src="https://i0.wp.com/hitechgazette.com/wp-content/uploads/2020/02/man-dental-whitening-min.jpg?fit=1280%2C720&ssl=1" alt="brushing the teeth">
            <h2>treatment 😊😊</h2>
            <p>Regular dental care is an important part of oral health. Having healthy teeth and gums isn't a given, though. Brush up on daily dental care tips, and know which signs and symptoms deserve a dentist's attention.</p>
        </div>
    </section>
</body>
</html>

<style>
/* Reset some default styles */
body, h1, h2, p {
    margin: 0;
    padding: 0;
}

/* Apply styles to the home section */
#home {
    text-align: center;
    padding: 50px;
    background-color: #f3f3f3;
}

#home img {
    max-width: 100%;
    height: auto;
    margin-bottom: 67px;
}

.home-content {
    max-width: 800px;
    margin: 0 auto;
}

.home-content h1 {
    font-size: 36px;
    color: #333;
    margin-bottom: 10px;
}

.home-content p {
    font-size: 18px;
    color: #666;
    margin-bottom: 20px;
}

.quote {
    background-color: white;
    color: #fff;
    padding: 30px;
    border-radius: 70px;
}
.quote:hover {
    background-color: black;
}


/* Apply styles to the image gallery section */
#gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px;
    background-color: #fff;
}

.image-card {
    flex: 0 1 calc(33.33% - 20px);
    margin-bottom: 20px;
    padding: 20px;
    box-sizing: border-box;
    background-color: #f3f3f3;
    border-radius: 10px;
    text-align: center;
}

.image-card img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 10px;
}

.image-card h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.image-card p {
    font-size: 16px;
    color: #666;
}
</style>
<?php @include('footer.php'); ?>