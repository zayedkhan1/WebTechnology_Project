<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - VetCare</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
     
            color: #333;
        }

        .contact-section {
            padding: 80px 10%;
             background-color: #f5f3ff;
        }

        .section-title {
            text-align: center;
            font-size: 40px;
            color: #5e17eb;
            margin-bottom: 15px;
        }

        .section-subtitle {
            text-align: center;
            font-size: 18px;
            color: #666;
            margin-bottom: 60px;
        }

        .contact-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
        }

        .contact-info {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(94, 23, 235, 0.1);
        }

        .info-item {
            margin-bottom: 25px;
        }

        .info-item h3 {
            color: #5e17eb;
            margin-bottom: 8px;
        }

        .info-item p {
            color: #555;
        }

        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(94, 23, 235, 0.1);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
            outline: none;
            transition: 0.3s ease;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: #5e17eb;
            box-shadow: 0 0 5px rgba(94, 23, 235, 0.3);
        }

        .contact-form textarea {
            resize: none;
            height: 120px;
        }

        .submit-btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #5e17eb, #8e44ff);
            color: white;
            font-weight: bold;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(94, 23, 235, 0.3);
        }

        .map-section {
            margin-top: 80px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(94, 23, 235, 0.1);
        }

        .map-section iframe {
            width: 100%;
            height: 350px;
            border: none;
        }

    </style>
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
