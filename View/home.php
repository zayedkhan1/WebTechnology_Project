
<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>VetCare - Modern Pet Clinic</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<link rel="stylesheet" href="css/home.css">

</head>

<body>

<?php include '../View/shared/navbar.php' ?>

<!-- ===== Hero ===== -->
<section class="hero">
  <div>
    <span class="hero-badge">⭐Trusted Healthcare Appointment Platform</span>
    <h1>Book Doctor Appointments Easily & Quickly</h1>
    <p>
      Appointix helps patients connect with experienced doctors,
      schedule appointments online, and receive quality healthcare
      services without hassle.
    </p>
    <a href="doctors.php" class="btn">Book Appointment</a>
  </div>

  <img style="width:550px; height:300px;"
       src="../Controller/Assets/hero.png"
       alt="Doctor">
</section>

<!-- ===== Trust Bar ===== -->
<section class="trust">
  <div>👨‍⚕️ 50+ Expert Doctors</div>
  <div>📅 20,00+ Appointments Booked</div>
  <div>⏰ 24/7 Online Support</div>
  <div>💜 Trusted Healthcare Service</div>
</section>

<!-- ===== Features ===== -->
<section class="features">
  <h2>Why Choose Appointix?</h2>
  <p>We provide reliable and modern healthcare appointment services</p>

  <div class="features-grid">

    <div class="feature-card">
      <div class="feature-icon">
        <i class="fas fa-user-md"></i>
      </div>
      <h3>Experienced Doctors</h3>
      <p>
        Consult with qualified and experienced doctors from different specialties.
      </p>
    </div>

    <div class="feature-card">
      <div class="feature-icon">
        <i class="fas fa-calendar-check"></i>
      </div>
      <h3>Easy Appointment Booking</h3>
      <p>
        Book your doctor appointments with Appentix anytime with a simple process.
      </p>
    </div>

    <div class="feature-card">
      <div class="feature-icon">
        <i class="fas fa-hospital"></i>
      </div>
      <h3>Quality Healthcare</h3>
      <p>
        We ensure professional healthcare services with patient satisfaction.
      </p>
    </div>

  </div>
</section>

<!-- ===== Services ===== -->
<section class="services">
  <h2>Our Medical Services</h2>
  <p>Complete healthcare solutions for patients</p>

  <div class="service-grid">

    <div class="service-card">
      <img src="https://cdn-icons-png.flaticon.com/512/2966/2966480.png">
      <h3>General Checkup</h3>
      <p>Routine health checkups and medical consultations.</p>
    </div>

    <div class="service-card">
      <img src="https://cdn-icons-png.flaticon.com/512/3209/3209265.png">
      <h3>Online Consultation</h3>
      <p>Consult with doctors online from your home.</p>
    </div>

    <div class="service-card">
      <img src="https://cdn-icons-png.flaticon.com/512/2785/2785482.png">
      <h3>Emergency Care</h3>
      <p>Quick emergency medical support when needed.</p>
    </div>

    <div class="service-card">
      <img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png">
      <h3>Health Tests</h3>
      <p>Professional diagnostic and laboratory services.</p>
    </div>

  </div>
</section>

<!-- ===== Doctors ===== -->
<section class="doctors">
  <h2>Meet Our Specialists</h2>

  <div class="doctor-grid">

    <div class="doctor-card">
      <img src="../Controller/Assets/doc_ronaldo.png">
      <h4>Dr. Cristiano</h4>
      <p>Cardiologist</p>
    </div>

    <div class="doctor-card">
      <img src="../Controller/Assets/doc_messi.png">
      <h4>Dr. Lionel</h4>
      <p>Neurologist</p>
    </div>

    <div class="doctor-card">
      <img src="../Controller/Assets/doc_lewandoski.png">
      <h4>Dr. Robert</h4>
      <p>General Physician</p>
    </div>
    <div class="doctor-card">
      <img src="../Controller/Assets/doc_mbapee.png">
      <h4>Dr. Bappy</h4>
      <p>Cycritiest</p>
    </div>
    <div class="doctor-card">
      <img src="../Controller/Assets/doc_neymar.png">
      <h4>Dr. Neymar</h4>
      <p>Phesio Tehrapyst</p>
    </div>
   

  </div>
</section>

<!-- ===== Testimonials ===== -->
<section class="testimonials">
  <h2>What Our Patients Say</h2>

  <div class="testimonial-grid">

    <div class="testimonial-card">
      <p>“Very easy appointment process and professional doctors.”</p>
      <h4>— Ayesha Rahman</h4>
    </div>

    <div class="testimonial-card">
      <p>“The online consultation service saved me a lot of time.”</p>
      <h4>— Zayed Khan</h4>
    </div>

    <div class="testimonial-card">
      <p>“Excellent healthcare support and friendly environment.”</p>
      <h4>— Tanvir Ahmed</h4>
    </div>

  </div>
</section>

<!-- ===== FAQ ===== -->
<section class="faq">
  <h2>Frequently Asked Questions</h2>

  <div class="faq-item">
    <h4>How can I book an appointment?</h4>
    <p>You can easily book an appointment through our online platform.</p>
  </div>

  <div class="faq-item">
    <h4>Do you provide online consultation?</h4>
    <p>Yes, we provide online consultation with specialist doctors.</p>
  </div>

  <div class="faq-item">
    <h4>Can I cancel my appointment?</h4>
    <p>Yes, appointments can be cancelled or rescheduled anytime.</p>
  </div>

</section>

<!-- ===== CTA ===== -->
<section class="cta">
  <h2>Your Health Matters Most 💜</h2>
  <p>
    Book your doctor appointment today and get trusted healthcare services easily.
  </p>

  <a href="doctors.php" class="btn">Get Started</a>
</section>


<?php include '../View/shared/footer.php' ?>

</body>
</html>

</html>
