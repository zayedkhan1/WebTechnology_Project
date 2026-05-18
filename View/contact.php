<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - VetCare</title>
 <link rel="stylesheet" href="css/contact.css">
</head>
<body>

<?php include 'shared/navbar.php'; ?>

<section class="contact-section">

    <h1 class="section-title">Contact Appointix</h1>
    <p class="section-subtitle">We’re here to help you anytime.</p>

    <div class="contact-container">

        <!-- Contact Info -->
        <div class="contact-info">
            <div class="info-item">
                <h3>📍 Address</h3>
                <p>Basundhara Street, Dhaka, Bangladesh</p>
            </div>

            <div class="info-item">
                <h3>📞 Phone</h3>
                <p>+880 1234 xxxxxxxx</p>
            </div>

            <div class="info-item">
                <h3>📧 Email</h3>
                <p>info@appointix.com</p>
            </div>

            <div class="info-item">
                <h3>⏰ Working Hours</h3>
                <p>Saturday - Thursday: 9:00 AM - 9:00 PM</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <form>
                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Your Email" required>
                <input type="text" placeholder="Subject">
                <textarea placeholder="Your Message" required></textarea>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>

    </div>

    <!-- Map Section -->
    <div class="map-section">
       
   <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0!2d90.3645163!3d23.7967929!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8b53b8aa44e2dbc3%3A0x529e09689c900b7d!2sAlphaCue%20Animal%20Care!5e0!3m2!1sen!2sbd!4v1707945000000!5m2!1sen!2sbd" 
    width="100%" 
    height="450" 
    style="border:0;" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
</iframe>
    </div>

</section>

<?php include 'shared/footer.php'; ?>

</body>
</html>
