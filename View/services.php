<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services - PatientCare</title>
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

        .services-section {
            padding: 80px 10%;
            text-align: center;
             background-color: #f5f3ff;
        }

        .section-title {
            font-size: 40px;
            color: #5e17eb;
            margin-bottom: 15px;
        }

        .section-subtitle {
            font-size: 18px;
            color: #666;
            margin-bottom: 60px;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: #ffffff;
            padding: 35px 25px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(94, 23, 235, 0.1);
            transition: 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(94, 23, 235, 0.2);
        }

        .service-icon {
            font-size: 50px;
            margin-bottom: 20px;
            color: #5e17eb;
        }

        .service-title {
            font-size: 22px;
            margin-bottom: 15px;
            color: #5e17eb;
        }

        .service-description {
            font-size: 15px;
            color: #555;
            line-height: 1.6;
        }

        .cta-section {
            margin-top: 80px;
            padding: 50px;
            background: linear-gradient(135deg, #5e17eb, #8e44ff);
            border-radius: 25px;
            color: white;
        }

        .cta-section h2 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .cta-section p {
            margin-bottom: 25px;
            font-size: 16px;
        }

        .cta-btn {
            display: inline-block;
            padding: 12px 30px;
            background: white;
            color: #5e17eb;
            font-weight: bold;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .cta-btn:hover {
            background: #eee;
        }
    </style>
</head>
<body>

<?php include 'shared/navbar.php' ?>

<section class="services-section">
    <h1 class="section-title">Our Medical Services</h1>
    <p class="section-subtitle">Easy, fast, and reliable appointment booking for quality healthcare.</p>

    <div class="services-grid">

        <div class="service-card">
            <div class="service-icon">🩺</div>
            <h3 class="service-title">General Consultation</h3>
            <p class="service-description">
                Book appointments on Appointix with experienced doctors for general health checkups and medical advice.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">💉</div>
            <h3 class="service-title">Vaccination Services</h3>
            <p class="service-description">
                Schedule vaccinations for children and adults to protect against common diseases.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">🧪</div>
            <h3 class="service-title">Diagnostic Tests</h3>
            <p class="service-description">
                Book lab tests including blood tests, urine tests, and other medical diagnostics.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">🏥</div>
            <h3 class="service-title">Specialist Doctors</h3>
            <p class="service-description">
                Appointments with cardiologists, dermatologists, neurologists, and other specialists.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">🚑</div>
            <h3 class="service-title">Emergency Support</h3>
            <p class="service-description">
                Quick access to emergency medical care and urgent treatment services.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">🧑‍⚕️</div>
            <h3 class="service-title">Online Doctor Consultation</h3>
            <p class="service-description">
                Consult doctors online from home via video or audio appointment sessions.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">💊</div>
            <h3 class="service-title">Prescription Management</h3>
            <p class="service-description">
                Get digital prescriptions and manage your medication history easily.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">📋</div>
            <h3 class="service-title">Medical Reports</h3>
            <p class="service-description">
                Access and download your medical reports anytime from your account.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">❤️</div>
            <h3 class="service-title">Health Monitoring</h3>
            <p class="service-description">
                Track your health records, vital stats, and appointment history in one place.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">🧑‍⚕️</div>
            <h3 class="service-title">Follow-up Appointments</h3>
            <p class="service-description">
                Easily book follow-up visits after treatment or surgery.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">🩹</div>
            <h3 class="service-title">Wound Care</h3>
            <p class="service-description">
                Professional care for injuries, stitches, and post-treatment recovery.
            </p>
        </div>

        <div class="service-card">
            <div class="service-icon">📅</div>
            <h3 class="service-title">Easy Appointment Scheduling</h3>
            <p class="service-description">
                Book, reschedule, or cancel appointments anytime with our simple system.
            </p>
        </div>

    </div>

    <div class="cta-section">
        <h2>Book Your Appointment Today</h2>
        <p>Take control of your health with quick and easy doctor appointments.</p>
        <a href="#" class="cta-btn">Book Now</a>
    </div>

</section>

<?php include 'shared/footer.php' ?>

</body>
</html>