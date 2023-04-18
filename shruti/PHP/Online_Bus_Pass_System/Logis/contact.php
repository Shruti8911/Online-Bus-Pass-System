<?php
include 'admin/includes/config.php';

if(isset($_POST['submit'])){

  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $mobileno = $_POST['mobileno'];
  $message  = $_POST['message'];
  session_start();
  if(isset($_SESSION['username'])){
    $sql = "INSERT INTO tblcontact (Name, Email, Message, MobileNumber) VALUES ('{$name}','{$email}','{$message}','{$mobileno}')";
    if(mysqli_query($conn, $sql)){
      header("Location: {$hostname}/payforit.php");
      echo "<script>alert('Your message was sent successfully!.');</script>";
     }else{
     echo '<script>alert("Something Went Wrong. Please try again")</script>';
     }
  }else{
    echo '<script>alert("Please Login First , Then try again !")</script>';
  }
  
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Logis Bootstrap Template - Contact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
    <!-- header -->

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
      <img src="https://png.pngtree.com/png-vector/20221006/ourmid/pngtree-red-bus-touring-vector-illustration-png-image_6285537.png" style="width:50px; ">  
      <h1>Travel Agency</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php" >About Us</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="ourteam.php">Our Team</a></li>
          <li><a href="contact.php"  class="active">Contact Us</a></li>
          <!-- <li><a href="contact.php">View Pass</a></li> -->
          <?php 
          session_start(); 
          if (isset($_SESSION['username'])) {
            echo "<li><a class='get-a-quote' href='admin/logout.php'>Logout</a></li>";
            // echo "<li><a class='get-a-quote' href='admin/pages-register.php'>Sign-Up</a></li>";
          }else{
            echo "<li><a class='get-a-quote' href='admin/pages-login.php'>Login</a></li>";
            echo "<li><a class='get-a-quote' href='admin/pages-register.php'>Sign-Up</a></li>";
          }
          ?>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header>

<!-- end header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Contact Us</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div>
        <iframe style="border:0; width: 100%; height: 340px;"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.0207833388286!2d79.03112031488918!3d20.99180399441491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4bd91aa3bb169%3A0x48cb4d55a48019c0!2sV%20M%20Institute%20of%20Engineering%20and%20Technology!5e0!3m2!1sen!2sin!4v1678768269341!5m2!1sen!2sin" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          <!-- <iframe style="border:0; width: 100%; height: 340px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> -->
        </div><!-- End Google Maps -->

        <div class="row gy-4 mt-4">

          <div class="col-lg-4">
         <?php 
               include "admin/includes/config.php";
               $sql = "SELECT *FROM tblpage WHERE PageType = 'contactus' ";
               $result =  mysqli_query($conn, $sql) or die("Query Failed !");
               if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
              ?> 
            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>Location:</h4>
                <p><?php  echo $row['PageDescription'];?></p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>Email:</h4>
                <p><?php  echo $row['Email'];?></p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-phone flex-shrink-0"></i>
              <div>
                <h4>Call:</h4>
                <p><?php  echo $row['MobileNumber'];?></p>
              </div>
            </div><!-- End Info Item -->
            <?php }} ?>
          </div>

          <div class="col-lg-8">
          
            <form  method="post" role="form" class=""> 
              <!--class="php-email-form" action="forms/contact.php" -->
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Your Mobile Number" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <!-- <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
              <div class="text-center mt-3"><button name="submit" class="btn btn-primary" type="submit">Send Message</button></div>
            </form>
            
          </div>
          <!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once('assets/includes/footer.php'); ?>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>