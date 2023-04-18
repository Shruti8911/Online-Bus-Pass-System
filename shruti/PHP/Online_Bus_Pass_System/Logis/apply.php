<?php
include 'admin/includes/config.php';
session_start();
if(isset($_POST['submit'])){
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $mobileno = $_POST['mobileno'];
  $message  = $_POST['message'];
  if(isset($_SESSION['username'])){
    $sql = "INSERT INTO tblcontact (Name, Email, Message, MobileNumber) VALUES ('{$name}','{$email}','{$message}','{$mobileno}')";
    if(mysqli_query($conn, $sql)){
      echo "<script>console.log('Your Bus Pass Application had sent successfully .');</script>"; 

       // for mail section
// send mail section
include 'admin/includes/PHPMailer-master/src/PHPMailer.php';
include 'admin/includes/PHPMailer-master/src/SMTP.php';
$html = "Dear  $name,<br> &nbsp;&nbsp;&nbsp;&nbsp; Your Bus Pass Application had sent successfully ,plz pay for it !<br>
We will further contact you soon for other verification details. You need to send your aadhar_card/pan_card/college_id_proof/school_id_proof any of this documents on mail after telephonic verification , and if you already had a pass and you want to renew that then you get it within a day after verification .<br> Enjoy our ''Appli bus service''.<br>&nbsp;&nbsp;&nbsp;&nbsp;<p>Thank You.</p><br><br> ";
$mail = new  PHPMailer\PHPMailer\PHPMailer(true);
$mail->IsSMTP();
$mail->Host="smtp.gmail.com";
$mail->Port=587;
$mail->SMTPSecure ="tls";
$mail->SMTPAuth=true;
$mail->Username="techi4799@gmail.com";
$mail->Password="chkglrzxfeuuwcjd";
$mail->SetFrom("techi4799@gmail.com", "InfoTech");
$mail->AddAddress($email, $name);
$mail->IsHTML(true);
$mail->Subject=" $name, Your pass application send Successfully.";
$mail->Body=$html;
$mail->SMTPOptions=array('ssl'=>array(
  'verify_peer'=>false,
  'verify_peer name'=>false,
  'allow_self_signed'=>false
));
if($mail->send()){
  echo  "<script>
         console.log('PASS APPLICATION email successfully send !');
         </script>";
}else{
  echo  "<script>
         console.log('failed to send email !..');
         </script>";
}
//  end send email section
// end mail section


      header("Location: {$hostname}/payforit.php");
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

  <title>| Online Bus Pass System |</title>
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
  <?php include_once('assets/includes/header.php'); ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Apply Here</h2>
              <p>Apply for online pass or Renewal of Pass</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Application</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row gy-4">
        <div class="section-header">
          <h2>Application Form</h2>
        </div>

          <div class="col-lg-12  bg-light service-item  text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-8 bg-light d-flex justify-content-center align-content-center " style="margin-left:220px">
          
            <form  method="post" role="form" class=""> 
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
              <div class="text-center mt-3"><button name="submit" class="btn btn-primary" type="submit">Apply</button></div>
            </form>
            
          </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Featured Services Section -->
    
   

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Frequently Asked Questions</span>
          <h2>Frequently Asked Questions</h2>

        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-10">

            <div class="accordion accordion-flush" id="faqlist">

            <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                    Is it completly secure ?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    Yes its completly secure you can apply and use with two days , your pass will ready to use . Thank you
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <i class="bi bi-question-circle question-icon"></i>
                    Payment is safe or not ?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                   Its completly safe .
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->x

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