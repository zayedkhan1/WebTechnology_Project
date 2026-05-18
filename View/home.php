
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

<style>
    :root {
      --purple: #6a0dad;
      --purple-soft: #b692ff;
      --card: #ffffff;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
        background-color: #f5f3ff;
    }

    /* ===== Utilities ===== */
    section {
      padding: 100px 10%;
      
    }

    .btn {
      display: inline-block;
      padding: 12px 26px;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--purple), var(--purple-soft));
      color: white;
      text-decoration: none;
      font-weight: 600;
      box-shadow: 0 8px 20px rgba(106,13,173,0.3);
      transition: 0.3s;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 25px rgba(106,13,173,0.4);
    }

    /* ===== Hero ===== */
    .hero {

      display: grid;
      grid-template-columns: 1.1fr 0.9fr;
      gap: 60px;
      align-items: center;
      background-color: #f5f3ff;
      margin-top:20px;
      
    }

    .hero-badge {
      display: inline-block;
      padding: 6px 14px;
      border-radius: 20px;
      background: #eee6ff;
      color: var(--purple);
      font-weight: 600;
      margin-bottom: 16px;
    }

    .hero h1 {
      font-size: 50px;
      line-height: 1.1;
      margin-bottom: 20px;
    }

    .hero p {
      color: #555;
      margin-bottom: 28px;
      font-size: 18px;
    }

    .hero img {
      width: 100%;
      border-radius: 24px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }

    /* ===== Trust Bar ===== */
    .trust {
      background: white;
      padding: 40px 10%;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 30px;
      text-align: center;
      
    }

    .trust div {
      font-weight: 600;
      color: var(--purple);
    }

    .features{
        background-color: #f5f3ff;
    }

    /* ===== Services ===== */
    .services h2 {
      font-size: 36px;
      margin-bottom: 10px;
    }

    .services{
        background-color: #f5f3ff;
    }
    .services p {
      margin-bottom: 40px;
    }

    .service-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 28px;
    }

    .service-card {
      background: var(--card);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      transition: 0.3s;
    }

    .service-card:hover {
      transform: translateY(-6px);
    }

    .service-card img {
      width: 60px;
      margin-bottom: 15px;
    }

    .service-card h3 {
      margin-bottom: 8px;
      color: var(--purple);
    }



    /* ===== Doctors ===== */
    .doctors {
      text-align: center;
      background-color: #f5f3ff;
    }

    .doctor-grid {
      margin-top: 40px;
      display: grid;
      /* grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); */
      grid-template-columns: repeat(3, minmax(240px, 1fr));
      gap: 28px;
    }

    .doctor-card {
      background: white;
      border-radius: 20px;
      padding: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .doctor-card img {
      width: 60%;
      border-radius: 16px;
      margin-bottom: 12px;
    }

    .doctor-card h4 {
      color: var(--purple);
    }



    /* ===== CTA ===== */
    .cta {
      text-align: center;
      background: linear-gradient(135deg, var(--purple), var(--purple-soft));
      color: white;
      border-radius: 30px;
      margin: 0 10% 80px;
      
    }

    .cta h2 {
      font-size: 38px;
      margin-bottom: 10px;
    }

    .cta p {
      margin-bottom: 25px;
      color: #f1eaff;
    }

    /* ===== Testimonials ===== */
    .testimonials {
      text-align: center;
    }

    .testimonial-grid {
      margin-top: 40px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 28px;
    }

    .testimonial-card {
      background: white;
      padding: 25px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .testimonial-card h4 {
      color: var(--purple);
      margin-top: 10px;
    }



    /* ===== FAQ ===== */
    .faq{
      background-color: #f5f3ff;
    }

    .faq h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .faq-item {
      background: white;
      padding: 20px;
      border-radius: 16px;
      margin-bottom: 15px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.06);
    }

    .faq-item h4 {
      color: var(--purple);
      margin-bottom: 8px;
    }

    /* ===== Features ===== */
    .features {
      text-align: center;
    }

    .features-grid {
      margin-top: 40px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 28px;
    }

    .feature-card {
      background: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      transition: 0.3s;
    }

    .feature-card:hover {
      transform: translateY(-6px);
    }

    .feature-icon {
      width: 70px;
      height: 70px;
      margin: 0 auto 15px;
      border-radius: 50%;
      background: #eee6ff;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--purple);
      font-size: 28px;
    }

    .feature-card h3 {
      color: var(--purple);
      margin-bottom: 10px;
    }
    .doctors{
        background-color: #f5f3ff;
    }



</style>



</head>

<body>

<?php include '../View/shared/navbar.php' ?>

<!-- ===== Hero ===== -->
<section class="hero">
  <div>
    <span class="hero-badge">⭐Trusted Healthcare Appointment Platform</span>
    <h1>Book Doctor Appointments Easily & Quickly</h1>
    <p>
      MediCare helps patients connect with experienced doctors,
      schedule appointments online, and receive quality healthcare
      services without hassle.
    </p>
    <a href="/doc/doctors.php" class="btn">Book Appointment</a>
  </div>

  <img style="width:550px; height:300px;"
       src="../Controller/Assets/hero.png"
       alt="Doctor">
</section>

<!-- ===== Trust Bar ===== -->
<section class="trust">
  <div>👨‍⚕️ 50+ Expert Doctors</div>
  <div>📅 20,000+ Appointments Booked</div>
  <div>⏰ 24/7 Online Support</div>
  <div>💜 Trusted Healthcare Service</div>
</section>

<!-- ===== Features ===== -->
<section class="features">
  <h2>Why Choose MediCare?</h2>
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
        Book your doctor appointments online anytime with a simple process.
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

  <a href="#" class="btn">Get Started</a>
</section>


<?php include '../View/shared/footer.php' ?>

</body>
</html>

</html>
