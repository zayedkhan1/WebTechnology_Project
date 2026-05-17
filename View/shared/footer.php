<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediCare Footer</title>

  <style>

    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body{
      background: #f4f4f4;
    }

    /* ===== Footer ===== */

    .footer{
      background: #6a0dad;
      color: white;
      padding: 60px 8%;
      margin-top: 100px;
    }

    .footer-container{
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 40px;
    }

    .footer-box h2{
      font-size: 30px;
      margin-bottom: 15px;
    }

    .footer-box h3{
      margin-bottom: 20px;
      font-size: 22px;
    }

    .footer-box p{
      color: #e9d5ff;
      line-height: 1.8;
      font-size: 15px;
    }

    .footer-box ul{
      list-style: none;
    }

    .footer-box ul li{
      margin-bottom: 12px;
    }

    .footer-box ul li a{
      text-decoration: none;
      color: #e9d5ff;
      transition: 0.3s;
      font-size: 15px;
    }

    .footer-box ul li a:hover{
      color: white;
      padding-left: 6px;
    }

    /* Social Icons */

    .social-icons{
      margin-top: 20px;
      display: flex;
      gap: 15px;
    }

    .social-icons a{
      width: 40px;
      height: 40px;
      background: #8b3dff;
      color: white;
      text-decoration: none;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      transition: 0.3s;
      font-size: 18px;
    }

    .social-icons a:hover{
      background: white;
      color: #6a0dad;
    }

    /* Bottom Footer */

    .footer-bottom{
      text-align: center;
      margin-top: 50px;
      padding-top: 20px;
      border-top: 1px solid rgba(255,255,255,0.2);
      color: #ddd;
      font-size: 14px;
    }

    /* Responsive */

    @media(max-width:768px){

      .footer{
        text-align: center;
      }

      .social-icons{
        justify-content: center;
      }

    }

  </style>
</head>

<body>

  <!-- ===== Footer ===== -->

  <footer class="footer">

    <div class="footer-container">

      <!-- About -->
      <div class="footer-box">
        <h2>MediCare</h2>

        <p>
          MediCare is a trusted patient appointment booking system
          that helps patients connect with experienced doctors easily
          and quickly.
        </p>

        <div class="social-icons">
          <a href="#">F</a>
          <a href="#">I</a>
          <a href="#">T</a>
          <a href="#">L</a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="footer-box">
        <h3>Quick Links</h3>

        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Doctors</a></li>
          <li><a href="#">Appointments</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>

      <!-- Services -->
      <div class="footer-box">
        <h3>Services</h3>

        <ul>
          <li><a href="#">Online Consultation</a></li>
          <li><a href="#">Emergency Care</a></li>
          <li><a href="#">Health Checkup</a></li>
          <li><a href="#">Lab Tests</a></li>
          <li><a href="#">Patient Support</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="footer-box">
        <h3>Contact Us</h3>

        <p>📍 Dhaka, Bangladesh</p>
        <p>📞 +880 1234-567890</p>
        <p>✉ support@medicare.com</p>
        <p>⏰ Open 24/7</p>
      </div>

    </div>

    <!-- Bottom -->

    <div class="footer-bottom">
      <p>© 2026 MediCare | All Rights Reserved</p>
    </div>

  </footer>

</body>
</html>